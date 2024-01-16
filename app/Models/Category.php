<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'id',
        'title_ar',
        'title_en',
        'active',
        'section_id',
    ];

    //public $timestamps = false;

    protected $appends = ['title'];

    public function getTitleAttribute()
    {
        return $this->{'title_'. app()->getLocale()};
    }
}
