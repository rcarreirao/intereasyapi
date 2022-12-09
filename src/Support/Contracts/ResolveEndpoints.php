<?php

namespace Rcarreirao\Intereasyapi\Support\Contracts;

interface ResolveEndpoints
{
    public function setEndpoint(string $key, string $value): void;

    public function getEndpoint(string $key, array $_parameters): string;
}
