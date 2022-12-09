<?php

namespace Rcarreirao\Intereasyapi\Resources\Payload;

use Rcarreirao\Intereasyapi\Exceptions\ValidationException;

class PayloadBillet 
{
    protected $yourNumber;
    protected float $nominalValue   = 0;
    protected string $dueDate       = '';
    protected string $issuanceDate       = '';
    protected int $numDaysToCancel  = 0;
    protected ?PayloadBilletPayer $billetPayer      = null;
    protected ?PayloadBilletMessage $billetMessage  = null;
    protected ?PayloadBilletDiscount $billetDiscount1= null;
    protected ?PayloadBilletDiscount $billetDiscount2= null;
    protected ?PayloadBilletDiscount $billetDiscount3= null;
    protected ?PayloadBilletPenalty $billetPenalty  = null;
    protected ?PayloadBilletArrear $billetArrear    = null;
    protected ?PayloadBilletPayee $billetPayee      = null;
    

    /**
     * [generateBilletPayload description]
     *
     * @return  [type]                 [return description]
     */
    public function toArray(): array
    {
        $_payload = [
            'seuNumero'         => $this->yourNumber,
            'valorNominal'      => $this->nominalValue,
            'dataVencimento'    => $this->dueDate,
            'dataEmissao'       => $this->issuanceDate,
            'numDiasAgenda'     => $this->numDaysToCancel
        ];
        if($this->getBilletPayer() != null){
            $_payload['pagador']    = $this->getBilletPayer()->toArray();
        }
        if($this->getBilletMessage() != null){
            $_payload['mensagem']    = $this->getBilletMessage()->toArray();
        }
        if($this->getBilletDiscount1() != null){
            $_payload['desconto1']    = $this->getBilletDiscount1()->toArray();
        }
        if($this->getBilletDiscount2() != null){
            $_payload['desconto2']    = $this->getBilletDiscount2()->toArray();
        }
        if($this->getBilletDiscount3() != null){
            $_payload['desconto3']    = $this->getBilletDiscount3()->toArray();
        }
        if($this->getBilletPenalty() != null){
            $_payload['multa']      = $this->getBilletPenalty()->toArray();
        }
        if($this->getBilletArrear() != null){
            $_payload['mora']       = $this->getBilletArrear()->toArray();
        }
        if($this->getBilletPayee() != null){
            $_payload['beneficiarioFinal']       = $this->getBilletPayee()->toArray();
        }
        return $_payload;
    }

    /**
     * Get the value of billetPayer
     */ 
    public function getBilletPayer()
    {
        return $this->billetPayer;
    }

    /**
     * Set the value of billetPayer
     *
     * @return  self
     */ 
    public function setBilletPayer(PayloadBilletPayer $billetPayer)
    {
        $this->billetPayer = $billetPayer;

        return $this;
    }

    /**
     * Get the value of billetMessage
     */ 
    public function getBilletMessage()
    {
        return $this->billetMessage;
    }

    /**
     * Set the value of billetMessage
     *
     * @return  self
     */ 
    public function setBilletMessage($billetMessage)
    {
        $this->billetMessage = $billetMessage;

        return $this;
    }

    /**
     * Get the value of billetDiscount1
     */ 
    public function getBilletDiscount1()
    {
        return $this->billetDiscount1;
    }

    /**
     * Set the value of billetDiscount1
     *
     * @return  self
     */ 
    public function setBilletDiscount1($billetDiscount1)
    {
        $this->billetDiscount1 = $billetDiscount1;

        return $this;
    }

    /**
     * Get the value of billetDiscount2
     */ 
    public function getBilletDiscount2()
    {
        return $this->billetDiscount2;
    }

    /**
     * Set the value of billetDiscount2
     *
     * @return  self
     */ 
    public function setBilletDiscount2($billetDiscount2)
    {
        $this->billetDiscount2 = $billetDiscount2;

        return $this;
    }

    /**
     * Get the value of billetDiscount3
     */ 
    public function getBilletDiscount3()
    {
        return $this->billetDiscount3;
    }

    /**
     * Set the value of billetDiscount3
     *
     * @return  self
     */ 
    public function setBilletDiscount3($billetDiscount3)
    {
        $this->billetDiscount3 = $billetDiscount3;

        return $this;
    }

    /**
     * Get the value of billetPenalty
     */ 
    public function getBilletPenalty()
    {
        return $this->billetPenalty;
    }

    /**
     * Set the value of billetPenalty
     *
     * @return  self
     */ 
    public function setBilletPenalty($billetPenalty)
    {
        $this->billetPenalty = $billetPenalty;

        return $this;
    }

    /**
     * Get the value of billetArrear
     */ 
    public function getBilletArrear()
    {
        return $this->billetArrear;
    }

    /**
     * Set the value of billetArrear
     *
     * @return  self
     */ 
    public function setBilletArrear($billetArrear)
    {
        $this->billetArrear = $billetArrear;

        return $this;
    }

    /**
     * Get the value of billetPayee
     */ 
    public function getBilletPayee()
    {
        return $this->billetPayee;
    }

    /**
     * Get the value of yourNumber
     */ 
    public function getYourNumber()
    {
        return $this->yourNumber;
    }

    /**
     * Set the value of yourNumber
     *
     * @return  self
     */ 
    public function setYourNumber($yourNumber)
    {
        $this->yourNumber = $yourNumber;

        return $this;
    }

    /**
     * Get the value of nominalValue
     */ 
    public function getNominalValue()
    {
        return $this->nominalValue;
    }

    /**
     * Set the value of nominalValue
     *
     * @return  self
     */ 
    public function setNominalValue($nominalValue)
    {
        $this->nominalValue = $nominalValue;

        return $this;
    }

    /**
     * Get the value of dueDate
     */ 
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Set the value of dueDate
     *
     * @return  self
     */ 
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * Get the value of numDaysToCancel
     */ 
    public function getNumDaysToCancel()
    {
        return $this->numDaysToCancel;
    }

    /**
     * Set the value of numDaysToCancel
     *
     * @return  self
     */ 
    public function setNumDaysToCancel($numDaysToCancel)
    {
        $this->numDaysToCancel = $numDaysToCancel;

        return $this;
    }

    /**
     * Set the value of billetPayee
     *
     * @return  self
     */ 
    public function setBilletPayee(PayloadBilletPayee $billetPayee)
    {
        $this->billetPayee = $billetPayee;

        return $this;
    }

    public function validate(): bool{
        if($this->getYourNumber() == ""){ throw ValidationException::fieldRequired("payload.billet.yourNumber");}
        if($this->getNominalValue() == 0){ throw ValidationException::fieldRequired("payload.billet.nominalValue");}
        if($this->getDueDate() == ""){ throw ValidationException::fieldRequired("payload.billet.dueDate");}

        if($this->getBilletPayer() == null || !$this->getBilletPayer()->validate()){ throw ValidationException::fieldRequired("payload.billet.billetPayer");}
        return true;
    }

    /**
     * Get the value of issuanceDate
     */ 
    public function getIssuanceDate()
    {
        return $this->issuanceDate;
    }

    /**
     * Set the value of issuanceDate
     *
     * @return  self
     */ 
    public function setIssuanceDate($issuanceDate)
    {
        $this->issuanceDate = $issuanceDate;

        return $this;
    }
}
