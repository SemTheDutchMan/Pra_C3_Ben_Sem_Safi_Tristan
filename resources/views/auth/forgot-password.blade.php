<x-guest-layout>
    <main style="max-width: 500px; margin: 40px auto; padding: 0 20px 50px; min-height: 70vh;">
        <header style="text-align: center; margin-bottom: 18px;">
            <p style="margin: 0; color: #6b7280; font-weight: 700; font-size: 12px; letter-spacing: 0.08em; text-transform: uppercase;">Wachtwoord vergeten</p>
            <h1 style="margin: 6px 0 0; font-size: 26px;">Stuur een resetlink</h1>
        </header>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 20px; box-shadow: 0 10px 22px rgba(0,0,0,0.05); display: grid; gap: 14px;">
            @csrf

            <p style="margin: 0; color: #4b5563; font-size: 14px;">Vul je e-mailadres in en we sturen een link om je wachtwoord te resetten.</p>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div style="display: flex; justify-content: flex-end;">
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </main>
</x-guest-layout>