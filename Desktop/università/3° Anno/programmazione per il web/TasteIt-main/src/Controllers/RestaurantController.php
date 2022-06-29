<?php

namespace App\Controllers;

use App\Foundation\FOrder;
use App\Models\Order;
use App\Foundation\FRestaurant;
use App\Models\Restaurant;
use App\Views\VOrder;
use App\Views\VRestaurant;
use Pecee\SimpleRouter\SimpleRouter;

class RestaurantController {

    public function visualizeContactPage(){
        $FRestaurant = new FRestaurant();
        $restaurant = $FRestaurant->getByEmail("tasteit@gmail.com");
        $vRestaurant = new VRestaurant();
        $vRestaurant->getContactPage($restaurant);
    }



}