<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodInventory;
use App\Models\Donation;
use App\Models\Donor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{

    public function index()
    {
        $donations = Donation::with('donor', 'bloodBank')->latest()->paginate(10);
    }

    public function store(Request $request, Donor $donor)
    {
        $validated = $request->validate([
            'units' => ['required'],
            'note' => ['nullable', 'string']
        ]);

        $validated['donor_id'] = $donor->id;

        $bloodBank = auth()->user()->bloodBank;
        $validated['blood_bank_id'] = $bloodBank->id;

        $validated['donation_date'] = now();

        DB::transaction(function () use ($validated, $donor, $bloodBank) {
            $donor->donation_count++;
            $donor->last_donation_at = $validated['donation_date'];
            $donor->cooldown_until = Carbon::parse($validated['donation_date'])->addMonths(6);
            $donor->save();

            Donation::create($validated);

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

            $inventory->save();
        });
    }
}
