<?php

namespace Rcarreirao\Intereasyapi\Resources\Payload;

use Rcarreirao\Intereasyapi\Exceptions\ValidationException;

class PayloadBilletPayer 
{

    protected string $cpfCnpj = '';
    protected string $personType = '';
    protected string $name      = '';
    protected string $email     = '';
    protected string $address   = '';
    protected string $number    = '';
    protected string $complement = '';
    protected string $district  = '';
    protected string $state     = '';
    protected string $city      = '';
    protected string $postalCode = '';
    protected string $phoneCode = '';
    protected string $phone     = '';

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
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

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
    public function setAddress($address = '')
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of number
     */ 
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @return  self
     */ 
    public function setNumber($number = 0)
    {
        $this->number = $number ?? 0;

        return $this;
    }

    /**
     * Get the value of complement
     */ 
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * Set the value of complement
     *
     * @return  self
     */ 
    public function setComplement($complement = '')
    {
        $this->complement = $complement;

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
    public function setDistrict($district = '')
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
    public function setState($state = '')
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
    public function setCity($city = '')
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
    public function setPostalCode($postalCode = '')
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get the value of phoneCode
     */ 
    public function getPhoneCode()
    {
        return $this->phoneCode;
    }

    /**
     * Set the value of phoneCode
     *
     * @return  self
     */ 
    public function setPhoneCode($phoneCode = '')
    {
        $this->phoneCode = $phoneCode;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone = '')
    {
        $this->phone = $phone;

        return $this;
    }

    public function validate(): bool{
        if($this->getCpfCnpj() == ""){ throw ValidationException::fieldRequired("cpfCnpj");}
        if($this->getPersonType() == ""){ throw ValidationException::fieldRequired("person type");}
        if($this->getName() == ""){ throw ValidationException::fieldRequired("name");}
        if($this->getAddress() == ""){ throw ValidationException::fieldRequired("address");}
        if($this->getCity() == ""){ throw ValidationException::fieldRequired("city");}
        if($this->getState() == ""){ throw ValidationException::fieldRequired("state");}
        if($this->getPostalCode() == ""){ throw ValidationException::fieldRequired("postal code");}
        return true;
    }

    public function toArray(): array{
        return [
            "cpfCnpj"       => $this->getCpfCnpj(),
            "tipoPessoa"    => $this->getPersonType(),
            "nome"          => $this->getName(),
            "endereco"      => $this->getAddress(),
            "numero"        => $this->getNumber(),
            "complemento"   => $this->getComplement(),
            "bairro"        => $this->getDistrict(),
            "cidade"        => $this->getCity(),
            "uf"            => $this->getState(),
            "cep"           => $this->getPostalCode(),
            "email"         => $this->getEmail(),
            "ddd"           => $this->getPhoneCode(),
            "telefone"      => $this->getPhone(),
        ];
    }
}
