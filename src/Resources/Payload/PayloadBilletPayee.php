<?php

namespace Rcarreirao\Intereasyapi\Resources\Payload;

use Rcarreirao\Intereasyapi\Exceptions\ValidationException;

class PayloadBilletPayee 
{

    protected string $cpfCnpj       = '';
    protected string $personType    = '';
    protected string $postalCode    = '';
    protected string $name      = '';
    protected string $address   = '';
    protected string $district  = '';
    protected string $state     = '';
    protected string $city      = '';
    
    /**
     * Get the value of cpfCnpj
     */ 
    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    /**
     * Set the value of cpfCnpj
     *
     * @return  self
     */ 
    public function setCpfCnpj($cpfCnpj)
    {
        $this->cpfCnpj = $cpfCnpj;

        return $this;
    }

    /**
     * Get the value of personType
     */ 
    public function getPersonType()
    {
        return $this->personType;
    }

    /**
     * Set the value of personType
     *
     * @return  self
     */ 
    public function setPersonType($personType)
    {
        $this->personType = $personType;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of district
     */ 
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set the value of district
     *
     * @return  self
     */ 
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of postalCode
     */ 
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set the value of postalCode
     *
     * @return  self
     */ 
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function validate(): bool{
        if($this->getCpfCnpj() == ""){ throw app(ValidationException::class)->fieldRequired("cpfCnpj");}
        if($this->getPersonType() == ""){ throw app(ValidationException::class)->fieldRequired("person type");}
        if($this->getName() == ""){ throw app(ValidationException::class)->fieldRequired("name");}
        if($this->getAddress() == ""){ throw app(ValidationException::class)->fieldRequired("address");}
        if($this->getCity() == ""){ throw app(ValidationException::class)->fieldRequired("city");}
        if($this->getState() == ""){ throw app(ValidationException::class)->fieldRequired("state");}
        if($this->getPostalCode() == ""){ throw app(ValidationException::class)->fieldRequired("postal code");}
        return true;
    }

    public function toArray(): array{
        return [
            "cpfCnpj"       => $this->getCpfCnpj(),
            "tipoPessoa"    => $this->getPersonType(),
            "nome"          => $this->getName(),
            "endereco"      => $this->getAddress(),
            "bairro"        => $this->getDistrict(),
            "cidade"        => $this->getCity(),
            "uf"            => $this->getState(),
            "cep"           => $this->getPostalCode(),
        ];
    }
}
