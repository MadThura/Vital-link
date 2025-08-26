<?php

namespace App\Providers;

use App\Models\Appointment;
use App\Models\DonationRequest;
use App\Models\Donor;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        View::composer('components.side-bar', function ($view) {
            $view->with([
                'newDonorsCount' => Donor::where('status', 'pending')->count(),
                'newDonationRequestsCount' => DonationRequest::where('blood_bank_id', auth()->user()->bloodBank->id)->where('status', 'pending')->count(),
                'newAppointmentsCount' => Appointment::where('blood_bank_id', auth()->user()->bloodBank->id)->where('status', 'in_progress')->count()
            ]);
        });
    }
}