<?php

namespace Rcarreirao\Intereasyapi\Enums;

class BilletPayeeEnum
{
    public const PERSON_TYPE_FISICAL    = 'FISICA';
    public const PERSON_TYPE_LEGAL      = 'JURIDICA';

    /**
     * Returns enummerable attributes as string
     * 
     * @return string
     */
    public static function toString(): string
    {
        $string = self::PERSON_TYPE_FISICAL . ',';
        $string .= self::PERSON_TYPE_LEGAL;

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
            self::PERSON_TYPE_FISICAL,
            self::PERSON_TYPE_LEGAL
        ];

        return $_enums;
    }


}
