<?php

namespace App\Views\admin;

class VCategory {

    public function categoriesAdmin($categories)
    {
        return view("admin/categories/categories", [
            "categories"=>$categories
        ]);
    }

    public function productsInCategory($products, $category){
        return view("admin/categories/products-admin", [
            "products"=>$products,
            "category"=>$category]);
    }


    public function showAddCategory(){
        return view("admin/categories/categories-add", [
        ]);
    }

    public function showEditProduct($categoryId,$productId,$product){
        return view("admin/categories/product-edit", [
            "categoryId"=>$categoryId,
            "productId"=>$productId,
            "product"=>$product
        ]);
    }
    public function showCreateProduct($categoryId){
        return view("admin/categories/product-add", [
            "categoryId"=>$categoryId
        ]);
    }
}
