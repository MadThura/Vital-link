<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Appointment extends Model
{

    protected $fillable = [
        'appointment_id',
        'donor_id',
        'blood_bank_id',
        'date',
        'status',
    ];

    protected static function generateAppointmentId()
    {
        do {
            // Example: APM-20-08-2025-9KF6BM
            $code = 'APM-' . date('d-m-Y') . '-' . strtoupper(Str::random(8));
        } while (self::where('appointment_id', $code)->exists());

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
                    ->orWhere('appointment_id', '=', $search);
            });
        }

        if ($status = $filters['status'] ?? null) {
            $query->where('status', '=', $status);
        }

        if ($filters['date'] ?? null) {
            if ($date = $filters['date'] ?? today()) {
                $query->where('date', $date);
            }
        }

        return $query;
    }
}
