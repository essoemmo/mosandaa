<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRequest extends Model
{
    use HasFactory;

    protected $table = 'job_requests';

    protected $fillable = [
        'job_type',
        'job_address',
        'job_numb',
        'job_city',
        'name',
        'sex',
        'national',
        'birth_date',
        'birth_place',
        'region',
        'special',
        'certificate',
        'graduation_rate',
        'graduation_year',
        'Fellowships',
        'experience',
        'experience_year',
        'email',
        'phone',
        'note',
        'is_read'
    ];


    protected function sex():Attribute
    {
        return Attribute::make(get:fn($value)=>__('website.'.$value),
        );
    }

}
