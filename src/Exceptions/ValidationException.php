<?php

namespace Rcarreirao\Intereasyapi\Exceptions;

class ValidationException extends InterbankingException
{
    public static function fieldRequired(string $field): InterbankingException
    {
        return new static("Field '{$field}' is required.");
    }

    public static function invalidFieldValue(string $field): InterbankingException
    {
        return new static("Field '{$field}' have invalid value.");
    }
}
