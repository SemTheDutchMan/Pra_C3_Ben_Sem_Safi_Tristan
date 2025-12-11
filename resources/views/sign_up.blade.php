<x-guest-layout>
    <form method="POST" action="{{ route('school.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Naam van de school')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Adres van de school')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Referee Name -->
        <div class="mt-4">
            <x-input-label for="referee_name" :value="__('Naam scheidsrechter')" />
            <x-text-input id="referee_name" class="block mt-1 w-full" type="text" name="referee_name" :value="old('referee_name')" required />
            <x-input-error :messages="$errors->get('referee_name')" class="mt-2" />
        </div>

        <!-- Referee Email -->
        <div class="mt-4">
            <x-input-label for="referee_email" :value="__('Email scheidsrechter')" />
            <x-text-input id="referee_email" class="block mt-1 w-full" type="email" name="referee_email" :value="old('referee_email')" required />
            <x-input-error :messages="$errors->get('referee_email')" class="mt-2" />
        </div>

        <!-- Group Count -->
        <div class="mt-4">
            <x-input-label for="group_count" :value="__('Aantal groepen')" />
            <x-text-input id="group_count" class="block mt-1 w-full" type="number" name="group_count" :value="old('group_count')" required />
            <x-input-error :messages="$errors->get('group_count')" class="mt-2" />
        </div>

        <!-- Classes -->
        <div class="mt-4">
            <x-input-label for="class" :value="__('Klassen')" />
            <x-text-input id="class" class="block mt-1 w-full" type="text" name="class" :value="old('class')" required />
            <x-input-error :messages="$errors->get('class')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Inschrijven') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>