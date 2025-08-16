<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Donor;
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

        // Check if email is verified
        if (is_null($user->email_verified_at)) {

            return redirect()->route('verification.notice');
            // return back()->withErrors(['email' => 'Please verify your email before logging in.']);
        }

        if (!Auth::attempt($credentials)) {

            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
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
        if ($donor->status === 'pending' || $donor->status === 'rejected' || $donor->status === 'resubmitted') {

            $request->session()->regenerate();

            return view('welcome', [
                'donor' => $donor
            ]);
        } elseif ($donor->status === 'approved') {

            $request->session()->regenerate();

            return view('home-page', [
                'donor' => $donor,
                'randomBlogs' => Blog::inRandomOrder()->limit(3)->get()
            ]);
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
