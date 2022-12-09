<?php

namespace Rcarreirao\Intereasyapi\Enums;

class BilletPenaltyEnum
{
    public const NO_PENALTY  = 'NAOTEMMULTA';
    public const FIX_VALUE   = 'VALORFIXO';
    public const PERCENTAGE  = 'PERCENTUAL';

    /**
     * Returns enummerable attributes as string
     * 
     * @return string
     */
    public static function toString(): string
    {
        $string = self::NO_PENALTY . ',';
        $string .= self::FIX_VALUE. ',';
        $string .= self::PERCENTAGE;

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
            self::NO_PENALTY,
            self::FIX_VALUE,
            self::PERCENTAGE
        ];

        return $_enums;
    }


}
