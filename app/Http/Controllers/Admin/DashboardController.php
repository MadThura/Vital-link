<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donor;

class DashboardController extends Controller
{
    public function index()
    {
        $numOfDonors = Donor::where('status', '=', 'approved')->count();
        $numOfPending = Donor::where('status', '=', 'pending')->count();
        $numOfAvailable = Donor::whereNotNull('last_donation_at')
            ->where('cooldown_until', '>', now())
            ->count();

        $totalDonations = Donor::sum('donation_count');
        $deferredDonors = $numOfDonors - $numOfAvailable;

        return view('admin.dashboard', [
            'numOfDonors' => $numOfDonors,
            'numOfPending' => $numOfPending,
            'numOfAvailable' => $numOfAvailable,
            'totalDonations' => $totalDonations,
            'deferredDonors' => $deferredDonors
        ]);
    }
}
