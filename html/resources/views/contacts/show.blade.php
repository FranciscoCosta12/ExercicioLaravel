<x-layout>
    <x-slot:heading>
        Contact
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $contact->name }}</h2>
    <div>
        <strong>Contact: </strong> {{ $contact['contact'] }}
    </div>
    <div>
        <strong>Email: </strong> {{ $contact['email'] }}
    </div>

    <p class="mt-6">
        <x-button href="/contacts/{{ $contact->id }}/edit">Edit Contact</x-button>
    </p>

</x-layout>
