<?php

namespace Rcarreirao\Intereasyapi\Api\Contracts;

use Rcarreirao\Intereasyapi\Resources\Payload\PayloadBillet;

interface ConsumesBilletEndpoints extends ConsumesApi
{

    public function all();

    public function create(PayloadBillet $payloadBillet);

}
