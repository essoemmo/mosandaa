<?php

namespace App\Enums;

enum PostTypeEnum :int
{
    case request = 0;
    case delay = 1;
    case publish = 2;
    case delete = 3;

    public function label():string
    {
        return match ($this) {
            self::request => __('application.request'),
            self::delay => __('application.delay'),
            self::publish => __('application.publish'),
            self::delete => __('application.del'),
        };

    }
}
