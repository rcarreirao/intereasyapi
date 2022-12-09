<?php

namespace Rcarreirao\Intereasyapi\Resources\Payload;

use Rcarreirao\Intereasyapi\Enums\BilletPenaltyEnum;
use Rcarreirao\Intereasyapi\Exceptions\ValidationException;

class PayloadBilletPenalty 
{

    protected string $penaltyCode;
    protected string $date;
    protected string $tax;
    protected string $value;
   
    /**
     * Get the value of penaltyCode
     */ 
    public function getPenaltyCode()
    {
        return $this->penaltyCode;
    }

    /**
     * Set the value of penaltyCode
     *
     * @return  self
     */ 
    public function setPenaltyCode($penaltyCode)
    {
        $this->penaltyCode = $penaltyCode;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of tax
     */ 
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set the value of tax
     *
     * @return  self
     */ 
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Get the value of value
     */ 
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */ 
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function validate(): bool{
        if($this->getPenaltyCode() == ""){ throw app(ValidationException::class)->fieldRequired("penalty.penaltyCode");}
        if(!in_array($this->getPenaltyCode(), BilletPenaltyEnum::toArray())){throw app(ValidationException::class)->invalidFieldValue("discount.discountCode");}
        if($this->getTax() == ""){ throw app(ValidationException::class)->fieldRequired("penalty.tax");}
        if($this->getValue() == ""){ throw app(ValidationException::class)->fieldRequired("penalty.value");}
        return true;
    }

    public function toArray(): array{
        return [
            "codigoMulta"   => $this->getPenaltyCode(),
            "data"          => $this->getDate(),
            "taxa"          => $this->getTax(),
            "valor"         => $this->getValue()
        ];
    }

    
}
