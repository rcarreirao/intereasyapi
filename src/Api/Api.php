<?php

namespace Rcarreirao\Intereasyapi\Api;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Rcarreirao\Intereasyapi\Api\Contracts\ConsumesApi;
use Rcarreirao\Intereasyapi\Config;
use Rcarreirao\Intereasyapi\Resources\Response\ApiResponse;
use Rcarreirao\Intereasyapi\Support\Contracts\ResolveEndpoints;
use Rcarreirao\Intereasyapi\Support\Endpoints;

class Api implements ConsumesApi
{
    protected string $baseUrl;
    protected string $clientId;
    protected string $clientSecret;
    protected string $certificateFile;
    protected string $certificateKeyFile;
    protected array  $_scope;
    protected ?string $certificatePassword = null;
    protected ?string $oauthToken;

    protected array $additionalParams = [];
    protected array $additionalOptions = [];
    protected Config $config;
    protected ResolveEndpoints $endpointsResolver;
    protected ApiResponse $processedResponse;

    public function __construct()
    {
        $this->config               = new Config();
        $this->processedResponse    = new ApiResponse();
        $this
            ->setCertificateFile($this->config->getSSLCertificateFile())
            ->setCertificateKeyFile($this->config->getSSLCertificateKeyFile())
            ->setBaseUrl($this->config->getBaseUrl())
            ->setClientId($this->config->getClientId())
            ->setScope($this->config->getScope())
            ->setClientSecret($this->config->getClientSecret())
            ;
    }

    public function setBaseUrl(string $baseUrl): Api
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    public function setClientId(string $clientId): Api
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function setClientSecret(string $clientSecret): Api
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }

    public function setScope(array $_scope): Api
    {
        $this->_scope = $_scope;

        return $this;
    }

    public function setCertificateFile(string $certificateFile): Api
    {
        $this->certificateFile = $certificateFile;

        return $this;
    }

    public function setCertificateKeyFile(string $certificateKeyFile): Api
    {
        $this->certificateKeyFile = $certificateKeyFile;

        return $this;
    }

    public function getConfig(): Config
    {
        return $this->config;
    }

    protected function request(): PendingRequest
    {
        $client = $this->setupHeaders();

        $client->withToken($this->oauthToken);

        return $client;
    }

    protected function setupHeaders() : PendingRequest{
        $client = Http::withHeaders([
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
            'Cache-Control' => 'no-cache',
        ]);
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

    /**
     * [checkAuthentication description]
     *
     * @return  string    [return description]
     */
    public function checkAuthentication() : ?string{
        $this->oauthToken = cache()->get('token_auth_inter');
        return $this->oauthToken;
    }

    /**
     * [refreshAuthentication description]
     *
     * @return  string    [return description]
     */
    public function refreshOauth2Token() : ?string{
        $oauthToken = $this->getOauth2Token();
        $this->setOauth2Token($oauthToken);
        return $this->checkAuthentication();
    }

    public function setOauth2Token(string $oauthToken = null, int $expires=300)
    {
        $this->oauthToken = cache()->remember('token_auth_inter', $expires, function() use($oauthToken)
            { return $oauthToken;}
        );
    }

    public function getOauth2Token(string $scopes = null)
    {
        $authentication_class = $this->getConfig()->getAuthenticationClass();

        return app($authentication_class, [
            'clientId'                  => $this->clientId,
            'clientSecret'              => $this->clientSecret,
            'certificateFile'           => $this->certificateFile,
            'certificateKeyFile'        => $this->certificateKeyFile,
            'urlOauthEndpoint'          => $this->baseUrl.$this->resolveEndpoint(Endpoints::OAUTH_TOKEN_PATH),
            'scope'                     => $this->_scope
        ])->getToken();
    }

    public function withAdditionalParams(array $params): Api
    {
        $this->additionalParams = $params;

        return $this;
    }

    public function withOptions(array $options): Api
    {
        $this->additionalOptions = $options;

        return $this;
    }

    protected function resolveEndpoint(string $endpoint, array $_parameters=[]): string
    {
        return $this->getConfig()->getEndpointsResolver()->getEndpoint($endpoint, $_parameters);
    }

    protected function getEndpoint(string $endpoint): string
    {
        if(!count($this->additionalParams)){
            return $endpoint;
        }
        return $endpoint.'?'.http_build_query($this->additionalParams);
    }

    public function checkOauthToken(){
        $token      = $this->checkAuthentication();
        if($token == ""){
            $this->refreshOauth2Token();
        }
        return $this;
    }

    public function isValidToken(){
        return $this->oauthToken != "";
    }
}
