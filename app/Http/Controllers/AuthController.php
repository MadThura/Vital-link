<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:30'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:30', 'confirmed'],
        ]);

        $user = User::create($validated);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('donor.complete');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginStore(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'max:30'],
        ]);

        if (!Auth::attempt($credentials)) {

            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }

        $user = auth()->user();

        if ($user->role === 'blood_bank_admin') {

            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return redirect()->route('welcome');
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
