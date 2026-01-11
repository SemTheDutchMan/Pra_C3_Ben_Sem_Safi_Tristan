<x-base-layout>
    <section style="max-width: 1100px; margin: 40px auto; padding: 0 20px; min-height: 70vh;">
        <div style="display: flex; flex-wrap: wrap; gap: 12px; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <div>
                <p style="margin: 0; color: #6b7280; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; font-size: 12px;">Archief</p>
                <h1 style="margin: 6px 0 4px; font-size: 32px;">Eerdere toernooien</h1>
                <p style="margin: 0; color: #4b5563; max-width: 640px;">Browse de afgeronde toernooien en open het schema om terug te kijken.</p>
            </div>
            <div style="display: flex; gap: 10px; align-items: center;">
                <a href="{{ route('tournaments.public') }}" class="btn-details" style="text-decoration: none; padding: 10px 14px; min-width: 140px; text-align: center;">Terug naar overzicht</a>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px;">
            @forelse ($tournaments as $tournament)
            <article style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 18px; box-shadow: 0 8px 18px rgba(0,0,0,0.04); display: flex; flex-direction: column; gap: 10px;">
                <header style="display: flex; justify-content: space-between; align-items: flex-start; gap: 12px;">
                    <div>
                        <h3 style="margin: 0; font-size: 20px;">{{ $tournament->name }}</h3>
                        <p style="margin: 4px 0 0; color: #6b7280;">{{ ucfirst($tournament->sport) }} · {{ $tournament->groep }}</p>
                    </div>
                    <span style="background: #ecfeff; color: #0ea5e9; padding: 6px 10px; border-radius: 999px; font-size: 13px; font-weight: 700;">Afgerond</span>
                </header>

                <dl style="display: grid; grid-template-columns: auto 1fr; gap: 6px 10px; margin: 0; color: #374151;">
                    <dt style="font-weight: 700; color: #6b7280;">Datum</dt>
                    <dd style="margin: 0;">{{ \Carbon\Carbon::parse($tournament->date)->format('d M Y') }}</dd>

                    <dt style="font-weight: 700; color: #6b7280;">Start</dt>
                    <dd style="margin: 0;">{{ $tournament->start_time ? substr($tournament->start_time, 0, 5) : 'n.t.b.' }}</dd>

                    <dt style="font-weight: 700; color: #6b7280;">Velden</dt>
                    <dd style="margin: 0;">{{ $tournament->fields_amount }}</dd>

                    <dt style="font-weight: 700; color: #6b7280;">Teams/poule</dt>
                    <dd style="margin: 0;">{{ $tournament->amount_teams_pool }}</dd>
                </dl>

                <div style="display: flex; gap: 10px; flex-wrap: wrap; margin-top: 6px; align-items: center;">
                    <a href="{{ route('tournaments.show', $tournament->id) }}" class="btn-details" style="text-decoration: none; flex: 1 1 140px; text-align: center;">Toernooi bekijken</a>
                    <a href="{{ route('tournaments.standings', $tournament->id) }}" class="btn-fixture edit" style="text-decoration: none; flex: 1 1 140px; text-align: center;">Eindstand</a>
                    @auth
                    @if (auth()->user()->isAdmin)
                    <form method="POST" action="{{ route('tournaments.destroy', $tournament->id) }}" onsubmit="return confirm('Weet je zeker dat je dit toernooi wilt verwijderen?');" style="flex: 1 1 140px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-fixture delete" style="width: 100%;">Verwijderen</button>
                    </form>
                    @endif
                    @endauth
                </div>
            </article>
            @empty
            <div style="grid-column: 1 / -1; background: #f9fafb; border: 1px dashed #d1d5db; border-radius: 12px; padding: 18px; text-align: center; color: #6b7280;">
                <p style="margin: 0 0 8px; font-weight: 700;">Nog geen afgeronde toernooien in het archief.</p>
                <p style="margin: 0;">Wanneer een toernooi wordt afgesloten verschijnt het hier.</p>
            </div>
            @endforelse
        </div>
    </section>
</x-base-layout>