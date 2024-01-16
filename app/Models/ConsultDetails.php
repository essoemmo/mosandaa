<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultDetails extends Model
{
    use HasFactory;

    protected $table = 'consult_details';

    protected $fillable = [
        'description_ar',
        'description_en',
        'type',
    ];

    protected $appends = ['description'];

    public function getDescriptionAttribute()
    {
        return $this->{'description_'. app()->getLocale()};
    }
}
