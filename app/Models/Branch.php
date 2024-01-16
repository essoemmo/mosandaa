<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $fillable = [
        'name_ar', 
        'name_en',
        'address_ar',
        'address_en',
        'phone',
        'whatsapp',
        'fax',
        'lat', 
        'lang',
    ];

    protected $appends = ['name','address'];

    public function getAddressAttribute()
    {
        return $this->{'address_'. app()->getLocale()};
    }

    public function getNameAttribute()
    {
        return $this->{'name_'. app()->getLocale()};
    }
}
