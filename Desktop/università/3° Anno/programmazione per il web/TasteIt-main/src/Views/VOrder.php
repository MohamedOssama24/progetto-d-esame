<?php

namespace App\Views;

use App\Foundation\FProduct;

class VOrder {
//$ orders array di array dove ogni elemento è composto così [ordine, cliente, pagamento]
    public function getOrders($orders) {
        return view('admin/order/orders', [
            'orders' => $orders
        ]);
    }
    public function checkout($cart, $addresses, $cards, $coupon, $valid) {
        $data=[
            'cart'=>$cart,
            'addresses'=>$addresses,
            'cards'=>$cards,
            'coupon'=>$coupon,
            'valid'=>$valid
        ];
        return setData('order/order', $data);
    }

    public function summary($cart, $address, $card, $coupon){
        $data=[
            'cart'=>$cart,
            'address'=>$address,
            'card'=>$card,
            'coupon'=>$coupon
        ];
        return setData('order/order-summary', $data);
    }

}