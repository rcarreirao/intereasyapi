<?php

namespace Rcarreirao\Intereasyapi\Api\Contracts;

interface ConsumesApi
{
    public function getOauth2Token(string $scopes = null);
}
