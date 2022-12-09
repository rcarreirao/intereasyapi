<?php

namespace Rcarreirao\Intereasyapi\Exceptions;

use Exception;

class InvalidConfigException extends Exception
{
    public static function configNotFound(string $config): InvalidConfigException
    {
        return new static("Missing '{$config}' setting or not configured correctly.");
    }
}
