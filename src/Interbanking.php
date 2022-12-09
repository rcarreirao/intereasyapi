<?php

namespace Rcarreirao\Intereasyapi;

use Rcarreirao\Intereasyapi\Api\Contracts\AuthenticatesConfig;

class Interbanking
{
    /**
     * Defines which callback should be used to authenticate a config.
     *
     * @param string $callback
     */
    public static function authenticatesUsing(string $callback): void
    {
        app()->singleton(AuthenticatesConfig::class, $callback);
    }

}
