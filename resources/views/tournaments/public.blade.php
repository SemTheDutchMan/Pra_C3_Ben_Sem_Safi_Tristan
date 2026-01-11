<x-base-layout>
    <section style="max-width: 1100px; margin: 40px auto; padding: 0 20px; min-height: 70vh;">
        <div style="display: flex; flex-wrap: wrap; gap: 12px; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <div>
                <p style="margin: 0; color: #6b7280; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 700; font-size: 12px;">Publiek overzicht</p>
                <h1 style="margin: 6px 0 4px; font-size: 32px;">Toernooien</h1>
                <p style="margin: 0; color: #4b5563; max-width: 640px;">Bekijk alle geplande toernooien. Gebruik vernieuwen om actuele wedstrijden en tijden op te halen.</p>
            </div>
            <div style="display: flex; gap: 10px; align-items: center;">
                <button type="button" class="btn-details" onclick="window.location.reload()" style="padding: 10px 14px; min-width: 140px;">
                    ↻ Vernieuwen
                </button>
                <a href="{{ route('tournaments.archive') }}" class="btn-fixture edit" style="text-decoration: none; padding: 10px 14px; min-width: 140px; text-align: center;">
                    Archief bekijken
                </a>
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
                    <span style="background: #eef2ff; color: #4338ca; padding: 6px 10px; border-radius: 999px; font-size: 13px; font-weight: 700;">Gepland</span>
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

                <div style="display: flex; gap: 10px; flex-wrap: wrap; margin-top: 6px;">
                    <a href="{{ route('tournaments.show', $tournament->id) }}" class="btn-details" style="text-decoration: none; flex: 1 1 140px; text-align: center;">Bekijk schema</a>
                    <a href="{{ route('tournaments.standings', $tournament->id) }}" class="btn-fixture edit" style="text-decoration: none; flex: 1 1 140px; text-align: center;">Stand</a>
                </div>
            </article>
            @empty
            <div style="grid-column: 1 / -1; background: #f9fafb; border: 1px dashed #d1d5db; border-radius: 12px; padding: 18px; text-align: center; color: #6b7280;">
                <p style="margin: 0 0 8px; font-weight: 700;">Er zijn nog geen geplande toernooien.</p>
                <p style="margin: 0;">Kijk in het archief of kom later terug via de knop hierboven.</p>
            </div>
            @endforelse
        </div>
    </section>
</x-base-layout>