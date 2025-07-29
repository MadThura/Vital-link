<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'gender',
        'blood_type',
        'dob',
        'health_certificate',
        'phone',
        'address',
        'nrc'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function scopeFilter($query, $filters = [])
    {

        if ($search = $filters['search'] ?? null) {
            $query->where('fullname', 'LIKE', '%' . $search . '%');
        }

        if ($status = $filters['status'] ?? null) {
            $query->where('status', '=', $status);
        }

        return $query;
    }
}
