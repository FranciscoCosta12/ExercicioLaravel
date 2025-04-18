<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LogInUserController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $validated = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(! Auth::attempt($validated)){
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match.'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
