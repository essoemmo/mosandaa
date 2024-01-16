<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $table = 'service_requests';

    protected $fillable = [
        'name',
        'organization_name',
        'email',
        'phone',
        'activity_type_desc',
        'service_location_desc',
        'activity_type',
        'legal_entity',
        'service_location',
        'request_service',
        'region',
        'neighbourhood',
        'price_offer',

        'commercial_register',
        'found_contract',
        'financial',
        'balance',
        'is_read',
    ];

    protected function activityType():Attribute
    {
        return Attribute::make(get:fn($value)=>__('website.'.$value),
        );
    }

    protected function legalEntity():Attribute
    {
        return Attribute::make(get:fn($value)=>__('website.'.$value),
        );
    }

    protected function serviceLocation():Attribute
    {
        return Attribute::make(get:fn($value)=>__('website.'.$value),
        );
    }

    protected function requestService():Attribute
    {
        return Attribute::make(get:fn($value)=>__('website.'.$value),
        );
    }
}
