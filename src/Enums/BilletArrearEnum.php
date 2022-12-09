<?php

namespace Rcarreirao\Intereasyapi\Enums;

class BilletArrearEnum
{
    public const DAILY_VALUE    = 'VALORDIA';
    public const MONTLHY_TAX    = 'TAXAMENSAL';
    public const EXEMPT         = 'ISENTO';

    /**
     * Returns enummerable attributes as string
     * 
     * @return string
     */
    public static function toString(): string
    {
        $string = self::DAILY_VALUE . ',';
        $string .= self::MONTLHY_TAX. ',';
        $string .= self::EXEMPT;

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
            self::DAILY_VALUE,
            self::MONTLHY_TAX,
            self::EXEMPT
        ];

        return $_enums;
    }


}
