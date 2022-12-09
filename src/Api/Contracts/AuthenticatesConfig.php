<?php

namespace Rcarreirao\Intereasyapi\Api\Contracts;

interface AuthenticatesConfig
{
    public function getToken(string $scopes = null);

    public function getOauthEndpoint(): string;
}
