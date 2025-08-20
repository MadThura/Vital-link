<?php

namespace App\Jobs;

use App\Models\Donor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateDonorCooldownStatus implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Donor::whereNotNull('cooldown_until')
            ->where('cooldown_until', '<', now())
            ->update(['is_cooldown' => false]);
    }
}
