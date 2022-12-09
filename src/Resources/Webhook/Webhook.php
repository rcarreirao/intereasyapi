<?php

namespace Rcarreirao\Intereasyapi\Resources\Webhook;

use Rcarreirao\Intereasyapi\Api\Api;
use Rcarreirao\Intereasyapi\Api\Contracts\ConsumesWebhookEndpoints;
use Rcarreirao\Intereasyapi\Api\Contracts\ProcessedResponse;
use Rcarreirao\Intereasyapi\Exceptions\InterbankingException;
use Rcarreirao\Intereasyapi\Resources\Payload\PayloadWebhook;
use Rcarreirao\Intereasyapi\Resources\Response\WebhookResponse;
use Rcarreirao\Intereasyapi\Support\Endpoints;

class Webhook extends Api implements ConsumesWebhookEndpoints
{

    public function __construct(){
        parent::__construct();
        $this->processedResponse = new WebhookResponse();
    }

    public function create(PayloadWebhook $payloadWebhook): ProcessedResponse
    {
        $endpoint = $this->getEndpoint($this->baseUrl.$this->resolveEndpoint(Endpoints::PUT_WEBHOOK));

        throw_if(!$this->checkOauthToken()->isValidToken(),
            InterbankingException::tokenNotLoaded()
        );

        $payloadWebhook->validate();

        $response = $this->checkOauthToken()->request()->put($endpoint, $payloadWebhook->toArray());
        $this->processedResponse->setResponse($response);
        $this->processedResponse->processResponse();
        return $this->processedResponse;
    }

    /**
     * @throws \Throwable
     */
    public function all(): ProcessedResponse
    {
        throw_if(!$this->checkOauthToken()->isValidToken(),
            InterbankingException::tokenNotLoaded()
        );

        $endpoint = $this->getEndpoint($this->baseUrl.$this->resolveEndpoint(Endpoints::GET_WEBHOOK));

        $response = $this->checkOauthToken()->request()->get($endpoint);
        $this->processedResponse->setResponse($response);
        $this->processedResponse->processResponse();
        return $this->processedResponse;
    }

    /**
     * @throws \Throwable
     */
    public function delete(): ProcessedResponse
    {
        throw_if(!$this->checkOauthToken()->isValidToken(),
            InterbankingException::tokenNotLoaded()
        );

        $endpoint = $this->getEndpoint($this->baseUrl.$this->resolveEndpoint(Endpoints::DELETE_WEBHOOK));

        $response = $this->checkOauthToken()->request()->delete($endpoint);
        $this->processedResponse->setResponse($response);
        $this->processedResponse->processResponse();
        return $this->processedResponse;
    }
}
