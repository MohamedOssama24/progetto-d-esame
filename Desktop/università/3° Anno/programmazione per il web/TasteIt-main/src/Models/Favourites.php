<?php

namespace App\Models;

class Favourites
{
    private $id;
    private $products = array();

    public function getProducts(): array
    {
        return $this->products;
    }


    public function setProducts(array $products): void
    {
        $this->products = $products;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function addToFavourites($product){
        if (!$this->isAlreadyInFavourites($product)){
            array_push($this->products, $product); // La funzione array_push() inserisce uno o più elementi alla fine di un array.


        }
    }

    public function isAlreadyInFavourites($product): bool
    {
        $already=false;
        foreach ($this->products as $p){ // array dei prodotti assegnati sopra come private $products = array();
            if ($product->getId()==$p->getId()){
                $already=true;
            }
        }
        return $already;
    }

}