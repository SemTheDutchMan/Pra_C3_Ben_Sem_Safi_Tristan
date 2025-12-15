<x-app-layout>
    <div class="contactMessage p-6 text-gray-900" style="padding: 20px; border-radius: 8px; max-width: 600px; margin: 0 auto;">
        <h1>Contact Bericht van {{ $contact->name }}</h1>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p><strong>Bericht:</strong></p>
        <p>{{ $contact->message }}</p>

        <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" style="margin-top: 20px;">
            @csrf
            @method('DELETE')
            <button type="submit" style="background-color: #e3342f; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;" onclick="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?');">
                Verwijder Bericht
            </button>
        </form>
    </div>
</x-app-layout>