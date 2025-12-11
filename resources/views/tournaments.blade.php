<x-base-layout>

    <h1 class="H1">Toernooien</h1>

    <!-- Hier komen de toernooien :)  -->


</x-base-layout>
@extends('layouts.base')

@section('content')
<main class="tournaments-page">

    {{-- Hero / titel --}}
    <section class="tournaments-hero">
        <h1>Toernooien</h1>
        <p>
            Stichting Paastoernooien organiseert ieder jaar voetbal- en lijnbaltoernooien
            voor basisscholen en middelbare scholen in Bergen op Zoom en omgeving.
            Op deze pagina vind je een overzicht van de opzet per toernooi, de leeftijden
            en de belangrijkste spelafspraken.
        </p>
    </section>

    {{-- Basisschool toernooien --}}
    <section class="tournament-section">
        <h2>Basisschool – Voetbaltoernooien</h2>
        <p>
            Voor de basisschool zijn er aparte toernooien per leerjaar. Teams schrijven zich
            in per school; bij meerdere teams van dezelfde school mag de school zelf de namen
            bepalen (bijvoorbeeld “De Sprong 1” en “De Sprong 2”). :contentReference[oaicite:1]{index=1}
        </p>

        <div class="tournament-table-wrapper">
            <table class="tournament-table">
                <thead>
                    <tr>
                        <th>Groep</th>
                        <th>Aantal velden</th>
                        <th>Teamgrootte</th>
                        <th>Wedstrijdduur</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Groep 3–4</td>
                        <td>3</td>
                        <td>8 spelers + 2 reserves</td>
                        <td>15 minuten</td>
                    </tr>
                    <tr>
                        <td>Groep 5–6</td>
                        <td>8</td>
                        <td>8 spelers + 2 reserves</td>
                        <td>15 minuten</td>
                    </tr>
                    <tr>
                        <td>Groep 7–8</td>
                        <td>8</td>
                        <td>12 spelers per team</td>
                        <td>15 minuten</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p class="tournament-note">
            In de poulefase worden 3 punten gegeven voor een overwinning. Bij een gelijkspel
            in de poule telt het totale aantal punten; in de finaleronde wordt een gelijkspel
            beslist met strafschoppen. :contentReference[oaicite:2]{index=2}
        </p>
    </section>

    {{-- Middelbare school toernooien --}}
    <section class="tournament-section">
        <h2>Middelbare school – Voetbaltoernooien</h2>
        <p>
            Voor middelbare scholen zijn er aparte toernooien voor jongens en meisjes.
            Ook hier schrijft iedere school zelf haar teams in. Er is geen maximum aantal
            teams per school. :contentReference[oaicite:3]{index=3}
        </p>

        <div class="tournament-table-wrapper">
            <table class="tournament-table">
                <thead>
                    <tr>
                        <th>Categorie</th>
                        <th>Aantal velden</th>
                        <th>Teamgrootte</th>
                        <th>Wedstrijdduur</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Middelbare jongens</td>
                        <td>3</td>
                        <td>11 spelers (max. 13)</td>
                        <td>15 minuten</td>
                    </tr>
                    <tr>
                        <td>Middelbare meisjes</td>
                        <td>2</td>
                        <td>10 spelers</td>
                        <td>15 minuten</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    {{-- Lijnbal --}}
    <section class="tournament-section">
        <h2>Lijnbaltoernooien</h2>
        <p>
            Naast voetbal is er ook een apart lijnbaltoernooi. Het lijnbaltoernooi wordt
            gespeeld op 4 velden. Lijnbalwedstrijden duren 10 minuten.
        </p>
    </section>

    {{-- Toernooi-opzet & schema --}}
    <section class="tournament-section">
        <h2>Toernooi-opzet</h2>
        <ul class="tournament-list">
            <li>Wedstrijden worden in poules gespeeld, gevolgd door een knock-outfase.</li>
            <li>Na de poulefase wordt automatisch een knock-outschema gegenereerd.</li>
            <li>Per team worden maximaal 2 à 3 wedstrijden achter elkaar ingepland.</li>
            <li>Na de poulefase is er een pauze van ongeveer 10 minuten.</li>
            <li>Wedstrijden en uitslagen zijn op de website terug te zien.</li>
        </ul>
    </section>

    {{-- Inschrijven & praktische info --}}
    <section class="tournament-section">
        <h2>Inschrijven & praktische informatie</h2>
        <div class="tournament-grid">
            <div class="tournament-card">
                <h3>Inschrijfperiode</h3>
                <p>
                    Scholen schrijven zich meestal in rond december. Het Paastoernooi
                    vindt plaats aan het begin van april. Wedstrijdschema’s worden ongeveer
                    3–4 weken van tevoren ingepland. :contentReference[oaicite:5]{index=5}
                </p>
            </div>

            <div class="tournament-card">
                <h3>Wijzigen & uitschrijven</h3>
                <p>
                    Via het schoolaccount kunnen teams worden aangemeld, aangepast of
                    uitgeschreven (bijvoorbeeld bij ziekte). Ook kan de organisatie teams
                    of wedstrijden verwijderen indien nodig. :contentReference[oaicite:6]{index=6}
                </p>
            </div>

            <div class="tournament-card">
                <h3>Kosten</h3>
                <p>
                    Deelnamekosten bedragen <strong>€ 35,- per team</strong>. Betalingsinformatie
                    wordt gedeeld via de organisatie na inschrijving. :contentReference[oaicite:7]{index=7}
                </p>
            </div>

            <div class="tournament-card">
                <h3>Archief</h3>
                <p>
                    Uitslagen en standen van gespeelde toernooien blijven nog enkele maanden
                    beschikbaar zodat scholen deze achteraf kunnen terugkijken. Daarna worden
                    gegevens automatisch verwijderd in verband met privacy.
                </p>
            </div>
        </div>
    </section>

</main>
@endsection
