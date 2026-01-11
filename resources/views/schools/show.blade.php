<x-app-layout>
    <main style="max-width: 960px; margin: 40px auto; padding: 0 20px 70px; min-height: 70vh;">
        <header style="display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap; margin-bottom: 20px;">
            <div>
                <p style="margin: 0; color: #6b7280; font-weight: 700; font-size: 12px; letter-spacing: 0.08em; text-transform: uppercase;">School</p>
                <h1 style="margin: 4px 0 0; font-size: 30px;">{{ $school->name }}</h1>
                <p style="margin: 6px 0 0; color: #4b5563;">{{ $school->email }}</p>
            </div>
            <span style="background: #eef2ff; color: #4338ca; padding: 6px 12px; border-radius: 999px; font-weight: 700; font-size: 13px;">Groepen: {{ $school->group_count }}</span>
        </header>

        <section style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 14px; margin-bottom: 18px;">
            <article style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 16px; box-shadow: 0 10px 22px rgba(0,0,0,0.05);">
                <p style="margin: 0; color: #6b7280; font-weight: 700; font-size: 12px; letter-spacing: 0.04em;">School</p>
                <p style="margin: 6px 0 0; font-size: 18px; color: #111827;">{{ $school->name }}</p>
                <p style="margin: 4px 0 0; color: #4b5563;">{{ $school->email }}</p>
            </article>

            <article style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 16px; box-shadow: 0 10px 22px rgba(0,0,0,0.05);">
                <p style="margin: 0; color: #6b7280; font-weight: 700; font-size: 12px; letter-spacing: 0.04em;">Scheidsrechter</p>
                <p style="margin: 6px 0 0; font-size: 18px; color: #111827;">{{ $school->referee_name }}</p>
                <p style="margin: 4px 0 0; color: #4b5563;">{{ $school->referee_email }}</p>
            </article>

            <article style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 16px; box-shadow: 0 10px 22px rgba(0,0,0,0.05);">
                <p style="margin: 0; color: #6b7280; font-weight: 700; font-size: 12px; letter-spacing: 0.04em;">Klassen</p>
                <p style="margin: 6px 0 0; font-size: 18px; color: #111827;">{{ $school->class }}</p>
            </article>
        </section>

        <div style="display: flex; gap: 10px; flex-wrap: wrap; justify-content: flex-end; margin-top: 12px;">
            <form action="{{ route('school.destroy', $school->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze school wilt verwijderen?');" style="flex: 1 1 140px; max-width: 220px;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-fixture delete" style="width: 100%;">Verwijderen</button>
            </form>
            <a href="{{ route('dashboard') }}" class="btn-details" style="text-decoration: none; flex: 1 1 140px; max-width: 220px; text-align: center;">Terug</a>
        </div>
    </main>
</x-app-layout>