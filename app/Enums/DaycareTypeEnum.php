<?php

namespace App\Enums;

enum DaycareTypeEnum:int
{
    case center = 1;
    case home = 2;

    public function label():string
    {
        return match ($this) {
            self::center => __('application.center'),
            self::home => __('application.homely')
        };

    }
}
