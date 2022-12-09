<?php

namespace Rcarreirao\Intereasyapi\Exceptions;

use Exception;

class InterbankingException extends Exception
{
    public static function tokenNotLoaded(): InterbankingException
    {
        return new static("Inter Easy Api: Token not loaded.");
    }
}
