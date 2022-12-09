<?php

namespace Rcarreirao\Intereasyapi\Resources\Response;

class BilletResponse extends ApiResponse
{
    protected function doSuccessProccess(array $_body){
        $this->_data = array_merge($this->_data, $_body);
    }
}
