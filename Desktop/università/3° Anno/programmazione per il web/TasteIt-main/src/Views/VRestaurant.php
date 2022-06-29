<?php

namespace App\Views;

class VRestaurant {

    public function editOrder($order) {
        return view('order-accept.tpl', [
            'orderId' => $order->getId(),
            'creationDate' =>$order->getCreationDate(),
            'total'=> $order->getTotal(),
            'paymentId' => $order->getPaymentId(),
            'arrivalTime' => $order->getArrivalTime(),
            'couponId' => $order->getCouponId(),
            'userId' => $order->getUserId(),
            'id' => $order->getRestaurantId(),
        ]);
    }

    public function getContactPage($restaurant) {
        return setData('contact-us', [
            'restaurant'=> $restaurant
        ]);
    }
}