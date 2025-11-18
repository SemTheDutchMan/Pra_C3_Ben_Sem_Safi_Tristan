<x-base-layout>
    <h1 class="H1">Admin Paneel</h1>

    <div class="Nav-Admin">
        <a href="{{ route('tournaments') }}" class="nav-button">Toernooien</a>
    </div>
    <div class="Nav-Admin">
        <a href="{{ route('users') }}" class="nav-button">Gebruikers</a>
    </div>

</x-base-layout>