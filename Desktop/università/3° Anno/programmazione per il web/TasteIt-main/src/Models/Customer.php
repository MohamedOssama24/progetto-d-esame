<?php


namespace App\Models;


class Customer extends User {
    private $surname;
    private $cart;
    private $fav;
    private $creditCards=[];
    private $orders=[];
    private $coupons=[];
    private $imagePath;

    public function __construct() {
        parent::__construct();
    }

    public function getCoupons(): array
    {
        return $this->coupons;
    }

    public function setCoupons(array $coupons): void
    {
        $this->coupons = $coupons;
    }

    public function getCreditCards(): array
    {
        return $this->creditCards;
    }

    public function setCreditCards(array $creditCards): void
    {
        $this->creditCards = $creditCards;
    }

    public function getOrders(): array
    {
        return $this->orders;
    }

    public function setOrders(array $orders): void
    {
        $this->orders = $orders;
    }


    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    public function getCart()
    {
        return $this->cart;
    }

    public function setCart($cart)
    {
        $this->cart = $cart;
    }

    public function getFav()
    {
        return $this->fav;
    }

    public function setFav($fav)
    {
        $this->fav = $fav;
    }

    public function getImagePath()
    {
        return $this->imagePath;
    }

    public function setImagePath($imagePath): void
    {
        $this->imagePath = $imagePath;
    }



}

