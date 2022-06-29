<?php

namespace App\Controllers;

use App\Foundation\FCategory;
use App\Foundation\FProduct;
use App\Models\Category;
use App\Views\VCategory;

class CategoryController
{
    function getCategoryProducts($categoryId) { // è il menu a tendina e da li scelgo la categoria desiderata
        $FCategory = new FCategory();
        $category=$FCategory->load($categoryId);
        $products = $FCategory->loadCategoryProducts($categoryId);
        $vCategory= new VCategory();
        $vCategory->viewProducts($products, $category);
 }


}