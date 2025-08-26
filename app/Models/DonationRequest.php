<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DonationRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'donor_id',
        'blood_bank_id',
        'appointment_date',
        // 'appointment_time',
        'status',
    ];

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
                    });
            });
        }

        if ($status = $filters['status'] ?? null) {
            $query->where('status', '=', $status);
        }

        if ($filters['date'] ?? null) {
            if ($date = $filters['date'] ?? today()) {
                $query->where('appointment_date', $date);
            }
        }

        return $query;
    }
}
