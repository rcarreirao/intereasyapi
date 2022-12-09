<?php

namespace Rcarreirao\Intereasyapi\Enums;

class BilletSituationEnum
{
    public const SITUATION_EXPIRED          = 'EXPIRADOS';
    public const SITUATION_OVERDUE          = 'VENCIDO';
    public const SITUATION_OPEN             = 'EMABERTO';
    public const SITUATION_PAID             = 'PAGO';
    public const SITUATION_CANCELED         = 'CANCELADO';
    
    /**
     * Returns enummerable attributes as string
     * 
     * @return string
     */
    public static function toString(): string
    {
        $string = self::SITUATION_EXPIRED . ' ';
        $string .= self::SITUATION_OVERDUE. ' ';
        $string .= self::SITUATION_OPEN. ' ';
        $string .= self::SITUATION_PAID. ' ';
        $string .= self::SITUATION_CANCELED. ' ';

        return trim($string);
    }
}