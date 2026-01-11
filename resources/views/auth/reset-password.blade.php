<x-guest-layout>
    <main style="max-width: 500px; margin: 40px auto; padding: 0 20px 50px; min-height: 70vh;">
        <header style="text-align: center; margin-bottom: 18px;">
            <p style="margin: 0; color: #6b7280; font-weight: 700; font-size: 12px; letter-spacing: 0.08em; text-transform: uppercase;">Wachtwoord resetten</p>
            <h1 style="margin: 6px 0 0; font-size: 26px;">Stel een nieuw wachtwoord in</h1>
        </header>

        <form method="POST" action="{{ route('password.store') }}" style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 20px; box-shadow: 0 10px 22px rgba(0,0,0,0.05); display: grid; gap: 14px;">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div style="display: flex; justify-content: flex-end;">
                <x-primary-button>
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
        </form>
    </main>
</x-guest-layout>