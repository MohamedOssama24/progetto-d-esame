<?php

namespace App\Controllers;


use App\Foundation\FCart;
use App\Foundation\FCategory;
use App\Foundation\FFavourites;
use App\Foundation\FProduct;
use App\Models\Favourites;
use App\Views\VFavourites;
use App\Views\VProduct;

class FavouritesController {

   /* public function store(){
        $FFavourites = new FFavourites();
        $fav = new Favourites();
        $fav->setId(null);
        $FFavourites->store($fav);
        redirect(url('/favourites'));
    }*/

    public function getFavouritesProducts() { // vedere i prodotti messi come favoriti
        $session = Session::getInstance();
        $FFavourites = new FFavourites();
        $cus = $session->loadUser(); // carica le informazioni dell'utente
        $favId = $cus->getFav()->getId(); // carica la lista dei favoriti legata all'utente
        $products =  $FFavourites->load($favId)->getProducts(); // carica i prodotti messi nella lista dei favoriti
        $vFavourites = new VFavourites();
        $vFavourites->viewFavouritesProducts($favId, $products);
    }


    public function deleteProductFromFav() {
        $session = Session::getInstance();
        $FFavourites = new FFavourites();
        $productId = $_POST['productId']; // si passa l'id del prodotto attraverso l'iconca del cestino

        $cus = $session->loadUser();
        $favId = $cus->getFav()->getId();// carica la lista dei favoriti legata all'utente
        if ($_POST['option'] == 'delete') {
            $FFavourites->deleteFromFavourites($favId, $productId);
        }
        redirect(url('/favourites', ['favId' => $favId]));
    }


    public function addToCartFromFav($cartId) {// mentre sto nella lista dei favoriti posso mandare il prodotto al carrello
        $session = Session::getInstance();
        $fProduct = new FProduct();
        $fCart = new FCart();
        $productId = $_POST['productId'];

        $cus = $session->loadUser();
        $favId = $cus->getFav()->getId(); // carica la lista dei favoriti legata all'utente
        $cart = $fCart->load($cartId); // carica il carrello  legato all'utente
        $product = $fProduct->load($productId);// carica la lista dei prodotti legati all'utente
        $cart->addToCart($product, 1); // aggiungi il proddotto una volta
        $cus->setCart($cart);
        $fCart->update($cart);
        $session->saveUserInSession($cus);
        redirect(url('/favourites', ['favId' => $favId]));
    }

}