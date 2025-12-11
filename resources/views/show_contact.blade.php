<x-app-layout>
    <div class="contactMessage p-6 text-gray-900" style="padding: 20px; border-radius: 8px; max-width: 600px; margin: 0 auto;">
        <h1>Contact Bericht van {{ $contact->name }}</h1>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p><strong>Bericht:</strong></p>
        <p>{{ $contact->message }}</p>
    </div>
</x-app-layout>