<?php

namespace App\Http\Controllers\BloodBankAdmin;

use App\Http\Controllers\Controller;
use App\Models\BloodInventory;
use App\Models\Donation;
use App\Models\DonationRequest;
use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DonationRecordController extends Controller
{
    public function index()
    {
        $bloodBank = auth()->user()->bloodBank;
        
        $donationRequests = DonationRequest::with('donor', 'bloodBank')
            ->where('blood_bank_id', $bloodBank->id)
            ->where('status', 'approved')
            ->filter(request(['search', 'date']))
            ->paginate(10);
        $donations = Donation::latest()->paginate(5);
        $countOfDonations = Donation::where('blood_bank_id', $bloodBank->id)->count();

        return view('bloodBankAdmin.donation-record', [
            'approvedAppointments' => $donationRequests,
            'countOfDonations' => $countOfDonations,
            'donations' => $donations
        ]);
    }

    public function store(Request $request, Donor $donor)
    {
        $validated = $request->validate([
            'units' => ['required', 'integer', 'min:1'],
            'note'  => ['nullable', 'string']
        ]);

        $bloodBank = auth()->user()->bloodBank; // keep whole model, not id

        DB::transaction(function () use ($validated, $donor, $bloodBank) {

            // create donation
            $donation = Donation::create([
                'donation_id'    => Donation::generateDonationId(),
                'donor_id'       => $donor->id,
                'blood_bank_id'  => $bloodBank->id,
                'donation_date'  => now(),
                'units'          => $validated['units'],
                'note'           => $validated['note'] ?? null,
            ]);

            // update donor
            $donor->donation_count++;
            $donor->last_donation_at = $donation->donation_date;
            $donor->cooldown_until   = Carbon::parse($donation->donation_date)->addMonths(6);
            $donor->save();

            // update blood inventory   
            $inventory = BloodInventory::firstOrCreate(
                [
                    'blood_bank_id' => $bloodBank->id,
                    'blood_type'    => $donor->blood_type,
                ],
                [
                    'units' => 0
                ]
            );

            $inventory->increment('units', $validated['units']);
        });

        return redirect()->back()->with('success', 'Donation recorded successfully.');
    }
}
