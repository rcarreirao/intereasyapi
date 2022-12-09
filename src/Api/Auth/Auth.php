<?php

namespace Rcarreirao\Intereasyapi\Api\Auth;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Rcarreirao\Intereasyapi\Api\Contracts\AuthenticatesConfig;
use Rcarreirao\Intereasyapi\Api\Contracts\ProcessedResponse;
use Rcarreirao\Intereasyapi\Resources\Response\AuthResponse;

class Auth implements AuthenticatesConfig
{
    protected string $clientId;
    protected string $clientSecret;
    protected string $certificateFile;
    protected string $certificateKeyFile;
    protected string $urlOauthEndpoint;
    protected ProcessedResponse $response;


    public function __construct(
        string $clientId,
        string $clientSecret,
        string $certificateFile,
        string $certificateKeyFile,
        string $urlOauthEndpoint,
        array $scope=[]
    ) {
        $this->clientId             = $clientId;
        $this->clientSecret         = $clientSecret;
        $this->certificateFile      = $certificateFile;
        $this->certificateKeyFile   = $certificateKeyFile;
        $this->urlOauthEndpoint     = $urlOauthEndpoint;
        $this->scope                = $scope;
        $this->response             = new AuthResponse();
    }

    public function getToken(string $scopes = null)
    {
        $this->requestAuth();
        $this->response->processResponse();
        return $this->response->getOauthToken();
    }

    private function requestAuth(){
        $client = $this->setupHeaders();

        $this->response->setResponse($client->post($this->getOauthEndpoint(), [
            'client_id'     => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type'    => 'client_credentials',
            'scope'         => "extrato.read boleto-cobranca.read boleto-cobranca.write pagamento-boleto.write pagamento-boleto.read",
        ]));
    }

    public function getOauthEndpoint(): string
    {
        return $this->urlOauthEndpoint;
    }

    public function getScopeString(): string
    {
        return implode(" ", $this->scope);
    }

    protected function setupHeaders() : PendingRequest{
        $client = Http::withHeaders([
            'Content-Type'  => 'application/x-www-form-urlencoded',
        ])->asForm();;
        if($this->certificateFile != null){
            $client->withOptions([
                'cert' => $this->certificateFile,
            ]);
        }
        if($this->certificateKeyFile != null){
            $client->withOptions([
                'ssl_key' => $this->certificateKeyFile,
            ]);
        }
        return $client;
    }
}
