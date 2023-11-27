<?php

namespace App\Enums;

enum UserTypeEnum : int
{
        case user = 1;
        case daycare = 2;
        case teacher = 3;
        public function label():string
        {
            return match ($this) {
                self::user => 'user',
                self::daycare => 'daycare',
                self::teacher => 'teacher'
            };
        }
}
