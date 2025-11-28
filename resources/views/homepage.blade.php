<x-base-layout>

    <div class="wrapper">
        <img src="{{ asset('img/Logo.png') }}" alt="###">

        <nav>
            <a href="###">Toernooien</a>
            @auth
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Logout') }}</a>
                </form>
            @else
                <a href="{{ route('login') }}">Aanmelden</a>
            @endauth
            <a href="###">Contact</a>
        </nav>

        <!-- <img src="{{ asset('img/test123.png') }}" alt="###"> -->
    </div>

</x-base-layout>