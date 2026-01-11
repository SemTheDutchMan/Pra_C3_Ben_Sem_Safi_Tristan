<x-app-layout>

    <main style="max-width: 1200px; margin: 30px auto 70px; padding: 0 20px; min-height: 70vh; display: flex; flex-direction: column; gap: 20px;">
        @if($user->isAdmin)
        <section style="background: linear-gradient(135deg, #ec4899, #d946ef); color: #fff; border-radius: 18px; padding: 20px; box-shadow: 0 16px 32px rgba(0,0,0,0.16); display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 14px; align-items: center;">
            <div style="display: grid; gap: 8px;">
                <span style="background: rgba(255,255,255,0.16); padding: 6px 12px; border-radius: 999px; font-weight: 700; font-size: 12px; letter-spacing: 0.08em; text-transform: uppercase; width: fit-content;">Dashboard</span>
                <h1 style="margin: 0; font-size: 32px;">Beheer overzicht</h1>
                <p style="margin: 0; color: #ffe4f3;">Accounts, inschrijvingen en contactberichten in één oogopslag.</p>
            </div>
            <div style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: flex-end;">
                <div style="background: #fdf2f8; color: #8b2c7c; padding: 10px 14px; border-radius: 12px; min-width: 160px; box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);">
                    <div style="font-size: 13px; color: #8b2c7c;">Admins</div>
                    <strong style="font-size: 20px; color: #7e1f6b;">{{ $all->where('isAdmin', 1)->count() }}</strong>
                </div>
                <div style="background: #fdf2f8; color: #8b2c7c; padding: 10px 14px; border-radius: 12px; min-width: 160px; box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);">
                    <div style="font-size: 13px; color: #8b2c7c;">Gebruikers</div>
                    <strong style="font-size: 20px; color: #7e1f6b;">{{ $all->where('isAdmin', 0)->count() }}</strong>
                </div>
                <div style="background: #fdf2f8; color: #8b2c7c; padding: 10px 14px; border-radius: 12px; min-width: 160px; box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);">
                    <div style="font-size: 13px; color: #8b2c7c;">Inschrijvingen</div>
                    <strong style="font-size: 20px; color: #7e1f6b;">{{ $inschrijvingen->count() }}</strong>
                </div>
                <div style="background: #fdf2f8; color: #8b2c7c; padding: 10px 14px; border-radius: 12px; min-width: 160px; box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);">
                    <div style="font-size: 13px; color: #8b2c7c;">Contact</div>
                    <strong style="font-size: 20px; color: #7e1f6b;">{{ $contact->count() }}</strong>
                </div>
            </div>
        </section>

        <section style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 14px; margin-top: 4px;">
            <article style="background: #ffffff; border: 1px solid #f3e8ff; border-radius: 14px; padding: 16px; box-shadow: 0 12px 24px rgba(0,0,0,0.08); display: grid; gap: 10px;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span style="width: 38px; height: 38px; border-radius: 10px; background: #fdf2f8; color: #8b2c7c; display: inline-flex; align-items: center; justify-content: center; font-weight: 800;">A</span>
                    <h2 style="margin: 0; font-size: 18px;">Admin accounts</h2>
                </div>
                <ul style="margin: 0; padding-left: 18px; color: #374151; display: flex; flex-direction: column; gap: 6px;">
                    @forelse($all as $usr)
                    @if ($usr->isAdmin == 1)
                    <li><a href="{{ route('profile.show', $usr->id) }}" style="color: #7e1f6b; text-decoration: none;">{{ $usr->name }} <span style="color: #6b7280;">- {{ $usr->email }}</span></a></li>
                    @endif
                    @empty
                    <li>Geen admin accounts gevonden.</li>
                    @endforelse
                </ul>
            </article>

            <article style="background: #ffffff; border: 1px solid #f3e8ff; border-radius: 14px; padding: 16px; box-shadow: 0 12px 24px rgba(0,0,0,0.08); display: grid; gap: 10px;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span style="width: 38px; height: 38px; border-radius: 10px; background: #fdf2f8; color: #8b2c7c; display: inline-flex; align-items: center; justify-content: center; font-weight: 800;">G</span>
                    <h2 style="margin: 0; font-size: 18px;">Gebruikers</h2>
                </div>
                <ul style="margin: 0; padding-left: 18px; color: #374151; display: flex; flex-direction: column; gap: 6px;">
                    @forelse($all as $usr)
                    @if ($usr->isAdmin == 0)
                    <li><a href="{{ route('profile.show', $usr->id) }}" style="color: #7e1f6b; text-decoration: none;">{{ $usr->name }} <span style="color: #6b7280;">- {{ $usr->email }}</span></a></li>
                    @endif
                    @empty
                    <li>Geen gebruikers gevonden.</li>
                    @endforelse
                </ul>
            </article>

            <article style="background: #ffffff; border: 1px solid #f3e8ff; border-radius: 14px; padding: 16px; box-shadow: 0 12px 24px rgba(0,0,0,0.08); display: grid; gap: 10px;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span style="width: 38px; height: 38px; border-radius: 10px; background: #fdf2f8; color: #8b2c7c; display: inline-flex; align-items: center; justify-content: center; font-weight: 800;">I</span>
                    <h2 style="margin: 0; font-size: 18px;">Inschrijvingen</h2>
                </div>
                <ul style="margin: 0; padding-left: 18px; color: #374151; display: flex; flex-direction: column; gap: 6px;">
                    @forelse($inschrijvingen as $inschrijving)
                    <li><a href="{{ route('school.show', $inschrijving->id) }}" style="color: #7e1f6b; text-decoration: none;">{{ $inschrijving->name }} <span style="color: #6b7280;">- {{ $inschrijving->email }} ({{ $inschrijving->referee_email }})</span></a></li>
                    @empty
                    <li>Geen inschrijvingen gevonden.</li>
                    @endforelse
                </ul>
            </article>

            <article style="background: #ffffff; border: 1px solid #f3e8ff; border-radius: 14px; padding: 16px; box-shadow: 0 12px 24px rgba(0,0,0,0.08); display: grid; gap: 10px;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span style="width: 38px; height: 38px; border-radius: 10px; background: #fdf2f8; color: #8b2c7c; display: inline-flex; align-items: center; justify-content: center; font-weight: 800;">C</span>
                    <h2 style="margin: 0; font-size: 18px;">Contact berichten</h2>
                </div>
                <ul style="margin: 0; padding-left: 18px; color: #374151; display: flex; flex-direction: column; gap: 6px;">
                    @forelse($contact as $bericht)
                    <li><a href="{{ route('contact.show', $bericht->id) }}" style="color: #7e1f6b; text-decoration: none;">{{ $bericht->name }} <span style="color: #6b7280;">- {{ $bericht->email }}</span></a></li>
                    @empty
                    <li>Geen contactberichten gevonden.</li>
                    @endforelse
                </ul>
            </article>
        </section>
        @else
        <section style="background: #fdf2f8; border: 1px solid #f3e8ff; color: #7e1f6b; padding: 20px; border-radius: 14px; box-shadow: 0 12px 24px rgba(0,0,0,0.08); max-width: 720px; margin: 40px auto;">
            <h1 style="margin: 0 0 8px; font-size: 26px;">Geen toegang</h1>
            <p style="margin: 0;">Je hebt geen rechten om deze pagina te bekijken.</p>
        </section>
        @endif
    </main>

</x-app-layout>