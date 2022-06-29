<?php

namespace App\Views\admin;

class VProduct {

    public function productsBestSellers($data)
    {
        return view("admin/products/productsBestSellers", [
            "data"=>$data
        ]);
    }

    public function showReviews($reviews){
        return setData('admin/products/reviews', [
            'reviews'=> $reviews
        ]);
    }

}