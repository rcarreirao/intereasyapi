<?php

namespace Rcarreirao\Intereasyapi\Resources\Response;

use Rcarreirao\Intereasyapi\Api\Contracts\ProcessedResponse;
use Illuminate\Http\Client\Response;
use Rcarreirao\Intereasyapi\Support\StatusCodeSupport;

class ApiResponse implements ProcessedResponse
{
    protected ?string $oauthToken;
    protected int $expires;
    protected Response $response;
    protected $status = false;
    protected $errorTitle = '';
    protected $errorDescription = '';
    protected $errorDetails = [];
    protected $_data = [];

    public function processResponse(){
        $_body  = $this->response->json();
        if(StatusCodeSupport::checkStatusSuccess($this->response->getStatusCode())){
            $this->status = true;
            $this->doSuccessProccess($_body ?? []);
        }else{
            $this->doErrorProccess($_body ?? []);
        }
        return $this;
    }

    public function setResponse(Response $response){
        $this->response = $response;
    }

    protected function doSuccessProccess(array $_body){
    }

    protected function doErrorProccess(array $_body){
        $this->errorTitle           = __($_body['title']?? '') ;
        if($this->errorTitle == null && isset($_body['message'])){
            $this->errorTitle           = __($_body['message'] ?? '') ;
        }
        $this->errorDescription     = __($_body['detail']?? '') ;
        $this->processDetails($_body['violacoes'] ?? []);
        $this->generateErrorNode();
    }

    protected function generateErrorNode(){
        $this->_data['error'][] = [
            'title'         => $this->errorTitle,
            'description'   => $this->errorDescription,
            'details'       => $this->errorDetails,
        ] ;
    }


    protected function processDetails(array $_details){
        foreach($_details as $_detail){
            $this->errorDetails[] = $_detail['propriedade'] .":". $_detail['razao'] ."(". $_detail['valor'] .")";
        }
    }

    public function isSuccess(){
        return $this->status;
    }

    public function getData() : array{
        return $this->_data ?? [];
    }

    public function get(string $key, string $default = ''): string{
        if(isset($this->_data[$key])){
            return $this->_data[$key];
        }
        return $default;
    }
}
