<x-base-layout>

    <div class="wrapper">
        <img src="{{ asset('img/Logo.png') }}" alt="###">

        <nav>
            <a href="{{ route('tournaments') }}">Toernooien</a>
            @auth
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

        <!-- <img src="{{ asset('img/test123.png') }}" alt="###"> -->
    </div>

</x-base-layout>
