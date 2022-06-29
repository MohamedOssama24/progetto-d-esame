<?php

namespace App\Views;

class VProduct {
    
    public function getProducts($products) {
        $data = [
            'products' => $products
        ];
        return setData("product/all_products", $data);
    }


    public function getDetailsOfProduct($product, $stars, $ratings, $cartId) {
        $data=[
            'productId' => $product->getId(),
            'avg'=> $stars,
            'reviews' => $ratings,
            'product' => $product,
            'cartId' => $cartId
        ];
        return setData("product/product", $data);
    }
}
