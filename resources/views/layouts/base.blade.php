<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <header>
        <div class="homepage_header">
            <a href="{{ route('homepage') }}"><img src="{{ asset('img/home.png') }}" alt="homepage image"></a>
            <nav>
                <h2 style="color: plum;">Welkom bij Paastoernooi Boz!</h2>
            </nav>
            <a href="{{ route('login')}}"><img src="{{ @asset('img/icontest.png')}}" alt="###"></a>
        </div>
    </header>

    <main>
    </main>
    {{ $slot }}

    <footer>

        <div class="partial_footer">
            <div class="title_partial_footer">
                <p>Contact:</p>
            </div>
            <p>+31 06 12345678</p>
            <mailto:p> stichtingpaastoernooiboz@gmail.com</mailto:p>
        </div>

        <div class="partial_footer">
            <div class="media_footer">
                <a href="###"><img src="{{ asset('img/media_icons/facebook.png') }}" alt="Facebook"></a>
                <a href="###"><img src="{{ asset('img/media_icons/instagram.png') }}" alt="Instagram"></a>
                <a href="###"><img src="{{ asset('img/media_icons/twitter.png') }}" alt="Twitter"></a>
            </div>
        </div>
    </footer>
</body>

</html>