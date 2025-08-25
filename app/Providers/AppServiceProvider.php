<?php

namespace App\Providers;

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
                'newDonationRequestsCount' => DonationRequest::where('status', 'pending')->count(),
            ]);
        });
    }
}