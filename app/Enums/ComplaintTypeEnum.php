<?php

namespace App\Enums;

enum ComplaintTypeEnum :int
{
    case reserve = 0;
    case solve= 1;

    public function label():string
    {
        return match ($this) {
            self::reserve => __('application.reserve'),
            self::solve => __('application.solve'),
        };

    }
}
