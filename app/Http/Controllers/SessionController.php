<?php

namespace App\Http\Controllers;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function regis()
    {
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials) == false) {
            return back()->withErrors([
                'message' => 'El email o la contraseña estan incorrectos, porfavor intenta de nuevo',
            ]);
        }

        request()->session()->regenerate();

        return redirect()->route('home.index');
    }

    public function destroy()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->to('/');
    }
}
