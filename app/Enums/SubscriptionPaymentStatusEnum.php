<?php


namespace App\Enums;

enum SubscriptionPaymentStatusEnum: int
{

    case paid = 0;
    case unpaid = 1;
    public function label(): string
    {
        return match ($this) {
            self::paid => __('admin.paid'),
            self::unpaid => __('admin.unpaid')
        };
    }
}
