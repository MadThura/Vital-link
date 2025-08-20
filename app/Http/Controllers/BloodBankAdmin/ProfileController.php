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
        // dd($bloodBank->closedDays[0]->date);
        // $closedDays = BloodBankClosedDay::where('blood_bank_id', $bloodBank->id)->pluck('date');

        $closedDays = $bloodBank->closedDays()->where('type', 'closedDay')->pluck('date');
        $apmFullDays = $bloodBank->closedDays()->where('type', 'apmFullDay')->pluck('date');


        return view('bloodBankAdmin.profile', [
            'bloodBank' => $bloodBank,
            'closedDays' => $closedDays,
            'apmFullDays' => $apmFullDays,
        ]);
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
