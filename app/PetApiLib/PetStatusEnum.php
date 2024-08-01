<?php

namespace App\PetApiLib;

use Spatie\Enum\Enum;

/**
 * @method static self available()
 * @method static self pending()
 * @method static self sold()
 */
final class PetStatusEnum extends Enum
{
    const AVAILABLE = 'available';
    const PENDING = 'pending';
    const SOLD = 'sold';

    /**
     * Get all possible values of the enum.
     *
     * @return array
     */
    public static function getValues(): array
    {
        return [
            self::AVAILABLE,
            self::PENDING,
            self::SOLD,
        ];
    }
}