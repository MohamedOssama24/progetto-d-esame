<?php

namespace App\Controllers;

use App\Foundation\FCart;
use App\Foundation\FCategory;
use App\Foundation\FFavourites;
use App\Foundation\FProduct;
use App\Views\VCart;
use App\Views\VFavourites;
use App\Views\VHomePage;
use App\Views\VProduct;

class HomePageController {

     public function visualizeHome(){
         $session = Session::getInstance();
         $FProduct = new FProduct();
         //sono prodotti
         $bestSellers = $FProduct->getBestSellers();
         // sono prodotti, non reviews
         $bestReviews = $FProduct->getBestReviews();
         $products = $FProduct->getAll();
         $b = $FProduct->getBestRated();
         $topThreeReviews = [];
         foreach($bestReviews as $product) {
             if(sizeof($product->getReviews())) {
                 array_push($topThreeReviews, $product->getReviews()[0]);
             }
         }
         $bestRateds = [];
         foreach ($b as $best) {
             array_push($bestRateds, $FProduct->load($best[1]));
         }
         $cartId = NULL;
         $favId = NULL;
         if ($session->isUserLogged()) {
             $cus = $session->loadUser();
             $favId = $cus->getFav()->getId();
             $cartId = $cus->getCart()->getId();
             $products = $FProduct->getAll();
             $vHome = new VHomePage();
             $vHome->viewHomePageIfLogged($favId, $cartId, $bestSellers, $bestRateds, $topThreeReviews, $products);
         } else {
             $vHome = new VHomePage();
             $vHome->viewHomePageIfLogged($favId, $cartId, $bestSellers, $bestRateds, $topThreeReviews, $products);
         }

     }

    public function addToCartFromHome($productId) {
        $session = Session::getInstance();
        $fProduct = new FProduct();
        $fCart = new FCart();
        $cus = $session->loadUser();
        $cartId = $cus->getCart()->getId();
        $cart = $fCart->load($cartId);
        $product=$fProduct->load($productId);
        $cart->addToCart($product, 1);
        $cus->setCart($cart);
        $fCart->update($cart);
        $session->saveUserInSession($cus);

        redirect('/home');
    }


    public function addToFavouritesFromHome($productId) {
        $session = Session::getInstance();
        $FFavourites = new FFavourites();
        $fProduct = new FProduct();
        $cus = $session->loadUser();
        $favId = $cus->getFav()->getId();
        $fav = $FFavourites->load($favId);
        $product=$fProduct->load($productId);
        $fav->addToFavourites($product);
        $cus->setFav($fav);
        $FFavourites->update($fav);
        $session->saveUserInSession($cus);
        redirect('/home');
     }


    public function about(){
        $VHome = new VHomePage();
        $VHome->about();
    }
}

