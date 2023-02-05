<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->hasMany(Order::class, 'province_id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'province_id');
    }
}
