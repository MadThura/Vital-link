<?php

namespace App\Http\Controllers\BloodBankAdmin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $bloodBank = auth()->user()->bloodBank;

        $appointments = Appointment::with('donor', 'bloodBank')
            ->where('blood_bank_id', $bloodBank->id)
            ->latest()
            ->filter(['search' => request('search_appointment'), 'date' => request('appointment_date'), 'status' => request('appointment_status')])
            ->paginate(10);
            return view("bloodBankAdmin.appointment",[
                'approvedAppointments' => $appointments,
                'approvedAppointmentsCount' => $appointments->where('status','completed')->count(),
                'appointmentsInProgressCount' => $appointments->where('status','in_progress')->count(),
            ]);
    }
}
