<?php

namespace Rcarreirao\Intereasyapi\Resources\Payload;

class PayloadBilletMessage 
{

    protected string $line1;
    protected string $line2;
    protected string $line3;
    protected string $line4;
    protected string $line5;

    /**
     * Get the value of line1
     */ 
    public function getLine1()
    {
        return $this->line1;
    }

    /**
     * Set the value of line1
     *
     * @return  self
     */ 
    public function setLine1($line1)
    {
        $this->line1 = $line1;

        return $this;
    }
    

    /**
     * Get the value of line2
     */ 
    public function getLine2()
    {
        return $this->line2;
    }

    /**
     * Set the value of line2
     *
     * @return  self
     */ 
    public function setLine2($line2)
    {
        $this->line2 = $line2;

        return $this;
    }

    /**
     * Get the value of line3
     */ 
    public function getLine3()
    {
        return $this->line3;
    }

    /**
     * Set the value of line3
     *
     * @return  self
     */ 
    public function setLine3($line3)
    {
        $this->line3 = $line3;

        return $this;
    }

    /**
     * Get the value of line4
     */ 
    public function getLine4()
    {
        return $this->line4;
    }

    /**
     * Set the value of line4
     *
     * @return  self
     */ 
    public function setLine4($line4)
    {
        $this->line4 = $line4;

        return $this;
    }

    /**
     * Get the value of line5
     */ 
    public function getLine5()
    {
        return $this->line5;
    }

    /**
     * Set the value of line5
     *
     * @return  self
     */ 
    public function setLine5($line5)
    {
        $this->line5 = $line5;

        return $this;
    }

    public function validate(): bool{
        return true;
    }

    public function toArray(): array{
        return [
            "line1"     => $this->getLine1(),
            "line2"     => $this->getLine2(),
            "line3"     => $this->getLine3(),
            "line4"     => $this->getLine4(),
            "line5"     => $this->getLine5(),
        ];
    }
}
