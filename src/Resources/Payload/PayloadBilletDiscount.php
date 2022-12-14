<?php

namespace Rcarreirao\Intereasyapi\Resources\Payload;

use Rcarreirao\Intereasyapi\Enums\BilletDiscountEnum;
use Rcarreirao\Intereasyapi\Exceptions\ValidationException;

class PayloadBilletDiscount 
{

    protected string $discountCode;
    protected string $date;
    protected string $tax;
    protected string $value;
   
    /**
     * Get the value of discountCode
     */ 
    public function getDiscountCode()
    {
        return $this->discountCode;
    }

    /**
     * Set the value of discountCode
     *
     * @return  self
     */ 
    public function setDiscountCode($discountCode)
    {
        $this->discountCode = $discountCode;

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
        if($this->getDiscountCode() == ""){ throw ValidationException::fieldRequired("discount.discountCode");}
        if(!in_array($this->getDiscountCode(), BilletDiscountEnum::toArray())){throw ValidationException::invalidFieldValue("discount.discountCode");}
        if($this->getTax() == ""){ throw ValidationException::fieldRequired("discount.tax");}
        if($this->getValue() == ""){ throw ValidationException::fieldRequired("discount.value");}
        return true;
    }

    public function toArray(): array{
        return [
            "codigoDesconto"=> $this->getDiscountCode(),
            "data"          => $this->getDate(),
            "taxa"          => $this->getTax(),
            "valor"         => $this->getValue()
        ];
    }
}
