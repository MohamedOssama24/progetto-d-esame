<?php


namespace App\Models;


use App\Foundation\FCategory;

class Product {

    private $id;
    private $name;
    private $description;
    private $price;
    private $imagePath;
    private $timesOrdered;
    private $reviews=[];

    public function __construct() {
    }

    public function getReviews(): array
    {
        return $this->reviews;
    }

    public function setReviews(array $reviews): void
    {
        $this->reviews = $reviews;
    }

    public function getImagePath()
    {
        return $this->imagePath;
    }

    public function setImagePath($imagePath): void
    {
        $this->imagePath = $imagePath;
    }

    public function getTimesOrdered()
    {
        return $this->timesOrdered;
    }

    public function setTimesOrdered($timesOrdered): void
    {
        $this->timesOrdered = $timesOrdered;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }


    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }


}