<x-app-layout>
    <main class="tournaments-page">

        <div style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto 30px; padding: 0 20px;">
            <h1 style="margin: 0;">Toernooien</h1>
            @auth
            @if (auth()->user()->isAdmin)
            <a href="{{ route('tournaments.create') }}" class="btn-details" style="text-decoration: none;">
                + Nieuw Toernooi
            </a>
            @endif
            @endauth
        </div>


        <section class="toernooi-lijst">
            <table class="toernooi-tabel">

                <thead>
                    <tr>
                        <th>Naam Tournament</th>
                        <th>Details</th>

                        @auth
                        @if (auth()->user()->isAdmin)
                        <th>Acties</th>
                        @endif
                        @endauth
                    </tr>
                </thead>

                <tbody>
                    @forelse ($tournaments as $tournament)
                    <tr>
                        <td>{{ $tournament->name }}</td>
                        <td>
                            <a href="{{ route('tournaments.show', $tournament->id) }}" class="btn-details">
                                Bekijk details
                            </a>
                        </td>

                        @auth
                        @if (auth()->user()->isAdmin)
                        <td>
                            <form method="POST" action="{{ route('tournaments.destroy', $tournament->id) }}"
                                onsubmit="return confirm('Weet je zeker dat je dit wilt verwijderen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-fixture delete">Verwijder</button>
                            </form>
                        </td>
                        @endif
                        @endauth
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">Geen toernooien gevonden.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </section>

    </main>
</x-app-layout>