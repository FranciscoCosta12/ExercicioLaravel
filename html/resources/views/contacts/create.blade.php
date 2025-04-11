<x-layout>
    <x-slot:heading>
        Create Contact
    </x-slot:heading>

    <form method="POST" action="/contacts">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Create a new Contact</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Registe a new the contact list.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="name">Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="name" id="name" placeholder="Laravel"></x-form-input>

                            <x-form-error name='name' />

                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="contact">Contact</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="contact" id="contact" placeholder="987654321"></x-form-input>

                            <x-form-error name='contact' />

                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" id="email" placeholder="test@example.com" type="email"></x-form-input>

                            <x-form-error name='email' />

                        </div>
                    </x-form-field>

                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <x-form-button>Save</x-form-button>
            </div>
    </form>


</x-layout>
