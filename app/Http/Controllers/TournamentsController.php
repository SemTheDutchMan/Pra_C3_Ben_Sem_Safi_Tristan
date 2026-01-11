<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use App\Models\Tournament;
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Scheidsrechter;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TournamentsController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::all();
        return view('tournaments.index', compact('tournaments'));
    }

    public function publicIndex()
    {
        $tournaments = Tournament::where('archived', false)
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        return view('tournaments.public', compact('tournaments'));
    }

    public function archive()
    {
        $tournaments = Tournament::where('archived', true)
            ->orderByDesc('date')
            ->orderBy('start_time')
            ->get();

        return view('tournaments.archive', compact('tournaments'));
    }

    public function create()
    {
        $all = $this->getAllData();
        return view('tournaments.createTournament', compact('all'));
    }

    public function store(Request $request)
    {
        //VALIDATIE
        $data = $request->validate([
            'name' => 'required|string',
            'date' => 'required|date',
            'sport' => 'required|in:voetbal,lijnbal',
            // Accept both old (no-space) and new (with-space) values
            'groep' => 'required|in:groep 3/4,groep 5/6,groep 7/8,groep3/4,groep5/6,groep7/8,klas1_jongens,klas1_meiden',
            'startTime' => 'required|date_format:H:i',
            'teamsPerPool' => 'required|integer|min:2',
        ]);

        // Normalize groep to the canonical form with a space so settings match
        $groepInput = $data['groep'];
        $groepCanonical = match ($groepInput) {
            'groep3/4' => 'groep 3/4',
            'groep5/6' => 'groep 5/6',
            'groep7/8' => 'groep 7/8',
            default => $groepInput,
        };

        // Use both canonical and compact values when querying teams so older data still matches
        $groepLookup = [$groepCanonical, str_replace(' ', '', $groepCanonical)];

        // Controleer of de toernooinaam al bestaat
        if (Tournament::where('name', $data['name'])->exists()) {
            return redirect()->back()->withErrors([
                'name' => 'Er bestaat al een toernooi met deze naam.'
            ])->withInput();
        }

        // INSTELLINGEN
        // Spelinstellingen per sport en leeftijdsgroep

        $gameSettings = [
            'voetbal' => [
                'groep 3/4' => ['fields' => 4, 'length' => 15, 'pause' => 5],
                'groep 5/6' => ['fields' => 8, 'length' => 15, 'pause' => 5],
                'groep 7/8' => ['fields' => 8, 'length' => 15, 'pause' => 5],
                'klas1_meiden' => ['fields' => 4, 'length' => 15, 'pause' => 5],
                'klas1_jongens' => ['fields' => 3, 'length' => 15, 'pause' => 5],
            ],
            'lijnbal' => [
                'groep 3/4' => ['fields' => 4, 'length' => 10, 'pause' => 2],
                'groep 5/6' => ['fields' => 4, 'length' => 10, 'pause' => 2],
                'groep 7/8' => ['fields' => 4, 'length' => 10, 'pause' => 2],
                'klas1_meiden' => ['fields' => 4, 'length' => 12, 'pause' => 0],
                'klas1_jongens' => ['fields' => 4, 'length' => 12, 'pause' => 0],
            ]
        ];


        // TEAMS OPHALEN 
        // Haal alle beschikbare teams op die nog geen toernooi hebben
        $teams = Team::where('sport', $data['sport'])
            ->whereIn('groep', $groepLookup)
            ->whereNull('tournament_id')
            ->get()
            ->shuffle();

        $teamsPerPool = $data['teamsPerPool'];
        $teamCount = $teams->count();

        // Controle: genoeg teams?
        if ($teamCount < $teamsPerPool) {
            return redirect()->back()->withErrors([
                'team' => 'Niet genoeg teams beschikbaar.'
            ])->withInput();
        }

        // Controle: voorkom een poule met slechts 1 team
        if ($teamCount % $teamsPerPool === 1) {
            return redirect()->back()->withErrors([
                'team' => 'Er blijft 1 team over dat alleen in een poule zou zitten.'
            ])->withInput();
        }

        // POULES MAKEN
        // Groepeer teams per school
        $teamsBySchool = $teams->groupBy('school_id');

        // Bepaal aantal poules
        $pouleCount = (int) ceil($teamCount / $teamsPerPool);
        $poules = array_fill(0, $pouleCount, []);

        // Verdeel teams over poules, gespreid per school
        $index = 0;
        foreach ($teamsBySchool as $schoolTeams) {
            if ($schoolTeams->count() > $pouleCount) {
                return redirect()->back()->withErrors([
                    'team' => 'Te veel teams van dezelfde school.'
                ])->withInput();
            }

            foreach ($schoolTeams as $team) {
                $poules[$index % $pouleCount][] = $team;
                $index++;
            }
        }
        if (!isset($gameSettings[$data['sport']][$groepCanonical])) {
            return redirect()->back()->withErrors([
                'groep' => 'Ongeldige combinatie van sport en groep.'
            ])->withInput();
        }

        //TOERNOOI MAKEN
        $fields = $gameSettings[$data['sport']][$groepCanonical]['fields'];

        $tournament = Tournament::create([
            'name' => $data['name'],
            'date' => $data['date'],
            'sport' => $data['sport'],
            'groep' => $groepCanonical,
            'start_time' => $data['startTime'],
            'fields_amount' => $fields,
            'game_length_minutes' => $gameSettings[$data['sport']][$groepCanonical]['length'],
            'amount_teams_pool' => $teamsPerPool,
            'archived' => false,
        ]);

        //TEAMS OPSLAAN
        // Zet teams vast in het toernooi en wijs poules toe
        $teams = collect($poules)->flatten();

        foreach ($teams->values() as $i => $team) {
            $team->update([
                'pool' => floor($i / $teamsPerPool) + 1,
                'tournament_id' => $tournament->id,
            ]);
        }

        //FIXTURES VERZAMELEN 
        // Groepeer teams per poule
        $teamsByPool = $teams->groupBy('pool');
        $fixturesToCreate = [];

        foreach ($teamsByPool as $pool => $poolTeams) {
            $poolTeams = $poolTeams->values();

            for ($i = 0; $i < $poolTeams->count(); $i++) {
                for ($j = $i + 1; $j < $poolTeams->count(); $j++) {
                    $fixturesToCreate[] = [
                        'team1' => $poolTeams[$i],
                        'team2' => $poolTeams[$j],
                    ];
                }
            }
        }

        //PLANNING TIJD + VELDEN
        $currentTime = Carbon::createFromFormat('H:i', $data['startTime']);
        $gameLength = $gameSettings[$data['sport']][$data['groep']]['length'];
        $pause = $gameSettings[$data['sport']][$data['groep']]['pause'];

        $slotLength = $gameLength + $pause;
        $busyTeams = [];

        // Plan wedstrijden in tijdsloten zonder teamconflicten
        while (count($fixturesToCreate) > 0) {
            $scheduledThisSlot = 0;
            $fieldNumber = 1;

            // Probeer maximaal het aantal beschikbare velden te vullen
            for ($i = 0; $i < count($fixturesToCreate) && $fieldNumber <= $fields;) {
                $fixture = $fixturesToCreate[$i];
                $team1 = $fixture['team1'];
                $team2 = $fixture['team2'];

                // Controleer of teams nog bezig zijn met een andere wedstrijd
                $team1Busy = isset($busyTeams[$team1->id]) && $busyTeams[$team1->id]->gt($currentTime);
                $team2Busy = isset($busyTeams[$team2->id]) && $busyTeams[$team2->id]->gt($currentTime);

                if ($team1Busy || $team2Busy) {
                    // Kan deze wedstrijd nu niet plannen, probeer de volgende
                    $i++;
                    continue;
                }

                // Kies een scheidsrechter van een andere school
                $ref = Scheidsrechter::where('school_id', '!=', $team1->school_id)
                    ->where('school_id', '!=', $team2->school_id)
                    ->inRandomOrder()
                    ->first();

                $endTime = (clone $currentTime)->addMinutes($gameLength);

                Fixture::create([
                    'team_1_id' => $team1->id,
                    'team_2_id' => $team2->id,
                    'team_1_score' => 0,
                    'team_2_score' => 0,
                    'field' => $fieldNumber,
                    'start_time' => $currentTime->format('H:i'),
                    'end_time' => $endTime->format('H:i'),
                    'type' => 'pool',
                    'tournament_id' => $tournament->id,
                    'scheidsrechter_id' => $ref?->id,
                ]);

                // Markeer teams als bezet tot na pauze
                $busyUntil = (clone $endTime)->addMinutes($pause);
                $busyTeams[$team1->id] = $busyUntil;
                $busyTeams[$team2->id] = $busyUntil;

                // Verwijder geplande wedstrijd uit de lijst
                array_splice($fixturesToCreate, $i, 1);

                $scheduledThisSlot++;
                $fieldNumber++;
            }

            if ($scheduledThisSlot === 0) {
                // Geen wedstrijd mogelijk: ga naar eerstvolgende moment dat een team vrij is
                $earliest = null;
                foreach ($fixturesToCreate as $fixture) {
                    foreach ([$fixture['team1']->id, $fixture['team2']->id] as $tid) {
                        if (isset($busyTeams[$tid]) && $busyTeams[$tid]->gt($currentTime)) {
                            if ($earliest === null || $busyTeams[$tid]->lt($earliest)) {
                                $earliest = $busyTeams[$tid];
                            }
                        }
                    }
                }

                if ($earliest !== null) {
                    $currentTime = $earliest->copy();
                } else {
                    // Fallback: ga naar het volgende volledige tijdslot

                    $currentTime->addMinutes($slotLength);
                }
            } else {
                // Ga door naar het volgende tijdslot
                $currentTime->addMinutes($slotLength);
            }
        }

        return redirect()->route('tournaments.index')
            ->with('success', 'Toernooi succesvol aangemaakt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournament $tournament)
    {
        $tournament = Tournament::with(['fixtures.team1', 'fixtures.team2'])
            ->findOrFail($tournament->id);


        $fixtures = $tournament->fixtures;


        return view('tournaments.show', compact('tournament', 'fixtures'));;
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournament $tournament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tournament $tournament)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string',
            'date' => 'sometimes|required|date',
            'sport' => 'sometimes|required|in:voetbal,lijnbal',
            'groep' => 'sometimes|required|in:groep 3/4,groep 5/6,groep 7/8,klas1_jongens,klas1_meiden',
            'start_time' => 'sometimes|required|date_format:H:i',
            'fields_amount' => 'sometimes|required|integer|min:1',
            'game_length_minutes' => 'sometimes|required|integer|min:1',
            'amount_teams_pool' => 'sometimes|required|integer|min:2',
            'archived' => 'sometimes|boolean',
        ]);

        $tournament->update($data);

        return redirect()->route('tournaments.show', $tournament)
            ->with('success', 'Toernooi bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {


        Team::where('tournament_id', $id)->update([
            'tournament_id' => null
        ]);


        $tournament = Tournament::findOrFail($id);
        $tournament->delete();

        return redirect()->route('tournaments.index')->with('success', 'Toernooi succesvol verwijderd.');
    }

    public function getAllData()
    {
        $schools = School::all();
        $teams = Team::all();
        $users = User::all();
        $scheidsrechters = Scheidsrechter::all();

        return [
            'schools' => $schools,
            'teams' => $teams,
            'users' => $users,
            'scheidsrechters' => $scheidsrechters,
        ];
    }

    public function standings(Tournament $tournament)
    {
        $teams = Team::where('tournament_id', $tournament->id)
            ->orderByDesc('poulePoints')
            ->get();

        $stand = $teams->groupBy('pool')->sortKeys();

        return view('tournaments.standings', compact('tournament', 'teams', 'stand'));
    }
}
