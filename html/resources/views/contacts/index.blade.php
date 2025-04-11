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
            </a>
        @endforeach

    </div>

</x-layout>