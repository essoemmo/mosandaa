<?php

namespace App\Enums;

enum HostTypeEnum :int
{
    case day = 1;
    case hour = 2;

    public function label():string
    {
        return match ($this) {
            self::day => __('application.day'),
            self::hour => __('application.hour')
        };

    }
}
