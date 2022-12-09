<?php

namespace Rcarreirao\Intereasyapi\Resources\Payload;

class PayloadWebhook
{

    protected string $webhookUrl;
   
    /**
     * Get the value of webhookUrl
     */ 
    public function getWebhookUrl()
    {
        return $this->webhookUrl;
    }

    /**
     * Set the value of webhookUrl
     *
     * @return  self
     */ 
    public function setWebhookUrl(string $webhookUrl)
    {
        $this->webhookUrl = $webhookUrl;

        return $this;
    }

    public function validate(): bool{
        if($this->getWebhookUrl() == ""){ throw ValidationException::fieldRequired("webhookUrl");}
        return true;
    }

    public function toArray(): array{
        return [
            "webhookUrl"   => $this->getWebhookUrl(),
        ];
    }

    


}
