<?php

namespace App\Http\Controllers\BloodBankAdmin;

use App\Http\Controllers\Controller;
use App\Models\BloodBankClosedDay;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $bloodBank = auth()->user()->bloodBank;

        $closedDays = $bloodBank->closedDays()->where('type', 'closedDay')->pluck('date');
        $apmFullDays = $bloodBank->closedDays()->where('type', 'apmFullDay')->pluck('date');


        return view('bloodBankAdmin.profile', [
            'bloodBank' => $bloodBank,
            'closedDays' => $closedDays,
            'apmFullDays' => $apmFullDays,
        ]);
    }

    public function updateOperatingHours(Request $request)
    {
        $start_time = date("h:i A", strtotime($request->start_time));

        $end_time = date("h:i A", strtotime($request->end_time));

        $operating_hour = $start_time . ' - ' . $end_time;

        $bloodBank = auth()->user()->bloodBank;
        $bloodBank->operating_hour = $operating_hour;

        $bloodBank->save();

        return back()->with('success', 'Operating hours updated successfully.');
    }

    public function updateMaxPPDay(Request $request)
    {
        $request->validate([
            'maxPersonsPerDay' => ['required', 'integer']
        ]);

        $bloodBank = auth()->user()->bloodBank;

        $bloodBank->maxPersonsPerDay = $request->maxPersonsPerDay;

        $bloodBank->save();

        return back()->with('success', 'Maximun persons per day updated successfully.');
    }

    public function updateContactInfo(Request $request)
    {

        $request->validate([
            'address' => ['required', 'string'],
            'phone' => ['required'],
        ]);

        $bloodBank = auth()->user()->bloodBank;

        $bloodBank->update([
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        return back()->with('success', 'Contact infos updated successfully.');
    }

    public function storeClosedDays(Request $request)
    {

        $closedDays = $request->days;

        $bloodBank = auth()->user()->bloodBank;

        foreach ($closedDays as $day) {
            $isClosed = BloodBankClosedDay::where('blood_bank_id', $bloodBank->id)
                ->where('date', $day['date'])->first();
            if ($isClosed) {
                $isClosed->reason = $day['reason'];
                $isClosed->update();
                return back()->with('success', 'Closed days are updated successfully.');
            }

            BloodBankClosedDay::create($day);
        }

        return back()->with('success', 'Close days are stored successfully.');
    }
}
