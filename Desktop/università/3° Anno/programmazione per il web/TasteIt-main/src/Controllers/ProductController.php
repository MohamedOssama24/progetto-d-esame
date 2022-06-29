<?php

namespace App\Controllers;


use App\Foundation\FCart;
use App\Foundation\FCategory;
use App\Foundation\FFavourites;
use App\Foundation\FProduct;
use App\Foundation\FReview;
use App\Models\Review;
use App\Views\VFavourites;
use App\Views\VProduct;

class ProductController {

    public function getAll() {
        $session = Session::getInstance();
        $FProduct = new FProduct();
        $products = $FProduct->getAll();
        $fCart = new FCart();
        $favId = NULL;
        $cartId = NULL;
        if ($session->isUserLogged()) {
            $cus = $session->loadUser();
            $cartId = $cus->getCart()->getId();
            $favId = $cus->getFav()->getId();
            $cart = $fCart->load($cartId);
            $cus->setCart($cart);
            $fCart->update($cart);
            $session->saveUserInSession($cus);

            $vProduct = new VProduct();
            $vProduct->getProducts($products, $cartId, $favId);
        }
        else{
            $vProduct = new VProduct();
            $vProduct->getProducts($products, $cartId, $favId);
        }

    }

    public function getProduct($id)
    {
        $session = Session::getInstance();
        $FProduct = new FProduct();
        $ratings = $FProduct->getRatings($id);
        $product = $FProduct->load($id);
        $stars = $FProduct->getAvgRating($id);
        $cartId = NULL;
        //????
        $star = $stars[0][0];
        //print_r($stars);
        if ($session->isUserLogged()) {
            $cus = $session->loadUser();
            $cartId = $cus->getCart()->getId();
            $vProduct = new VProduct();
            $vProduct->getDetailsOfProduct($product, $star, $ratings, $cartId);
        } else {
            $vProduct = new VProduct();
            $vProduct->getDetailsOfProduct($product, $star, $ratings, $cartId);
        }

    }


    public function addProductToCart($productId){
        $session = Session::getInstance();
        $fProduct = new FProduct();
        $fCart = new FCart();
        $products = $fProduct->getAll();
        $cus = $session->loadUser();
        $cartId = $cus->getCart()->getId();
        $cart = $fCart->load($cartId);
        $product=$fProduct->load($productId);
        $q = (int)$_POST['quantity'];
        if($q === 1) {
            $cart->addToCart($product, 1);
        }
        else {
            $cart->addToCart($product, $q);
        }
        $cus->setCart($cart);
        $fCart->update($cart);
        $session->saveUserInSession($cus);
        $VProduct = new VProduct();
        $VProduct->getProducts($products);
    }



    public function addToFavourites($productId){
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
        redirect('/products');

    }


    public function createReview($productId)
    {
        $session = Session::getInstance();
        $rev = [];
        $cus = $session->loadUser();
        $FReview = new FReview();
        if (validate($_POST, ['stars'=>['isPositive', 'minValue:1', 'maxValue:5']])){
            $stars = $_POST['stars'];
            $comment = $_POST['comment'];
            $review = new Review;
            $review->setStars($stars);
            $review->setComment($comment);
            $review->setCustomer($cus);
            array_push($rev, $review);
            $FReview->createReview($review, $productId);
            redirect(url("getProduct", ["productId"=> $productId]));}
        else{
            redirect(url("products/".$productId));
            }
    }

}