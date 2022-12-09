<?php

namespace Rcarreirao\Intereasyapi\Enums;

class BilletDiscountEnum
{
    public const NO_DISCOUNT            = 'NAOTEMDESCONTO';
    public const FIX_VALUE_UNTIL_DATE   = 'VALORFIXODATAINFORMADA';
    public const PERCENTAGE_UNTIL_DATE  = 'PERCENTUALDATAINFORMADA';

    /**
     * Returns enummerable attributes as string
     * 
     * @return string
     */
    public static function toString(): string
    {
        $string = self::NO_DISCOUNT . ',';
        $string .= self::FIX_VALUE_UNTIL_DATE. ',';
        $string .= self::PERCENTAGE_UNTIL_DATE;

        return $string;
    }

    /**
     * Returns enummerable attributes as array
     * 
     * @return string
     */
    public static function toArray(): array
    {
        $_enums = [
            self::NO_DISCOUNT,
            self::FIX_VALUE_UNTIL_DATE,
            self::PERCENTAGE_UNTIL_DATE
        ];

        return $_enums;
    }


}
