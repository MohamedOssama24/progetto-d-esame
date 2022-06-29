<?php

namespace App\Models;

class Restaurant extends User {

    private $phone;
    private $categories=[];
    private $coupons=[];

    public function __construct() {
        parent::__construct();
    }

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function setCategories(array $categories): void
    {
        $this->categories = $categories;
    }

    public function getCoupons(): array
    {
        return $this->coupons;
    }

    public function setCoupons(array $coupons): void
    {
        $this->coupons = $coupons;
    }


    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    public function getAddress()
    {
        return $this->getAddresses()[0];
    }
}