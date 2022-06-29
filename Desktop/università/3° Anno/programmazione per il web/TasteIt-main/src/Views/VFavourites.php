<?php

namespace App\Views;

class VFavourites
{
    public function viewFavouritesProducts($favId, $products){
        $data=[
            'favId' => $favId,
            'products' => $products
        ];
        return setData('favourite/favourites',$data);
    }
}