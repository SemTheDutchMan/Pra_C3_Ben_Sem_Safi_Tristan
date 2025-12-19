<x-base-layout>
    <main class="toernooi-stand-page">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <a href="{{ route('tournaments.show', $tournament) }}" class="btn-goback">← Terug naar wedstrijden</a>
            <h1 style="margin: 0;">{{ $tournament->name }} - Stand</h1>
            <a href="{{ route('tournaments.index') }}" class="btn-goback">Alle Toernooien</a>
        </div>

        @foreach ($stand as $pool => $teams)
        <div class="pool-stand-wrapper" style="margin-bottom: 30px;">

            <h3 style="display: flex; justify-content: center;">Poule {{ $pool }}</h3>

            <table class="toernooi-tabel" style="margin-bottom: 10px; width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="text-align:left; padding: 8px; border-bottom: 2px solid;">Team</th>
                        <th style="text-align:center; padding: 8px; border-bottom: 2px solid;">Punten</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                    <tr>
                        <td style="padding: 8px; border-bottom: 1px solid;">{{ $team->name }}</td>
                        <td style="text-align:center; padding: 8px; border-bottom: 1px solid;">{{ $team->poulePoints }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        @endforeach

    </main>
</x-base-layout>