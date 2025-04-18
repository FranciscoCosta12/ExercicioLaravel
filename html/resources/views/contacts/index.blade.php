<x-layout>
    <x-slot:heading>
        Contacts Page
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($contacts as $contact)
            <a href="/contacts/{{ $contact['id'] }}" class="block px-4 py-6 border border-gray-200">
                <div class="font-bold text-blue-500 text-sm">{{ $contact['name'] }}</div>
                <div>
                    {{ $contact['contact'] }}
                </div>
                @auth
                @can('edit-contact', $contact)
                    <x-button href="/contacts/{{ $contact['id'] }}/edit">Edit Contact - {{ $contact['name'] }}</x-button>
                @endcan
                @endauth
            </a>
        @endforeach

    </div>

</x-layout>
