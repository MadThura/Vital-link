<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonorController extends Controller
{
    public function showCompletionForm()
    {
        return view('auth.request-info');
    }

    public function storeCompletion(Request $request)
    {

        if (auth()->user()->donor) {
            return redirect()->route('login')->with('fail', 'You\'re already registered as a donor.');
        }

        $validated = $request->validate([
            'gender' => ['required', 'in:Male,Female'],
            'blood_type' => ['required', 'in:A-,B-,O-,AB-,A+,B+,O+,AB+'],
            'dob' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->toDateString()],
            'health_certificate' => ['required', 'file', 'image'],
            'phone' => ['required'],
            'address' => ['required', 'string'],
            'profile_img' => ['required', 'file', 'image'],
            'health_certificate' => ['required', 'file', 'image'],
            'nrc_front' => ['required', 'file', 'image'],
            'nrc_back' => ['required', 'file', 'image'],
        ]);

        $profileImgPath = $request->file('profile_img')->store('donors/profiles', 'local');
        $validated['profile_img'] = $profileImgPath;

        $healthPath = $request->file('health_certificate')->store('donors/health_certificates', 'local');
        $validated['health_certificate'] = $healthPath;

        $nrcFrontImgPath = $request->file('nrc_front')->store('donors/nrc', 'local');
        $validated['nrc_front'] = $nrcFrontImgPath;

        $nrcBackImgPath = $request->file('nrc_back')->store('donors/nrc', 'local');
        $validated['nrc_back'] = $nrcBackImgPath;

        // Optional: if NRC fields come from individual inputs, you can manually build a string:
        $validated['nrc'] = $request->input('nrc-state') . '/' .
            $request->input('nrc-township') . '(' .
            $request->input('nrc-type') . ')' .
            $request->input('nrc-number');

        // Add user_id manually
        $validated['user_id'] = Auth::user()->id;

        $donor = Donor::create($validated);

        return redirect('/');
    }
}
