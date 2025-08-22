<?php

namespace App\Http\Controllers;

use App\Models\BloodBank;
use App\Models\BloodBankClosedDay;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([
            'blood_bank_id'    => 'required|exists:blood_banks,id',
            'appointment_date' => 'required|date|after_or_equal:today',
        ]);

        $donor = auth()->user()->donor;
        $isRequested = DonationRequest::where('donor_id', $donor->id)->first();
        $cooldownUntil = \Carbon\Carbon::parse($donor->cooldown_until);

        if ($isRequested) {
            return back()->with('fail', 'You have already made a appointment.');
        }

        if ($donor->cooldown_until && $cooldownUntil->isFuture()) {
            return back()->with('fail', 'You have recent donation.');
        }
        
        $bloodBank = BloodBank::findOrFail($validated['blood_bank_id']);

        // Check closed day
        if ($bloodBank->isClosedOn($validated['appointment_date'])) {
            return back()->with('fail', 'Your appointment date is closed.');
        }

        // Check capacity
        if ($bloodBank->isFullOn($validated['appointment_date'])) {
            return back()->with('fail', 'Maximum appointments reached for this day.');
        }

        $donationRequest = DonationRequest::create([
            'donor_id'         => auth()->user()->donor->id,
            'blood_bank_id'    => $bloodBank->id,
            'appointment_date' => $validated['appointment_date'],
            'status'           => 'pending',
        ]);

        if ($bloodBank->isFullOn($donationRequest->appointment_date)) {
            $bloodBank->closedDays()->firstOrCreate([
                'date' => $donationRequest->appointment_date,
                'type' => 'apmFullDay',
                'reason' => 'Maximum appointments reached for this day.'
            ]);
        }

        return back()->with('success', 'Appointment request sent successfully!');
    }
}
