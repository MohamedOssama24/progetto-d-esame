<?php
namespace App\Models;

use App\Controllers\categoryController;
use App\Foundation\FCategory;
use App\Foundation\FImage;

class Category{
    private $id;
    private $name;
    private $categoryProducts = [];
    private $image;

    public function getId()
    {

        return $this->id;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }


    public function setId($categoryId): void
    {
        $this->id = $categoryId;
    }


    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name=$name;
    }

    public function getCategoryProducts(){
        return $this->categoryProducts;
    }

    public function setCategoryProducts($products=array()){
        $this->categoryProducts=$products;
    }


}
