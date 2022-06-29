<?php

namespace App\Views;

class VCart
{

    public function getProducts($cart, $total, $products){
        $data = [
            "cart" => $cart,
            "total" => $total,
            "products" => $products
        ];
        return setData("cart/cart", $data);
    }

    public function viewCoupon($priceCut, $couponId)
    {
        return view('cart/cart', [
            "priceCut" => $priceCut,
            "couponId" => $couponId
        ]);
    }

}
