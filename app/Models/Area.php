<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }   

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
