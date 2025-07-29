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

        $validated = $request->validate([
            'fullname' => ['required', 'min:3', 'max:30'],
            'gender' => ['required', 'in:Male,Female'],
            'blood_type' => ['required', 'in:A-,B-,O-,AB-,A+,B+,O+,AB+'],
            'dob' => ['required', 'date'],
            'health_certificate' => ['required', 'file', 'image'],
            'phone' => ['required'],
            'address' => ['required', 'string'],
        ]);

        // Optional: if NRC fields come from individual inputs, you can manually build a string:
        $validated['nrc'] = $request->input('nrc-state') . '/' .
            $request->input('nrc-township') . '(' .
            $request->input('nrc-type') . ')' .
            $request->input('nrc-number');

        // Add user_id manually
        $validated['user_id'] = Auth::user()->id;

        Donor::create($validated);

        return redirect('');
    }
}
