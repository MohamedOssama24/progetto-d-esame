<?php

namespace App\Views;

class VCategory
{
    public function viewProducts($products, $category){
        $data=[
            'products' =>  $products,
            'category' => $category
        ];
        return setData('product/products',$data);
    }

}