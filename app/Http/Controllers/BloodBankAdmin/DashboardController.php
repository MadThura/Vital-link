<?php

namespace App\Http\Controllers\BloodBankAdmin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;
use App\Models\Donor;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Current week range (Monday → Sunday by default, unless locale is set differently)
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek   = Carbon::now()->endOfWeek();

        // Total donors (already have)
        $numOfDonors = Donor::where('status', '=', 'approved')->count();
        $numOfPending = Donor::where('status', '=', 'pending')->count();
        $deferredDonors = Donor::whereNotNull('last_donation_at')
            ->where('cooldown_until', '>', now())
            ->count();

        $totalDonations = Donor::sum('donation_count');
        $numOfAvailable = $numOfDonors - $deferredDonors;

        // ✅ New weekly stats
        $numOfDonorsThisWeek = Donor::where('status', 'approved')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->count();

        $numOfDeferredThisWeek = Donor::whereNotNull('last_donation_at')
            ->where('cooldown_until', '>', now())
            ->whereBetween('updated_at', [$startOfWeek, $endOfWeek]) // assuming cooldown updates when deferred
            ->count();

        $numOfDonationsThisWeek = Donation::whereBetween('donation_date', [$startOfWeek, $endOfWeek])
            ->count();

        return view('bloodBankAdmin.dashboard', [
            'numOfDonors' => $numOfDonors,
            'numOfPending' => $numOfPending,
            'numOfAvailable' => $numOfAvailable,
            'totalDonations' => $totalDonations,
            'deferredDonors' => $deferredDonors,

            // new values
            'numOfDonorsThisWeek' => $numOfDonorsThisWeek,
            'numOfDeferredThisWeek' => $numOfDeferredThisWeek,
            'numOfDonationsThisWeek' => $numOfDonationsThisWeek,
        ]);
    }
}
