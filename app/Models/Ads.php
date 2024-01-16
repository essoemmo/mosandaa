<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    protected $table = 'ads';

    protected $fillable = [
        'title_ar',
        'title_en',
        'active',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $appends = ['title'];

    public function getTitleAttribute()
    {
        return $this->{'title_'. app()->getLocale()};
    }
}
