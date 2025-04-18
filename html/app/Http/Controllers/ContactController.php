<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();

        return view('contacts.index', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        request()->validate([
            'name' => ['required', 'min:5'],
            'contact' => ['required', 'digits:9', 'unique:contacts,contact'],
            'email' => ['required', 'email', 'unique:contacts,email']
        ]);
    
        Contact::create([
            'name' => request('name'),
            'contact' => request('contact'),
            'email' => request('email'),
        ]);
    
        return redirect('/contacts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {

        return view('contacts.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        request()->validate([
            'name' => ['required', 'min:5'],
            'contact' => ['required', 'digits:9', Rule::unique('contacts', 'contact')->ignore($contact->id)],
            'email' => ['required', 'email', Rule::unique('contacts', 'email')->ignore($contact->id)]
        ]);
    
        $contact->update([
            'name' => request('name'),
            'contact' => request('contact'),
            'email' => request('email'),
        ]);
    
        return redirect('/contacts/' . $contact->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect('/contacts');
    }
}
