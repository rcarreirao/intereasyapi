<?php

namespace Rcarreirao\Intereasyapi\Api\Contracts;

use Illuminate\Http\Client\Response;

interface ProcessedResponse
{
    public function processResponse();

    public function setResponse(Response $response);
}
