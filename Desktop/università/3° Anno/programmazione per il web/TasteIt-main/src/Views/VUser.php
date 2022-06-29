<?php

namespace App\Views;

class VUser {

    public function getOrderDetails($products, $order){
        $data=[
            "products"=>$products,
            "order"=>$order
            ];
        setData("user/orders-details", $data);
    }

    public function getProfile($customer, $orders, $coupons) {
        $data = [
            'id' => $customer->getId(),
            'name' => $customer->getName(),
            'surname' => $customer->getSurname(),
            'email' => $customer->getEmail(),
            'password' => $customer->getPassword(),
            'image' => $customer->getImagePath(),
            'orders' => $orders,
            'coupons' => $coupons
        ];
        return setData('user/profile', $data);
    }

    public function getCartId($user) {
        return view('cart/cart', [
            'id' => $user->getId(),
            'cartId' => $user->getCartId(),
        ]);
    }

    public function getAddCard(){ // per aggiungere una carta di credito
        $data=[];
        return setData("user/cards-add", $data);
    }

    public function getAddAddress(){
        $data=[];
        return setData("user/addresses-add", $data);
    }
}