<?php

namespace App\Foundation;
use App\Models\Favourites;
use App\Models\Product;
use PDO;


class FFavourites extends FConnection {
    function __construct()
    {
        parent::__construct();


    }

    //non andremo mai a inserire nel db una lista preferiti che non sia vuota, quindi la store di un oggetto pieno non ci serve
    function store(): string {
        $pdo = FConnection::connect();
        $query = 'insert into favourites () values ()';
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $pdo->lastInsertId();
        //$stmt->debugDumpParams();
    }

    function exist($id){
        $pdo = FConnection::connect();
        $query="select * from favourites where id= :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':id'=>$id));
        $fav=$stmt->fetch();
        if ($fav!=NULL){
            return true;
        }
        else{
            return false;
        }
    }

    function delete($id){
        $pdo = FConnection::connect();
        $query="delete from favourites where id= :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':id'=> $id));
    }

    function load($id) {
        $fav=new Favourites();
        $fav->setId($id);
        $pdo = FConnection::connect();
        $query= 'SELECT * FROM products_favourites as pf join products as p on pf.productId = p.id where pf.favId = :id';
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':id'=>$id));
        $products= $stmt->fetchAll();
        $f=[];
        foreach($products as $p){
            $prod=new Product;
            $prod->setId($p[3]);
            $prod->setName($p[4]);
            $prod->setDescription($p[5]);
            $prod->setPrice($p[6]);
            $prod->setImagePath($p[8]);
            $prod->setTimesOrdered($p[9]);
        array_push($f, $prod);
        }
        $fav->setProducts($f);
        return $fav;
    }

    function update($newFav){

        $pdo = FConnection::connect();
        $query="select * from products_favourites where favId= :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':id'=>$newFav->getId()));
        //oldfav array di array con gli attributi dei prodotti nel vecchio favourites
        $oldFav=$stmt->fetchAll();
        foreach ($newFav->getProducts() as $newp){
            $wasAlreadyPresent=false;
            foreach($oldFav as $p){
                if ($p[2]==$newp->getId()){
                    $wasAlreadyPresent=true;
                }
            }
            if ($wasAlreadyPresent==false){
                $this->addToFavourites($newFav->getId(), $newp->getId());
            }
        }
    }

    function addToFavourites($favId, $productId) {
        $pdo = FConnection::connect();
        $query = 'insert into products_favourites(`favId`, `productId`) values (:favId, :productId);';
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
            ':favId'=>$favId,
            ':productId'=>$productId
        ));
        return $stmt->fetch(); // restituisce il risultato oppure false(meglio capirlo bene )
    }

    function deleteFromFavourites($favId, $productId){
        $pdo = FConnection::connect();
        $query = 'delete from products_favourites where favId = :favId and productId= :productId;';
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
            ':favId'=> $favId,
            ':productId'=> $productId
        ));
    }


}