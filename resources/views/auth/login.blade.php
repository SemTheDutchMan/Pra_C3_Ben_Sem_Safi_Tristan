<x-guest-layout>
    <main style="max-width: 480px; margin: 40px auto; padding: 0 20px 50px; min-height: 70vh;">
        <header style="text-align: center; margin-bottom: 18px;">
            <p style="margin: 0; color: #6b7280; font-weight: 700; font-size: 12px; letter-spacing: 0.08em; text-transform: uppercase;">Login</p>
            <h1 style="margin: 6px 0 0; font-size: 28px;">Log in op je account</h1>
        </header>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 20px; box-shadow: 0 10px 22px rgba(0,0,0,0.05); display: grid; gap: 14px;">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="block" style="display: flex; align-items: center; gap: 8px;">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <label for="remember_me" class="text-sm text-gray-700">{{ __('Remember me') }}</label>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; gap: 10px; flex-wrap: wrap;">
                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">{{ __('No account?') }}</a>
                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
            </div>

            <div style="display: flex; justify-content: flex-end;">
                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </main>
</x-guest-layout>