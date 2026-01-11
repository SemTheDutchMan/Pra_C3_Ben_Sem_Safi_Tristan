<x-app-layout>
    <main style="max-width: 720px; margin: 40px auto; padding: 0 20px 60px; min-height: 70vh;">
        <header style="display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap; margin-bottom: 18px;">
            <div>
                <p style="margin: 0; color: #6b7280; font-weight: 700; font-size: 12px; letter-spacing: 0.08em; text-transform: uppercase;">Contact</p>
                <h1 style="margin: 4px 0 0; font-size: 28px;">Bericht van {{ $contact->name }}</h1>
                <p style="margin: 6px 0 0; color: #4b5563;">{{ $contact->email }}</p>
            </div>
        </header>

        <article style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 20px; box-shadow: 0 10px 22px rgba(0,0,0,0.05); display: flex; flex-direction: column; gap: 12px;">
            <div>
                <p style="margin: 0 0 6px; color: #6b7280; font-weight: 700; font-size: 12px; letter-spacing: 0.04em;">Bericht</p>
                <p style="margin: 0; color: #111827; white-space: pre-line;">{{ $contact->message }}</p>
            </div>

            <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" style="margin-top: 4px; display: flex; justify-content: flex-end;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-fixture delete" style="padding: 10px 14px; min-width: 160px;" onclick="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?');">
                    Verwijder bericht
                </button>
            </form>
        </article>
    </main>
</x-app-layout>