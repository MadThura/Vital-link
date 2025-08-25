<?php

namespace App\Http\Controllers\BloodBankAdmin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\BloodBankClosedDay;
use App\Models\DonationRequest;
use App\Models\Donor;
use App\Notifications\DonationRequestApproved;
use App\Notifications\DonationRequestRejected;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class DonationRequestController extends Controller
{
    public function index()
    {
        return view('bloodBankAdmin.donation-request', [
            'donationRequests' => DonationRequest::with('donor', 'bloodBank')
                ->where('blood_bank_id', auth()->user()->bloodBank->id)
                ->filter(request(['search', 'status']))
                ->paginate(10)
        ]);
    }

    public function updateStatus(DonationRequest $donationRequest, $action)
    {

        $user = $donationRequest->donor->user;

        switch ($action) {
            case 'approve':
                $donationRequest->status = "approved";
                $donor = $donationRequest->donor;
                $donor->appointment()->create([
                    'appointment_id' => Appointment::generateAppointmentId(),
                    'blood_bank_id' => $donationRequest->blood_bank_id,
                    'date' => $donationRequest->appointment_date,
                    'status' => 'in_progress'
                ]);
                Notification::send($user, new DonationRequestApproved($donationRequest));
                $donationRequest->save();
                break;
            case 'reject':
                $donationRequest->status = "rejected";
                Notification::send($user, new DonationRequestRejected($donationRequest));
                $donationRequest->delete();
                break;
            default:
                return back()->with('fail', 'Invalid action');
        }


        return back()->with('success', 'Donation-request ' . $donationRequest->status . ' successfully.');
    }
}
