<?php

namespace App\Http\Controllers\BloodBankAdmin;

use App\Http\Controllers\Controller;
use App\Models\BloodInventory;
use Illuminate\Http\Request;

class BloodInventoryController extends Controller
{
    public function index()
    {
        return view('bloodBankAdmin.blood-inventory', [
            'bloods' => BloodInventory::where('blood_bank_id', auth()->user()->bloodBank->id)->get(),
            'total_units' => BloodInventory::where('blood_bank_id', auth()->user()->bloodBank->id)->sum('units'),
        ]);
    }
}
