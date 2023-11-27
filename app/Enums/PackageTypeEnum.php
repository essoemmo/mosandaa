<?php

namespace App\Enums;

enum PackageTypeEnum :int
{
    case month = 1;
    case host = 2;

    public function label():string
    {
        return match ($this) {
            self::month => __('application.month'),
            self::host => __('application.host')
        };

    }
}
