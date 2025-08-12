<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = ['user_id', 'name', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class)->where('role', 'ward_operator');
    }
}
