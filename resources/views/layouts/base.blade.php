<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body style="margin: 0; min-height: 100vh; display: flex; flex-direction: column; background: #f8fafc; color: #0f172a;">
    <header style="background: #8b2c7c; color: #fff1f2; box-shadow: 0 6px 16px rgba(0,0,0,0.12);">
        <div style="max-width: 1200px; margin: 0 auto; padding: 14px 20px; display: flex; align-items: center; justify-content: space-between; gap: 14px; flex-wrap: wrap;">
            <a href="{{ route('homepage') }}" style="display: flex; align-items: center; gap: 10px; text-decoration: none; color: inherit;">
                <div style="width: 46px; height: 46px; border-radius: 12px; background: linear-gradient(135deg, #ec4899, #d946ef); display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 18px rgba(0,0,0,0.18);">
                    <img src="{{ asset('img/Logo.png') }}" alt="Logo" style="height: 34px; width: auto; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.14));">
                </div>
                <div>
                    <strong style="font-size: 16px;">Paastoernooi Boz</strong>
                    <div style="font-size: 13px; color: #ffe4f3;">Schooltoernooien voetbal & lijnbal</div>
                </div>
            </a>
            <nav style="display: flex; gap: 10px; flex-wrap: wrap; align-items: center;">
                <a href="{{ route('tournaments.public') }}" class="btn-details" style="text-decoration: none; background: #ffe4f3; color: #8b2c7c;">Toernooien</a>
                <a href="{{ route('rules') }}" class="btn-details" style="text-decoration: none; background: #ffe4f3; color: #8b2c7c;">Regels</a>
                <a href="{{ route('contact.create') }}" class="btn-fixture edit" style="text-decoration: none;">Contact</a>
                <a href="{{ route('school.create') }}" class="btn-details" style="text-decoration: none;">Inschrijven</a>
                @auth
                <a href="{{ route('dashboard') }}" class="btn-details" style="text-decoration: none; background: #ffe4f3; color: #8b2c7c;">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn-fixture delete" style="border: none; cursor: pointer;">Logout</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="btn-fixture edit" style="text-decoration: none;">Login</a>
                @endauth
            </nav>
        </div>
    </header>

    <main style="flex: 1;">
        {{ $slot }}
    </main>

    <footer style="background: #701a75; color: #ffe4f3; padding: 28px 20px; margin-top: 40px;">
        <div style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px; align-items: start;">
            <div>
                <h3 style="margin: 0 0 8px; font-size: 16px;">Stichting Paastoernooien</h3>
                <p style="margin: 0; color: #ffd6e7;">Voetbal- en lijnbaltoernooien voor scholen in Bergen op Zoom en omgeving.</p>
            </div>
            <div>
                <h4 style="margin: 0 0 6px; font-size: 15px;">Contact</h4>
                <p style="margin: 0; color: #ffd6e7;">+31 6 12345678</p>
                <p style="margin: 4px 0 0; color: #ffd6e7;">stichtingpaastoernooiboz@gmail.com</p>
            </div>
            <div>
                <h4 style="margin: 0 0 6px; font-size: 15px;">Handig</h4>
                <div style="display: grid; gap: 6px;">
                    <a href="{{ route('tournaments.public') }}" style="color: #ffe4f3; text-decoration: none;">Toernooioverzicht</a>
                    <a href="{{ route('rules') }}" style="color: #ffe4f3; text-decoration: none;">Regels & info</a>
                    <a href="{{ route('contact.create') }}" style="color: #ffe4f3; text-decoration: none;">Contact opnemen</a>
                </div>
            </div>
            <div>
                
            </div>
        </div>
        <div style="max-width: 1200px; margin: 18px auto 0; color: #fecdd3; font-size: 13px;">© {{ date('Y') }} Stichting Paastoernooien. Alle rechten voorbehouden.</div>
    </footer>
</body>

</html>