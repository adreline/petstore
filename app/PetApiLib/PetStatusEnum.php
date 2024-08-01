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

    /**
     * Get the label for the enum value.
     *
     * @return string
     */
    public static function label(string $enum): string
    {
        $labels = [
            self::AVAILABLE => 'Available',
            self::PENDING => 'Pending',
            self::SOLD => 'Sold',
        ];

        return $labels[$enum] ?? 'Unknown';
    }
}