<x-base-layout>
    <main style="max-width: 1100px; margin: 0 auto; padding: 40px 20px 80px; min-height: 80vh; display: flex; flex-direction: column; gap: 32px;">
        <header style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 18px; align-items: center;">
            <div style="display: flex; gap: 16px; align-items: center;">
                <div style="width: 120px; height: 120px; border-radius: 18px; background: linear-gradient(135deg, #ec4899, #d946ef); display: flex; align-items: center; justify-content: center; box-shadow: 0 12px 28px rgba(0,0,0,0.1);">
                    <img src="{{ asset('img/Logo.png') }}" alt="Logo Boz" style="height: 72px; width: auto; filter: drop-shadow(0 6px 10px rgba(0,0,0,0.12));">
                </div>
                <div>
                    <p style="margin: 0; color: #8b2c7c; font-weight: 700; font-size: 12px; letter-spacing: 0.08em; text-transform: uppercase;">Stichting Paastoernooien</p>
                    <h1 style="margin: 6px 0 0; font-size: 32px;">Welkom bij het Paastoernooi</h1>
                    <p style="margin: 6px 0 0; color: #4b5563;">Voetbal- en lijnbaltoernooien voor scholen in Bergen op Zoom en omgeving.</p>
                </div>
            </div>
            <div style="background: #fff; border: 1px solid #f3e8ff; border-radius: 14px; padding: 16px; box-shadow: 0 12px 28px rgba(0,0,0,0.06); display: grid; gap: 10px;">
                <div style="display: inline-flex; align-items: center; gap: 8px; padding: 6px 10px; background: #fdf2f8; color: #8b2c7c; border-radius: 999px; width: fit-content; font-weight: 700; font-size: 12px; letter-spacing: 0.04em;">
                    Actuele status
                </div>
                <div style="display: grid; gap: 8px; color: #374151;">
                    <div style="display: flex; justify-content: space-between;">
                        <span>Inschrijven</span>
                        <strong style="color: #8b2c7c;">Open</strong>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span>Schema's</span>
                        <strong style="color: #8b2c7c;">Beschikbaar</strong>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span>Toernooi start</span>
                        <strong style="color: #8b2c7c;">April</strong>
                    </div>
                </div>
                <a href="{{ route('tournaments.public') }}" class="btn-details" style="text-decoration: none; background: linear-gradient(135deg, #ec4899, #d946ef); color: #fff; text-align: center;">Bekijk toernooien</a>
            </div>
        </header>

        <section style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 14px;">
            <article style="background: linear-gradient(135deg, #fef3c7, #fde68a); border: 1px solid #fcd34d; border-radius: 14px; padding: 16px; box-shadow: 0 10px 22px rgba(0,0,0,0.05); display: flex; gap: 12px; align-items: flex-start;">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #fbbf24; display: flex; align-items: center; justify-content: center; color: #92400e; font-weight: 800;">★</div>
                <div>
                    <h3 style="margin: 0 0 6px; font-size: 20px;">Schrijf je school in</h3>
                    <p style="margin: 0 0 10px; color: #4b5563;">Meld teams aan en geef een scheidsrechter op.</p>
                    <a href="{{ route('school.create') }}" class="btn-details" style="text-decoration: none;">Naar inschrijven</a>
                </div>
            </article>
            <article style="background: linear-gradient(135deg, #e0f2fe, #bfdbfe); border: 1px solid #93c5fd; border-radius: 14px; padding: 16px; box-shadow: 0 10px 22px rgba(0,0,0,0.05); display: flex; gap: 12px; align-items: flex-start;">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #60a5fa; display: flex; align-items: center; justify-content: center; color: #0b4f91; font-weight: 800;">⚽</div>
                <div>
                    <h3 style="margin: 0 0 6px; font-size: 20px;">Bekijk toernooien</h3>
                    <p style="margin: 0 0 10px; color: #4b5563;">Bekijk geplande toernooien, schema's en standen.</p>
                    <a href="{{ route('tournaments.public') }}" class="btn-details" style="text-decoration: none;">Toernooioverzicht</a>
                </div>
            </article>
            <article style="background: linear-gradient(135deg, #ecfeff, #cffafe); border: 1px solid #a5f3fc; border-radius: 14px; padding: 16px; box-shadow: 0 10px 22px rgba(0,0,0,0.05); display: flex; gap: 12px; align-items: flex-start;">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #22d3ee; display: flex; align-items: center; justify-content: center; color: #0f172a; font-weight: 800;">ℹ</div>
                <div>
                    <h3 style="margin: 0 0 6px; font-size: 20px;">Regels & info</h3>
                    <p style="margin: 0 0 10px; color: #4b5563;">Lees de belangrijkste afspraken en speelschema uitleg.</p>
                    <a href="{{ route('rules') }}" class="btn-details" style="text-decoration: none;">Lees regels</a>
                </div>
            </article>
            <article style="background: linear-gradient(135deg, #f5f3ff, #e0e7ff); border: 1px solid #c7d2fe; border-radius: 14px; padding: 16px; box-shadow: 0 10px 22px rgba(0,0,0,0.05); display: flex; gap: 12px; align-items: flex-start;">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: #a78bfa; display: flex; align-items: center; justify-content: center; color: #312e81; font-weight: 800;">✉</div>
                <div>
                    <h3 style="margin: 0 0 6px; font-size: 20px;">Contact</h3>
                    <p style="margin: 0 0 10px; color: #4b5563;">Stel je vraag of meld een wijziging.</p>
                    <a href="{{ route('contact.create') }}" class="btn-fixture edit" style="text-decoration: none;">Stuur bericht</a>
                </div>
            </article>
        </section>

        <section style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 16px; align-items: stretch;">
            <article style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 18px; box-shadow: 0 12px 28px rgba(0,0,0,0.06); display: grid; gap: 10px;">
                <h3 style="margin: 0; font-size: 20px;">Wat je kunt verwachten</h3>
                <ul style="margin: 0; padding-left: 18px; color: #4b5563; display: grid; gap: 6px;">
                    <li>Poule- en knock-outrondes voor eerlijke strijd.</li>
                    <li>Live schema's en standen voor deelnemers en publiek.</li>
                    <li>Genoeg pauzes en veldrotatie zodat teams kunnen herstellen.</li>
                    <li>Archief van gespeelde toernooien om terug te kijken.</li>
                </ul>
            </article>
            <article style="background: #0f172a; color: #e2e8f0; border-radius: 12px; padding: 18px; box-shadow: 0 12px 28px rgba(0,0,0,0.12); display: grid; gap: 10px;">
                <h3 style="margin: 0; font-size: 20px;">Belangrijke data</h3>
                <div style="display: grid; grid-template-columns: 1fr; gap: 8px;">
                    <div style="display: flex; justify-content: space-between;">
                        <span>Inschrijfperiode</span>
                        <strong>December</strong>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span>Schema live</span>
                        <strong>3-4 weken vooraf</strong>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span>Toernooi</span>
                        <strong>Begin april</strong>
                    </div>
                </div>
                <a href="{{ route('rules') }}" class="btn-details" style="text-decoration: none; width: fit-content; background: #e0f2fe; color: #0f172a;">Lees de regels</a>
            </article>
        </section>
    </main>
</x-base-layout>