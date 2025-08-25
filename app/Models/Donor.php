<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Donor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'gender',
        'profile_img',
        'blood_type',
        'dob',
        'health_certificate',
        'phone',
        'address',
        'nrc',
        'nrc_front',
        'nrc_back'
    ];

    protected static function generateDonorCode()
    {
        do {
            // Example: DNR-2025-ABC123
            $code = 'DNR-' . date('Y') . '-' . strtoupper(Str::random(6));
        } while (self::where('donor_code', $code)->exists());

        return $code;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bloodBank()
    {
        return $this->belongsTo(BloodBank::class);
    }

    public function donationRequest()
    {
        return $this->hasOne(DonationRequest::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public static function scopeFilter($query, $filters = [])
    {

        if ($search = $filters['search'] ?? null) {
            $query->whereHas('user.donor', function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('donor_code', '=', $search);
            });
        }

        if ($status = $filters['status'] ?? null) {
            $query->where('status', '=', $status);
        }

        return $query;
    }
}
