<x-base-layout>
    <main class="toernooi-detail-page" style="max-width: 1100px; margin: 40px auto; padding: 0 20px 80px; min-height: 70vh;">
        <header style="display: flex; justify-content: space-between; align-items: center; gap: 16px; flex-wrap: wrap; margin-bottom: 24px;">
            <a href="{{ route('tournaments.public') }}" class="btn-goback" style="text-decoration: none;">Terug naar overzicht</a>
            <div style="flex: 1 1 auto;">
                <p style="margin: 0; color: #6b7280; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; font-size: 12px;">Toernooi</p>
                <h1 style="margin: 6px 0 0; font-size: 32px;">{{ $tournament->name }}</h1>
            </div>
            <a href="{{ route('tournaments.standings', $tournament) }}" class="btn-details" style="text-decoration: none;">Bekijk stand</a>
        </header>

        <section style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px; margin-bottom: 24px;">
            <div style="border: 1px solid #e5e7eb; border-radius: 10px; padding: 14px; background: #ffffff; box-shadow: 0 8px 18px rgba(0,0,0,0.04);">
                <p style="margin: 0; color: #6b7280; font-weight: 700; font-size: 12px;">Datum</p>
                <p style="margin: 6px 0 0; font-size: 18px;">{{ \Carbon\Carbon::parse($tournament->date)->format('d M Y') }}</p>
            </div>
            <div style="border: 1px solid #e5e7eb; border-radius: 10px; padding: 14px; background: #ffffff; box-shadow: 0 8px 18px rgba(0,0,0,0.04);">
                <p style="margin: 0; color: #6b7280; font-weight: 700; font-size: 12px;">Starttijd</p>
                <p style="margin: 6px 0 0; font-size: 18px;">{{ $tournament->start_time ? substr($tournament->start_time, 0, 5) : 'n.t.b.' }}</p>
            </div>
            <div style="border: 1px solid #e5e7eb; border-radius: 10px; padding: 14px; background: #ffffff; box-shadow: 0 8px 18px rgba(0,0,0,0.04);">
                <p style="margin: 0; color: #6b7280; font-weight: 700; font-size: 12px;">Sport / groep</p>
                <p style="margin: 6px 0 0; font-size: 18px;">{{ ucfirst($tournament->sport) }} · {{ $tournament->groep }}</p>
            </div>
            <div style="border: 1px solid #e5e7eb; border-radius: 10px; padding: 14px; background: #ffffff; box-shadow: 0 8px 18px rgba(0,0,0,0.04);">
                <p style="margin: 0; color: #6b7280; font-weight: 700; font-size: 12px;">Velden</p>
                <p style="margin: 6px 0 0; font-size: 18px;">{{ $tournament->fields_amount }}</p>
            </div>
            <div style="border: 1px solid #e5e7eb; border-radius: 10px; padding: 14px; background: #ffffff; box-shadow: 0 8px 18px rgba(0,0,0,0.04);">
                <p style="margin: 0; color: #6b7280; font-weight: 700; font-size: 12px;">Teams per poule</p>
                <p style="margin: 6px 0 0; font-size: 18px;">{{ $tournament->amount_teams_pool }}</p>
            </div>
        </section>

        <div style="display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap; margin-bottom: 12px;">
            <h2 style="margin: 0;">Alle wedstrijden</h2>
            <div style="display: flex; align-items: center; gap: 10px;">
                <label for="pool-filter" style="font-weight: 700; color: #374151;">Filter op poule:</label>
                <select id="pool-filter" style="padding: 10px 12px; border-radius: 8px; border: 1px solid #d1d5db; min-width: 160px;">
                    <option value="">Alle poules</option>
                    @php
                    $pools = collect($fixtures)
                    ->map(fn($f) => $f->team1->pool)
                    ->filter()
                    ->unique()
                    ->sort(fn($a, $b) => $a <=> $b);
                        @endphp
                        @foreach ($pools as $pool)
                        <option value="{{ $pool }}">Poule {{ $pool }}</option>
                        @endforeach
                </select>
            </div>
        </div>

        <section style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 14px;">
            @forelse ($fixtures as $fixture)
            <article class="fixture-wrapper" data-fixture-pool="{{ $fixture->team1->pool }}" style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 16px; box-shadow: 0 10px 22px rgba(0,0,0,0.05); display: flex; flex-direction: column; gap: 10px;">
                <header style="display: flex; justify-content: space-between; gap: 8px; align-items: flex-start;">
                    <div style="display: flex; flex-direction: column; gap: 4px;">
                        <span style="display: inline-block; background: #eef2ff; color: #4338ca; padding: 6px 10px; border-radius: 999px; font-weight: 700; font-size: 12px;">Poule {{ $fixture->team1->pool ?? '-' }}</span>
                        <span style="color: #6b7280; font-size: 14px;">Veld {{ $fixture->field ?? '-' }}</span>
                    </div>
                    <div style="text-align: right; color: #374151;">
                        <div style="font-weight: 700;">{{ $fixture->start_time }}</div>
                        <div style="font-size: 13px; color: #6b7280;">tot {{ $fixture->end_time }}</div>
                    </div>
                </header>

                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <div style="display: flex; justify-content: space-between; gap: 8px; align-items: center;">
                        <div style="font-weight: 700; color: #111827;">{{ $fixture->team1->name }}</div>
                        <div style="font-size: 18px; font-weight: 800;">{{ $fixture->team_1_score }}</div>
                    </div>
                    <div style="display: flex; justify-content: space-between; gap: 8px; align-items: center;">
                        <div style="font-weight: 700; color: #111827;">{{ $fixture->team2->name }}</div>
                        <div style="font-size: 18px; font-weight: 800;">{{ $fixture->team_2_score }}</div>
                    </div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; gap: 10px; color: #4b5563; font-size: 14px;">
                    <span>Scheidsrechter: {{ $fixture->scheidsrechter ? $fixture->scheidsrechter->name : 'Niet toegewezen' }}</span>
                </div>

                @auth
                @if (auth()->user()->isAdmin)
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <a href="{{ route('fixtures.edit', $fixture->id) }}" class="btn-fixture edit" style="text-decoration: none; flex: 1 1 120px; text-align: center;">Aanpassen</a>
                    <form method="POST" action="{{ route('fixtures.destroy', $fixture->id) }}" onsubmit="return confirm('Weet je zeker dat je dit wilt verwijderen?');" style="flex: 1 1 120px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-fixture delete" style="width: 100%;">Verwijderen</button>
                    </form>
                </div>
                @endif
                @endauth
            </article>
            @empty
            <div style="grid-column: 1 / -1; background: #f9fafb; border: 1px dashed #d1d5db; border-radius: 12px; padding: 18px; text-align: center; color: #6b7280;">
                <p style="margin: 0 0 8px; font-weight: 700;">Nog geen wedstrijden ingepland.</p>
                <p style="margin: 0;">Zodra er wedstrijden zijn gepland verschijnen ze hier.</p>
            </div>
            @endforelse
        </section>

    </main>

    <script>
        const poolFilter = document.getElementById('pool-filter');
        if (poolFilter) {
            poolFilter.addEventListener('change', function() {
                const selectedPool = this.value;
                const fixtures = document.querySelectorAll('.fixture-wrapper');

                fixtures.forEach(wrapper => {
                    const fixturePool = wrapper.getAttribute('data-fixture-pool');
                    wrapper.style.display = (selectedPool === '' || fixturePool === selectedPool) ? 'block' : 'none';
                });
            });
        }
    </script>
</x-base-layout>