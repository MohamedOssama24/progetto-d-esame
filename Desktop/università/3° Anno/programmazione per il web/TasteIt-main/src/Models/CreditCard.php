<?php

namespace App\Models;

class CreditCard implements PaymentMethod
{
    private $id;
    private $number;
    private $cvv;
    private $cardHolder;
    private $expirationDate;

    public function pay(){

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }


    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number): void
    {
        $this->number = $number;
    }

    public function getCvv()
    {
        return $this->cvv;
    }

    public function setCvv($cvv): void
    {
        $this->cvv = $cvv;
    }

    public function getCardHolder()
    {
        return $this->cardHolder;
    }

    public function setCardHolder($cardHolder): void
    {
        $this->cardHolder = $cardHolder;
    }

    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    public function setExpirationDate($expirationDate): void
    {
        $this->expirationDate = $expirationDate;
    }



}