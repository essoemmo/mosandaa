<?php



namespace App\Enums;

enum SexTypeEnum:int
{
    case male = 1;
    case female = 2;

    public function label():string
    {
        return match ($this) {
            self::male => __('application.male'),
            self::female => __('application.female')
        };

    }
}
