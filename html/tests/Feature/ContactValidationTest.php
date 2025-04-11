<?php

namespace Tests\Feature;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactValidationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function cannot_create_contact_with_invalid_data()
    {
        $response = $this->post('/contacts', [
            'name' => 'Ana',
            'contact' => '123',
            'email' => 'not-an-email',
        ]);

        $response->assertSessionHasErrors(['name', 'contact', 'email']);
    }

    /** @test */
    public function cannot_create_contact_with_duplicate_email_or_contact()
    {
        Contact::create([
            'name' => 'João Silva',
            'contact' => '123456789',
            'email' => 'joao@example.com',
        ]);

        $response = $this->post('/contacts', [
            'name' => 'Maria Oliveira',
            'contact' => '123456789',
            'email' => 'joao@example.com',
        ]);

        $response->assertSessionHasErrors(['contact', 'email']);
    }

    /** @test */
    public function cannot_update_contact_with_invalid_data()
    {
        $contact = Contact::create([
            'name' => 'Francisco Costa',
            'contact' => '987654321',
            'email' => 'francisco@example.com',
        ]);

        $response = $this->patch("/contacts/{$contact->id}", [
            'name' => 'Ana',
            'contact' => '123',
            'email' => 'invalid-email',
        ]);

        $response->assertSessionHasErrors(['name', 'contact', 'email']);
    }

    /** @test */
    public function can_update_contact_without_triggering_unique_error_on_same_email_and_contact()
    {
        $contact = Contact::create([
            'name' => 'Carlos Pereira',
            'contact' => '123456789',
            'email' => 'carlos@example.com',
        ]);

        $response = $this->put("/contacts/{$contact->id}", [
            'name' => 'Carlos P. Editado',
            'contact' => '123456789',
            'email' => 'carlos@example.com',
        ]);

        $response->assertSessionDoesntHaveErrors();
    }
}
