<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
    /** @use HasFactory<\Database\Factories\BloodBankFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'phone', 'address', 'maxPersonsPerDay', 'operating_hour'];

    // BloodBank.php
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id')->where('role', 'blood_bank_admin');
    }

    public function closedDays()
    {
        return $this->hasMany(BloodBankClosedDay::class, 'blood_bank_id');
    }

    public function donationRequests()
    {
        return $this->hasMany(DonationRequest::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function isClosedOn($date): bool
    {

        return $this->closedDays()
            ->where('date', $date)
            ->exists();
    }

    public function isFullOn($date): bool
    {
        $count = $this->donationRequests()
            ->where('appointment_date', $date)
            ->count();

        return $count >= $this->maxPersonsPerDay;
    }
}
