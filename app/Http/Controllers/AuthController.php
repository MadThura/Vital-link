<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

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

        return redirect()->route('verification.notice');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginStore(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:30'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
        // Check if email is verified
        if (is_null($user->email_verified_at)) {

            return redirect()->route('verification.notice');
        }

        if ($user->role === 'super_admin') {

            $request->session()->regenerate();

            return redirect()->route('super-admin');
        }

        if ($user->role === 'blood_bank_admin') {

            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        $donor = Donor::where('user_id', $user->id)->first();

        if (!$donor) {
            return redirect()->route('donor.complete');
        }

        if (in_array($donor->status, ['pending', 'rejected', 'resubmitted'], true)) {
            $request->session()->regenerate();

            return redirect()->route('welcome');
        } elseif ($donor->status === 'approved') {

            $request->session()->regenerate();

            return redirect()->route('home');
        }
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }
}
