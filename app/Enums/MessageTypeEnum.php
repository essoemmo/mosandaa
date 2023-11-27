<?php

namespace App\Enums;

enum MessageTypeEnum: int
{

    case pending = 1;
    case data_completion = 2;
    case reject = 3;
    case accept = 4;
    case commercial_date = 5;
    case data_completion_user = 6;

    public function label(): string
    {
        return match ($this) {
            self::pending => __('admin.pending'),
            self::reject => __('admin.reject'),
            self::accept => __('admin.accept'),
            self::data_completion => __('admin.data_completion'),
            self::data_completion_user => __('admin.data_completion_user'),
            self::commercial_date => __('admin.commercial_date'),
        };
    }
}
