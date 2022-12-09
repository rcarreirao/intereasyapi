<?php

namespace Rcarreirao\Intereasyapi\Resources\Payload;

use Rcarreirao\Intereasyapi\Enums\BilletArrearEnum;
use Rcarreirao\Intereasyapi\Exceptions\ValidationException;

class PayloadBilletArrear 
{

    protected string $arrearCode;
    protected string $date;
    protected string $tax;
    protected string $value;
   
    /**
     * Get the value of arrearCode
     */ 
    public function getArrearCode()
    {
        return $this->arrearCode;
    }

    /**
     * Set the value of arrearCode
     *
     * @return  self
     */ 
    public function setArrearCode($arrearCode)
    {
        $this->arrearCode = $arrearCode;

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
        if($this->getArrearCode() == ""){ throw ValidationException::fieldRequired("arrear.arrearCode");}
        if(!in_array($this->getArrearCode(), BilletArrearEnum::toArray())){throw ValidationException::invalidFieldValue("discount.discountCode");}
        if($this->getTax() == ""){ throw ValidationException::fieldRequired("arrear.tax");}
        if($this->getValue() == ""){ throw ValidationException::fieldRequired("arrear.value");}
        return true;
    }

    public function toArray(): array{
        return [
            "codigoMulta"   => $this->getArrearCode(),
            "data"          => $this->getDate(),
            "taxa"          => $this->getTax(),
            "valor"         => $this->getValue()
        ];
    }

    
}
