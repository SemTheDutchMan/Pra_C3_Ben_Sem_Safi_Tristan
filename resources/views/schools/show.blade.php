<x-app-layout>
    <div class="p-6 text-gray-900">
        <h1>School Details</h1>

        <div class="mt-6 space-y-4">
            <div>
                <h2 class="text-lg font-semibold">school naam:</h2>
                <p>{{ $school->name }}</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold">Email van de school:</h2>
                <p>{{ $school->email }}</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold">Naam scheidsrechter:</h2>
                <p>{{ $school->referee_name }}</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold">Email scheidsrechter:</h2>
                <p>{{ $school->referee_email }}</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold">Aantal groepen:</h2>
                <p>{{ $school->group_count }}</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold">Klassen:</h2>
                <p>{{ $school->class }}</p>
            </div>
        </div>

        <div class="mt-8 space-x-4">
            <form action="{{ route('school.destroy', $school->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Delete</button>
            </form>
            <a href="{{ route('dashboard') }}"
                class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Back</a>
        </div>
    </div>
</x-app-layout>