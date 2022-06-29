<?php

namespace App\Controllers;

use App\Foundation\FCart;
use App\Foundation\FOrder;
use App\Foundation\FProduct;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Views\VCart;
use PDO;

class CartController {

    public function getProductsOfCart() {
        $session = Session::getInstance();
        $FCart = new FCart();
        $cus = $session->loadUser();
        $cartId = $cus->getCart()->getId();
        $cart = $FCart->load($cartId);
        $products = $cart->getProducts();
        $total = 0;
        foreach ($products as $p) {
            $total = $total + $p[0]->getPrice() * $p[1]; // prezzo per numero di prodotti
        }
        $vCart = new VCart();
        $vCart->getProducts($cart, $total, $products);
    }



    public function create() {
        $FCart = new FCart();
        $cart = new Cart();
        $cart->setId(NULL);
        $FCart->store($cart);
    }

    public function updateQuantity() {
        $session = Session::getInstance();
        $fCart = new Fcart();
        $FProduct = new FProduct();
        $cus = $session->loadUser();
        $cartId = $cus->getCart()->getId();// si ottiene il carrello legato all'utente
        $cart = $fCart->load($cartId); // carica tutti i prodotti dentro il carrello
        $productId = $_POST['productId'];// cliccando sul bottone + nell'applicazione mi rimanda ProductId e cosi so la quantità esistente adesso
        $product = $FProduct->load($productId); // recupera la quantità del prodotto
        if ($_POST['option'] == 'plus') { //plus sarebbe + nell'interfaccia ( il valore plus è inseirto nel <input value="plus")
            $cart->addToCart($product, 1); // incrementa di uno
        } else {
            $cart->addToCart($product, -1); // decrementa di uno
        }
        $cus->setCart($cart);
        $fCart->update($cart);
        $session->saveUserInSession($cus);
        redirect(url('productsOfCarts', ['cartId' => $cartId]));
    }


    public function destroy() { // per togliere un prodotto dal carrello
        $session = Session::getInstance();
        $FCart = new FCart();
        $FProduct = new FProduct();
        $cus = $session->loadUser();
        $cartId = $cus->getCart()->getId();// si ottiene il carrello legato all'utente
        $cart = $FCart->load($cartId);// carica tutti i prodotti dentro il carrello
        $productId = $_POST['productId']; // cliccando sul bottone x nell'applicazione mi rimanda ProductId e cosi so la quantità esistente adesso
        $product = $FProduct->load($productId); // recupera la quantità del prodotto
        if ($_POST['option'] == 'delete') { //delete sarebbe x nell'interfaccia ( il valore delete è inseirto nel <input value="delete")
            $cart->deleteFromCart($product); // me lo toglie dalla parte dell'interfaccia quindi vedo il prodotto cancellato
            $FCart->deleteFromCart($cart, $product); // me lo toglie dal database
        }
        $cus->setCart($cart); // mi aggiorna le informazioni nella sessione del user
        $session->saveUserInSession($cus);
        redirect(url('productsOfCarts', ['cartId' => $cartId]));
    }

}





