<x-base-layout>

    <section class="mx-auto max-w-2xl px-6 py-12">
        <h1 style="padding: 2rem; text-align: center;" class="text-3xl font-semibold text-center mb-8">Contact</h1>

        @if (session('status'))
            <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
                {{ session('status') }}
            </div>
        @endif

        <form style="    max-width: 600px;
    margin: 0 auto; padding: 2rem; background-color: #fff; border-radius: 0.75rem; box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);" action="{{ route('contact.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Naam veld -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Naam</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}"
                    placeholder="Vul je naam in"
                    class="w-full p-4 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 outline-none transition-all duration-300"
                    required />
            </div>

            <!-- Email veld -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}"
                    placeholder="Vul je e-mail in"
                    class="w-full p-4 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 outline-none transition-all duration-300"
                    required />
            </div>

            <!-- Bericht veld -->
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Bericht</label>
                <textarea id="message" name="message" rows="6" placeholder="Vul je bericht in"
                    class="w-full p-4 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 outline-none transition-all duration-300 resize-y"
                    required>{{ old('message') }}</textarea>
            </div>

            <!-- Verstuur knop -->
            <button type="submit"
                class="w-full p-4 rounded-lg bg-black text-white font-medium hover:bg-gray-800 transition-all duration-300">
                Verstuur
            </button>
        </form>
    </section>
</x-base-layout>
