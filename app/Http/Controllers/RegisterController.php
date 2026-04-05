<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function regis()
    {
        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:120'],
            'age' => ['required', 'integer', 'between:13,120'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = new User();
        $user->name = $attributes['name'];
        $user->age = (string) $attributes['age'];
        $user->email = $attributes['email'];
        $user->password = $attributes['password'];
        $user->role_id = 3; // Set the role_id value explicitly
        $user->view_id = 1; // Set the view_id value explicitly

        $user->save();

        auth()->login($user);

        request()->session()->regenerate();

        return redirect()->to('/');
    }
}
