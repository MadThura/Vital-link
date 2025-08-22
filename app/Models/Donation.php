<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Donation extends Model
{
    protected $fillable = ['donation_id', 'donor_id', 'blood_bank_id', 'units', 'note', 'donation_date'];

    protected static function generateDonationId()
    {
        do {
            // Example: DID-20-08-2025-ABC123
            $code = 'DID-' . date('d-m-Y') . '-' . strtoupper(Str::random(8));
        } while (self::where('donation_id', $code)->exists());

        return $code;
    }
    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function bloodBank()
    {
        return $this->belongsTo(BloodBank::class);
    }

    public static function scopeFilter($query, $filters = [])
    {

        if ($search = $filters['search'] ?? null) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('donor.user', function ($sub) use ($search) {
                    $sub->where('name', 'LIKE', "%{$search}%");
                })
                    ->orWhereHas('donor', function ($sub) use ($search) {
                        $sub->where('donor_code', '=', $search);
                    })
                    ->orWhere('donation_id', '=', $search);
            });
        }

        if ($date = $filters['date'] ?? null) {
            $query->where('donation_date', $date);
        }

        if ($blood_type = $filters['blood_type'] ?? null) {
            $query->whereHas('donor', function ($sub) use ($blood_type) {
                $sub->where('blood_type', '=', $blood_type);
            });
        }

        return $query;
    }
}
