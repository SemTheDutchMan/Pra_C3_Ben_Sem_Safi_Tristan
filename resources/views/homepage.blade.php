<x-base-layout>

    <div class="wrapper text-gray-900">
        <img src="{{ asset('img/Logo.png') }}" alt="Logo Boz">

        <nav>
            <a href="{{ route('rules') }}">Regels & info</a>
            @auth
            <a href="{{ route('school.create') }}">Inschrijven</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Logout') }}</a>
            </form>
            @else
            <a href="{{ route('school.create') }}">Inschrijven</a>
            @endauth
            <a href="{{ route('contact.create') }}">Contact</a>

        </nav>
    </div>

</x-base-layout>