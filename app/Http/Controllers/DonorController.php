<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DonorController extends Controller
{

    public function index()
    {
        return view('home-page', [
            'donor' => auth()->user()->donor,
            'blogs' => Blog::latest()->get(),
            'randomBlogs' => Blog::inRandomOrder()->limit(3)->get()
        ]);
    }

    public function showCompletionForm()
    {
        $user = auth()->user();
        $donor = $user->donor;

        if ($donor->rejection_errors ?? null) {
            $errorMsg = collect(json_decode($donor->rejection_errors, true));
        }

        return view('auth.request-info', [
            'donor' => $donor,
            'errorMsg' => $errorMsg ?? null
        ]);
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
            'nrc-state' => ['required'],
            'nrc-township' => ['required'],
            'nrc-type' => ['required'],
            'nrc-number' => ['required'],
            'profile_img'        => ['required', 'file', 'image', 'max:2048'],
            'health_certificate' => ['required', 'file', 'image', 'max:2048'],
            'nrc_front'          => ['required', 'file', 'image', 'max:2048'],
            'nrc_back'           => ['required', 'file', 'image', 'max:2048'],
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

        Donor::create($validated);

        return redirect('/');
    }


    public function updateCompletion(Request $request)
    {
        $user = auth()->user();
        $donor = $user->donor;

        if (!$donor) {
            return redirect()->route('login')->with('fail', 'You\'re not registered as a donor.');
        }

        if ($donor->status !== 'rejected') {
            return back()->with('fail', 'You are already approved or pending.');
        }

        $validated = $request->validate([
            'gender' => ['required', 'in:Male,Female'],
            'blood_type' => ['required', 'in:A-,B-,O-,AB-,A+,B+,O+,AB+'],
            'dob' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->toDateString()],
            'phone' => ['required'],
            'address' => ['required', 'string'],
            'nrc-state' => ['required'],
            'nrc-township' => ['required'],
            'nrc-type' => ['required'],
            'nrc-number' => ['required'],
            'profile_img'        => ['nullable', 'file', 'image', 'max:2048'],
            'health_certificate' => ['nullable', 'file', 'image', 'max:2048'],
            'nrc_front'          => ['nullable', 'file', 'image', 'max:2048'],
            'nrc_back'           => ['nullable', 'file', 'image', 'max:2048'],
        ]);
        // dd($validated);
        // Update text fields
        $donor->gender = $validated['gender'];
        $donor->blood_type = $validated['blood_type'];
        $donor->dob = $validated['dob'];
        $donor->phone = $validated['phone'];
        $donor->address = $validated['address'];

        // File uploads
        if ($request->hasFile('profile_img')) {
            if ($donor->profile_img && Storage::disk('local')->exists($donor->profile_img)) {
                Storage::disk('local')->delete($donor->profile_img);
            }
            $donor->profile_img = $request->file('profile_img')->store('donors/profiles', 'local');
        }

        if ($request->hasFile('health_certificate')) {
            if ($donor->health_certificate && Storage::disk('local')->exists($donor->health_certificate)) {
                Storage::disk('local')->delete($donor->health_certificate);
            }
            $donor->health_certificate = $request->file('health_certificate')->store('donors/health_certificates', 'local');
        }

        if ($request->hasFile('nrc_front')) {
            if ($donor->nrc_front && Storage::disk('local')->exists($donor->nrc_front)) {
                Storage::disk('local')->delete($donor->nrc_front);
            }
            $donor->nrc_front = $request->file('nrc_front')->store('donors/nrc', 'local');
        }

        if ($request->hasFile('nrc_back')) {
            if ($donor->nrc_back && Storage::disk('local')->exists($donor->nrc_back)) {
                Storage::disk('local')->delete($donor->nrc_back);
            }
            $donor->nrc_back = $request->file('nrc_back')->store('donors/nrc', 'local');
        }

        // Rebuild NRC string
        $donor->nrc = $request->input('nrc-state') . '/' .
            $request->input('nrc-township') . '(' .
            $request->input('nrc-type') . ')' .
            $request->input('nrc-number');

        // Reset rejection reasons and update status
        // $donor->rejection_reasons = null;
        $donor->status = 'resubmitted';

        $donor->save();

        return redirect('/')->with('success', 'Donor information updated successfully.');
    }


    public function profile()
    {
        $donor = auth()->user()->donor;
        return view('donor.profile', [
            'donor' => $donor
        ]);
    }
}
