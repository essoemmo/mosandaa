<?php



namespace App\Enums;

enum SocialTitleEnum:int
{
    case facebook = 1;
    case snapchat = 2;
    case youtube = 3;
    case instagram = 4;
    case whatsapp = 5;
    case linkedin = 6;

    public function label():string
    {
        return match ($this) {
            self::facebook => __('application.facebook'),
            self::snapchat => __('application.snapchat'),
            self::youtube => __('application.youtube'),
            self::instagram => __('application.instagram'),
            self::whatsapp => __('application.whatsapp'),
            self::linkedin => __('application.linkedin'),
        };

    }
}
