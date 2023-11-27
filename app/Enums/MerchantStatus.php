<?php

namespace App\Enums;

enum MerchantStatus: int
{
    case ACTIVE = 1;

    case INACTIVE = -1;

    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
