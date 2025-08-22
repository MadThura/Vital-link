<?php

namespace App\Http\Controllers\BloodBankAdmin;

use App\Http\Controllers\Controller;
use App\Models\BloodInventory;
use App\Models\Donation;
use App\Models\DonationRequest;
use App\Models\Donor;
use App\Notifications\DonationCompleted;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class DonationRecordController extends Controller
{
    public function index()
    {
        $bloodBank = auth()->user()->bloodBank;

        $donationRequests = DonationRequest::with('donor', 'bloodBank')
            ->where('blood_bank_id', $bloodBank->id)
            ->where('status', 'approved')
            ->filter(['search' => request('search_request'), 'date' => request('date_request')])
            ->paginate(10);
        $donations = Donation::with('donor')
            ->filter(['search' => request('search_donation'), 'date' => request('date_donation'), 'blood_type' => request('blood_type_donation')])
            ->latest()
            ->paginate(5);
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

            Notification::send($donor->user, new DonationCompleted($donation));
        });

        return redirect()->back()->with('success', 'Donation recorded successfully.');
    }

    // test
    public function downloadCertificate($donationId)
    {

        $donation = Donation::where('donation_id', $donationId)->first();

        $donor = $donation->donor;
        $pdf = Pdf::loadView('pdf.donation-certificate', compact('donation', 'donor'));

        return $pdf->download('Donation_Certificate_' . $donation->id . '.pdf');
    }
}
