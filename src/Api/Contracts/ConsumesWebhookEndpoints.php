<?php

namespace Rcarreirao\Intereasyapi\Api\Contracts;

use Rcarreirao\Intereasyapi\Resources\Payload\PayloadWebhook;

interface ConsumesWebhookEndpoints extends ConsumesApi
{
    public function all();
    
    public function create(PayloadWebhook $payloadWebhook);

    public function delete();
}
