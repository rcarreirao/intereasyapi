<?php

namespace Rcarreirao\Intereasyapi\Resources\Response;

use Rcarreirao\Intereasyapi\Api\Contracts\ProcessedResponse;
use Illuminate\Http\Client\Response;

class AuthResponse implements ProcessedResponse
{
    protected ?string $oauthToken;
    protected int $expires;
    protected Response $response;
    protected $status;

    public function processResponse(){
        $this->oauthToken   = null;
        $this->expires      = 0;
        if($this->response->getStatusCode() == 200){
            $_body = $this->response->json();
            $this->oauthToken   = $_body['access_token'] ?? null;
            $this->expires      = $_body['expires_in'] ?? null;
        }
        return $this;
    }

    public function getOauthToken(){
        return $this->oauthToken;
    }

    public function setResponse(Response $response){
        $this->response = $response;
    }
}
