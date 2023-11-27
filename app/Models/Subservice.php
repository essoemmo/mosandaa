<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subservice extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function title(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->{'title_'. app()->getLocale()}
        );
    }

    public function description(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->{'description_'. app()->getLocale()}
        );
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
