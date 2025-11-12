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
            <img src="{{ asset('img/icontest.png') }}" alt="###">
            <h1>Stichting Paastoernooien</h1>
            <img src="{{ asset('img/icontest.png') }}" alt="###">
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
            <p>Telefoon: #################</p>
            <mailto:p> stichtingpaastoernooiboz@gmail.com</mailto:p>
            <p>extra: #################</p>
        </div>

        <div class="partial_footer">
            <div class="title_partial_footer">
                <p>Media</p>
            </div>
            <p>Facebook: #################</p>
            <p>Instagram: #################</p>
            <p>Twitter: #################</p>
            <p>tiktok: #################</p>
        </div>
    </footer>
</body>

</html>