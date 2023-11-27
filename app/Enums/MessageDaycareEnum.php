<?php

namespace App\Enums;

enum MessageDaycareEnum :int
{
    case job = 1;
    case offer = 2;
    case event = 3;
    case subject = 4;
    case course = 5;
    case accept_subscription = 6;
    case refuse_subscription = 7;

    public function label():string
    {
        return match ($this) {
            self::job => __('application.job'),
            self::offer => __('application.offer'),
            self::event => __('application.event'),
            self::subject => __('application.subject'),
            self::course => __('application.course'),
            self::accept_subscription => __('application.accept_subscription'),
            self::refuse_subscription => __('application.refuse_subscription'),
        };

    }
}
