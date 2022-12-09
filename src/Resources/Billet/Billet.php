<?php

namespace Rcarreirao\Intereasyapi\Resources\Billet;

use Rcarreirao\Intereasyapi\Api\Api;
use Rcarreirao\Intereasyapi\Api\Contracts\ConsumesBilletEndpoints;
use Rcarreirao\Intereasyapi\Api\Contracts\ProcessedResponse;
use Rcarreirao\Intereasyapi\Exceptions\InterbankingException;
use Rcarreirao\Intereasyapi\Resources\Payload\PayloadBillet;
use Rcarreirao\Intereasyapi\Resources\Response\BilletResponse;
use Rcarreirao\Intereasyapi\Support\Endpoints;

class Billet extends Api implements ConsumesBilletEndpoints
{

    public function __construct(){
        parent::__construct();
        $this->processedResponse = new BilletResponse();
    }

    public function create(PayloadBillet $payloadBillet): ProcessedResponse
    {
        $endpoint = $this->getEndpoint($this->baseUrl.$this->resolveEndpoint(Endpoints::POST_BILLET));

        throw_if(!$this->checkOauthToken()->isValidToken(),
            InterbankingException::tokenNotLoaded()
        );

        $payloadBillet->validate();

        $response = $this->checkOauthToken()->request()->post($endpoint, $payloadBillet->toArray());
        $this->processedResponse->setResponse($response);
        $this->processedResponse->processResponse();
        return $this->processedResponse;
    }

    public function generatePdf(string $billetNumber): ProcessedResponse
    {
        $endpoint = $this->getEndpoint($this->baseUrl.$this->resolveEndpoint(Endpoints::GET_BILLET_PDF, ['nossoNumero' => $billetNumber]));

        throw_if(!$this->checkOauthToken()->isValidToken(),
            InterbankingException::tokenNotLoaded()
        );

        $response = $this->checkOauthToken()->request()->get($endpoint);
        $this->processedResponse->setResponse($response);
        $this->processedResponse->processResponse();
        return $this->processedResponse;
    }

    /**
     * @throws \Throwable
     */
    public function all(): ProcessedResponse
    {

        $endpoint = $this->getEndpoint($this->baseUrl.$this->resolveEndpoint(Endpoints::GET_BILLET));

        throw_if(!$this->checkOauthToken()->isValidToken(),
            InterbankingException::tokenNotLoaded()
        );

        return $this->request()->get($endpoint);
    }

    /**
     * @throws \Throwable
     */
    public function get(string $billetNumber): ProcessedResponse
    {
        $endpoint = $this->getEndpoint($this->baseUrl.$this->resolveEndpoint(Endpoints::GET_BILLET_DETAIL, ['nossoNumero' => $billetNumber]));

        throw_if(!$this->checkOauthToken()->isValidToken(),
            InterbankingException::tokenNotLoaded()
        );

        $response = $this->request()->get($endpoint);
        $this->processedResponse->setResponse($response);
        $this->processedResponse->processResponse();
        return $this->processedResponse;
    }
}
