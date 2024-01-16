<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    use HasFactory;

    protected $table = 'consults';

    protected $fillable = [
        'name_ar', 
        'name_en',
        'position_ar',
        'position_en',
        'title_ar',
        'title_en',
        'image',
        'description_ar', 
        'description_en',
        'type',
    ];

    protected $appends = ['description','title','name','position'];

    
    public function getDescriptionAttribute()
    {
        return $this->{'description_'. app()->getLocale()};
    }

    public function getTitleAttribute()
    {
        return $this->{'title_'. app()->getLocale()};
    }

    public function getNameAttribute()
    {
        return $this->{'name_'. app()->getLocale()};
    }

    public function getPositionAttribute()
    {
        return $this->{'position_'. app()->getLocale()};
    }
}
