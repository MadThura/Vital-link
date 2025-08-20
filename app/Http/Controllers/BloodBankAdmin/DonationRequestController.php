<?php

namespace App\Http\Controllers\BloodBankAdmin;

use App\Http\Controllers\Controller;
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
                ->get()
        ]);
    }

    public function updateStatus(DonationRequest $donationRequest, $action)
    {

        $user = $donationRequest->donor->user;

        switch ($action) {
            case 'approve':
                $donationRequest->status = "approved";
                $donationRequest->appointment_id = DonationRequest::generateAppointmentId();
                Notification::send($user, new DonationRequestApproved($donationRequest));
                break;
            case 'reject':
                $donationRequest->status = "rejected";
                Notification::send($user, new DonationRequestRejected($donationRequest));
                break;
            default:
                return back()->with('fail', 'Invalid action');
        }

        $donationRequest->save();

        return back()->with('success', 'Donation-request ' . $donationRequest->status . ' successfully.');
    }
}
