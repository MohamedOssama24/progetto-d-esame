<?php


namespace App\Models;


class Coupon {
    private $id;
    private $priceCut;
    private $expirationDate;
    private $isUsed;

    //crea un coupon a cui andranno settati gli altri valori con un codice unico con prefisso C di coupon
    public function __construct()
    {
        $this->id=uniqid("C"); // Genera un ID univoco
//Può essere utile, ad esempio, se si generano identificatori contemporaneamente su più host che potrebbero generare l'identificatore nello stesso microsecondo.


    }

    /**
     * @param mixed $isUsed
     */
    public function setIsUsed($isUsed): void
    {
        $this->isUsed = $isUsed;
    }

    /**
     * @return mixed
     */
    public function getIsUsed()
    {
        return $this->isUsed;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    public function setExpirationDate($expirationDate): void
    {
        $this->expirationDate = $expirationDate;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getPriceCut()
    {
        return $this->priceCut;
    }

    public function setPriceCut($priceCut): void
    {
        $this->priceCut = $priceCut;
    }



}