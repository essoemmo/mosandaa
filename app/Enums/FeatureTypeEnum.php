<?php


namespace App\Enums;

enum FeatureTypeEnum: int
{

    case skill = 0;
    case amenity = 1;
    case advantage = 2;

    public function label(): string
    {
        return match ($this) {
            self::skill => __('application.skill'),
            self::amenity => __('application.amenity'),
            self::advantage => __('application.advantage')
        };
    }
}
