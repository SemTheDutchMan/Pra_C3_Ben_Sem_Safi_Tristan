<x-guest-layout>
    <main style="max-width: 820px; margin: 30px auto; padding: 0 20px 50px;">
        <header style="margin-bottom: 20px;">
            <p style="margin: 0; color: #6b7280; font-weight: 700; font-size: 12px; letter-spacing: 0.08em; text-transform: uppercase;">Inschrijving</p>
            <h1 style="margin: 6px 0 0; font-size: 30px;">Schrijf je school in</h1>
            <p style="margin: 8px 0 0; color: #4b5563;">Vul de onderstaande gegevens in om je school en scheidsrechter te registreren.</p>
        </header>

        <form method="POST" action="{{ route('school.store') }}" style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 20px; box-shadow: 0 10px 22px rgba(0,0,0,0.05); display: grid; gap: 14px; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));">
            @csrf

            <div style="grid-column: 1 / -1;">
                <x-input-label for="name" :value="__('Naam van de school')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email van de school')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="address" :value="__('Adres van de school')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="referee_name" :value="__('Naam scheidsrechter')" />
                <x-text-input id="referee_name" class="block mt-1 w-full" type="text" name="referee_name" :value="old('referee_name')" required />
                <x-input-error :messages="$errors->get('referee_name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="referee_email" :value="__('Email scheidsrechter')" />
                <x-text-input id="referee_email" class="block mt-1 w-full" type="email" name="referee_email" :value="old('referee_email')" required />
                <x-input-error :messages="$errors->get('referee_email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="group_count" :value="__('Aantal groepen')" />
                <x-text-input id="group_count" class="block mt-1 w-full" type="number" name="group_count" :value="old('group_count')" required />
                <x-input-error :messages="$errors->get('group_count')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="class" :value="__('Klassen')" />
                <x-text-input id="class" class="block mt-1 w-full" type="text" name="class" :value="old('class')" required />
                <x-input-error :messages="$errors->get('class')" class="mt-2" />
            </div>

            <div style="grid-column: 1 / -1; display: flex; justify-content: flex-end;">
                <x-primary-button>
                    {{ __('Inschrijven') }}
                </x-primary-button>
            </div>
        </form>
    </main>
</x-guest-layout>