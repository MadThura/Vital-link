<?php

namespace App\Http\Controllers\BloodBankAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donor;

class DashboardController extends Controller
{
    public function index()
    {
        $numOfDonors = Donor::where('status', '=', 'approved')->count();
        $numOfPending = Donor::where('status', '=', 'pending')->count();
        $deferredDonors = Donor::whereNotNull('last_donation_at')
            ->where('cooldown_until', '>', now())
            ->count();

        $totalDonations = Donor::sum('donation_count');
        $numOfAvailable = $numOfDonors - $deferredDonors;

        return view('bloodBankAdmin.dashboard', [
            'numOfDonors' => $numOfDonors,
            'numOfPending' => $numOfPending,
            'numOfAvailable' => $numOfAvailable,
            'totalDonations' => $totalDonations,
            'deferredDonors' => $deferredDonors
        ]);
    }
}
