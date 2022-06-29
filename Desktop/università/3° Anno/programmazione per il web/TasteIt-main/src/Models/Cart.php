<?php

namespace App\Models;

class Cart {
    private $id;
    //prodotti con quantità
    private $products = [];

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function setProducts($productsArray=array())
    {
        $this->products = $productsArray;
    }

    public function addToCart($product, $quantity){
        if (!$this->isAlreadyInCart($product)){
            array_push($this->products, [$product, $quantity]);
        }
        else {$this->updateQuantity($product, $quantity);}
    }

    public function updateQuantity($product, $quantityToAdd){
        for($i=0; $i < count($this->products);$i++){
        // array di array dove faccio il count degli elementi presenti nell'array poi chiedo se
        // se id del prodotto passato per paramento == all'id del prodotto ciclato
        // se è uguale allora aggiungi la quantità passata per parametro a quella che stava prima
            if ($product->getId()==$this->products[$i][0]->getId()){
                $this->products[$i][1]=$this->products[$i][1]+$quantityToAdd;
            }
        }
    }

    public function isAlreadyInCart($product): bool
    {
        $already=false;
        foreach ($this->products as $p){
            if ($product->getId()==$p[0]->getId()){
                $already=true;
            }
        }
        return $already;
    }

    public function deleteFromCart($product){
        for($i=0; $i < count($this->products);$i++){
            if ($product->getId()==$this->products[$i][0]->getId()){
                unset($this->products[$i]); // La funzione unset() annulla l'impostazione di una variabile.
            }
        }
    }


}