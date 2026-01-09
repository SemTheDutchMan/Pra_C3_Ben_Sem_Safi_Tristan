<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\School;
use App\Models\Team;
use App\Models\Scheidsrechter;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        // Create two demo schools
        $schools = collect([
            [
                'name' => 'Basisschool Horizon',
                'email' => 'horizon@example.com',
                'address' => 'Straat 1, Stad',
                'referee_name' => 'Horizon Ref 1',
                'referee_email' => 'horizon.ref@example.com',
                'group_count' => 3,
                'class' => 'groep',
            ],
            [
                'name' => 'College Nova',
                'email' => 'nova@example.com',
                'address' => 'Laan 2, Stad',
                'referee_name' => 'Nova Ref 1',
                'referee_email' => 'nova.ref@example.com',
                'group_count' => 3,
                'class' => 'klas',
            ],
        ])->map(fn($data) => School::create($data));

        // Add referees for each school
        $schools->each(function (School $school) {
            Scheidsrechter::create([
                'name' => $school->referee_name,
                'email' => $school->referee_email,
                'school_id' => $school->id,
            ]);
        });

        // Team templates per sport/groep combination
        $teamSets = [
            ['sport' => 'voetbal', 'groep' => 'groep 3/4'],
            ['sport' => 'voetbal', 'groep' => 'groep 5/6'],
            ['sport' => 'voetbal', 'groep' => 'groep 7/8'],
            ['sport' => 'lijnbal', 'groep' => 'groep 7/8'],
            ['sport' => 'voetbal', 'groep' => 'klas1_jongens'],
            ['sport' => 'voetbal', 'groep' => 'klas1_meiden'],
            ['sport' => 'lijnbal', 'groep' => 'klas1_meiden'],
        ];

        // Create three teams for each combination per school
        $schools->each(function (School $school) use ($teamSets) {
            foreach ($teamSets as $set) {
                for ($i = 1; $i <= 3; $i++) {
                    Team::create([
                        'school_id' => $school->id,
                        'name' => $school->name . ' ' . ucfirst($set['sport']) . ' ' . $set['groep'] . ' #' . $i,
                        'sport' => $set['sport'],
                        'groep' => $set['groep'],
                        'teamsort' => null,
                        'referee' => null,
                        'pool_id' => null,
                        'pool' => null,
                        'poulePoints' => 0,
                    ]);
                }
            }
        });
    }
}
