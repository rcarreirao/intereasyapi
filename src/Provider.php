<?php

namespace Rcarreirao\Intereasyapi;

use Rcarreirao\Intereasyapi\Resources\Billet\Billet;
use Rcarreirao\Intereasyapi\Resources\Webhook\Webhook;

class Provider
{
    /**
     * Billet actions
     *
     * @return Billet
     */
    public static function billet(): Billet
    {
        return new Billet();
    }

    /**
     * Webhook actions
     *
     * @return Webhook
     */
    public static function webhook(): Webhook
    {
        return new Webhook();
    }
}
