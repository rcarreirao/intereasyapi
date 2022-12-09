<?php

namespace Rcarreirao\Intereasyapi\Enums;

class ScopeEnum
{
    public const SCOPE_EXTRACT_READ         = 'extrato.read';
    public const SCOPE_BILLET_CHARGE_READ   = 'boleto-cobranca.read';
    public const SCOPE_BILLET_CHARGE_WRITE  = 'boleto-cobranca.write';
    public const SCOPE_BILLET_PAYMENT_READ  = 'pagamento-boleto.read';
    public const SCOPE_BILLET_PAYMENT_WRITE = 'pagamento-boleto.write';
    public const SCOPE_DARF_PAYMENT_WRITE   = 'pagamento-darf.write';
    
    /**
     * Returns enummerable attributes as string
     * 
     * @return string
     */
    public static function toString(): string
    {
        $string = self::SCOPE_EXTRACT_READ . ' ';
        $string .= self::SCOPE_BILLET_CHARGE_READ. ' ';
        $string .= self::SCOPE_BILLET_CHARGE_WRITE. ' ';
        $string .= self::SCOPE_BILLET_PAYMENT_READ. ' ';
        $string .= self::SCOPE_BILLET_PAYMENT_WRITE. ' ';
        //$string .= self::SCOPE_DARF_PAYMENT_WRITE. ' ';

        return trim($string);
    }

    /**
     * Returns enummerable attributes as array
     * 
     * @return string
     */
    public static function getAll(): array
    {
        $_enums = [
            self::SCOPE_EXTRACT_READ,
            self::SCOPE_BILLET_CHARGE_READ,
            self::SCOPE_BILLET_CHARGE_WRITE,
            self::SCOPE_BILLET_PAYMENT_READ,
            self::SCOPE_BILLET_PAYMENT_WRITE,
          //  self::SCOPE_DARF_PAYMENT_WRITE
        ];

        return $_enums;
    }


}
