<?php

namespace Rcarreirao\Intereasyapi\Support;

use Exception;
use Rcarreirao\Intereasyapi\Support\Contracts\ResolveEndpoints;

class Endpoints implements ResolveEndpoints
{
    const OAUTH_TOKEN_PATH  = 'oauth_token';
    const POST_BILLET       = 'post_billet';
    const GET_BILLET        = 'get_billet';
    const GET_BILLET_DETAIL = 'get_billet_detail';
    const GET_BILLET_PDF    = 'get_billet_pdf';
    const POST_BILLET_CANCEL= 'post_billet_cancel';
    const PUT_WEBHOOK       = 'put_webhook';
    const GET_WEBHOOK       = 'get_webhook';
    const DELETE_WEBHOOK    = 'delete_webhook';


    public array $endpoints = [
        self::OAUTH_TOKEN_PATH      => '/oauth/v2/token',
        self::POST_BILLET           => '/cobranca/v2/boletos',
        self::GET_BILLET            => '/cobranca/v2/boletos',
        self::GET_BILLET_DETAIL     => '/cobranca/v2/boletos/{nossoNumero}',
        self::GET_BILLET_PDF        => '/cobranca/v2/boletos/{nossoNumero}/pdf',
        self::POST_BILLET_CANCEL    => '/cobranca/v2/boletos/{nossoNumero}/cancelar',
        self::PUT_WEBHOOK           => '/cobranca/v2/boletos/webhook',
        self::GET_WEBHOOK           => '/cobranca/v2/boletos/webhook',
        self::DELETE_WEBHOOK        => '/cobranca/v2/boletos/webhook',
    ];

    public function setEndpoint(string $key, string $value): void
    {
        $this->endpoints[$key] = $value;
    }

    /**
     * @param string $key
     *
     * @throws Exception
     *
     * @return string
     */
    public function getEndpoint(string $key, array $_parameters = []): string
    {
        if (!$endpoint = $this->endpoints[$key]) {
            throw new Exception("Endpoint does not exist: '{$key}'");
        }

        return $this->evaluateParameters($endpoint, $_parameters);
    }

    /**
     * @param string $key
     *
     * @throws Exception
     *
     * @return string
     */
    public function evaluateParameters(string $endpoint, array $_parameters = []): string
    {
        foreach($_parameters as $key => $value){
            $endpoint = str_replace("{{$key}}", $value, $endpoint);
        }

        return $endpoint;
    }
}
