<?php

namespace App\Enums;

enum SubscriptionStatusEnum : int
{
    case refused = 0;
    case accepted = 1;
    case new = 2;

    public function label(): string
    {
        return match ($this) {
            self::refused => __('admin.refused'),
            self::new => __('admin.new'),
            self::accepted => __('admin.accepted')
        };
    }
}
