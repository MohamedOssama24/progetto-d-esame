<?php

namespace App\Views\admin;

class VCoupon
{

    public function showAll($coupons)
    {
        return view("admin/coupons/coupons", [
            'coupons' => $coupons
        ]);
    }


}