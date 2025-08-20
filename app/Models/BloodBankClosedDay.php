<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodBankClosedDay extends Model
{
    protected $fillable = ['blood_bank_id', 'date', 'type', 'reason'];
}
