<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    // Show registration form
    public function showRegistrationForm()
    {
        // dd('here');
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    // Handle registration
    public function register(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required','email','max:255', Rule::unique('users')],
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|min:1',
        ]);

        // Create user
        // dd($validated['role']);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => $validated['role'],
        ]);

        // Attach roles
        $user->roles()->attach($validated['role']);

        // Log the user in
        Auth::login($user);

        // Redirect to intended page or dashboard
        return redirect()->intended('/dashboard')->with('success', 'Registration successful!');
    }
}
