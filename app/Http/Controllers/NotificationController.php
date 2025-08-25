<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications;

        return response()->json($notifications);
    }

    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead(); // sets read_at = now()
        return response()->json(['success' => true]);
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return response()->json(['success' => true]);
    }

    public function approve(Notification $notification)
    {
        $user = auth()->user()->donor;

        $qr = $user->donationRequest->appointment_id;
        $name = $user->user->name;
        $code = $user->donor_code;
        $nrc = $user->nrc;
        $dob = $user->dob;
        $date = $user->donationRequest->appointment_date;

        $qrText = sprintf(
            "Appointment ID:      %s\nDonor Name:           %s\nDonor Code:           %s\nNRC Number:           %s\nDOB:                        %s\nAppointment Date:  %s",
            $qr,
            $name,
            $code,
            $nrc,
            $dob,
            $date
        );

        $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . urlencode($qrText);

        return view('approved-notification', compact('notification', 'qrCodeUrl'));
    }
}
