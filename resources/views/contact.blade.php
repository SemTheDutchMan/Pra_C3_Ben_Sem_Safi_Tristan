<x-base-layout>
    <main style="max-width: 900px; margin: 40px auto; padding: 0 20px 70px; min-height: 70vh;">
        <header style="text-align: center; margin-bottom: 24px;">
            <p style="margin: 0; color: #6b7280; font-weight: 700; font-size: 12px; letter-spacing: 0.08em; text-transform: uppercase;">Contact</p>
            <h1 style="margin: 8px 0 6px; font-size: 32px;">Neem contact op</h1>
            <p style="margin: 0; color: #4b5563;">Stel je vraag of geef wijzigingen door. We reageren zo snel mogelijk.</p>
        </header>

        @if (session('status'))
        <div style="margin-bottom: 18px; border: 1px solid #bbf7d0; background: #ecfdf3; color: #166534; padding: 12px 14px; border-radius: 10px; font-size: 14px;">
            {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST" style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 20px; box-shadow: 0 10px 22px rgba(0,0,0,0.05); display: grid; gap: 14px;">
            @csrf

            <div style="display: grid; gap: 8px;">
                <label for="name" style="font-weight: 700; color: #111827;">Naam</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Vul je naam in" style="padding: 12px 14px; border-radius: 10px; border: 1px solid #d1d5db; outline: none;" required />
            </div>

            <div style="display: grid; gap: 8px;">
                <label for="email" style="font-weight: 700; color: #111827;">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Vul je e-mail in" style="padding: 12px 14px; border-radius: 10px; border: 1px solid #d1d5db; outline: none;" required />
            </div>

            <div style="display: grid; gap: 8px;">
                <label for="message" style="font-weight: 700; color: #111827;">Bericht (max. 1000 tekens)</label>
                <textarea id="message" name="message" rows="6" placeholder="Vul je bericht in" style="padding: 12px 14px; border-radius: 10px; border: 1px solid #d1d5db; outline: none; resize: vertical;" required>{{ old('message') }}</textarea>
            </div>

            <div style="display: flex; justify-content: flex-end;">
                <button type="submit" class="btn-details" style="padding: 12px 16px; min-width: 160px;">Verstuur</button>
            </div>
        </form>
    </main>
</x-base-layout>