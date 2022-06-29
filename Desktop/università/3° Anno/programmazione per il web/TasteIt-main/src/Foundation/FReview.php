<?php

namespace App\Foundation;

use App\Models\Review;

class FReview {

    public function loadReviewsOfProduct($id){ // mi carica  tutte le recensioni riguardo un prodotoo
        $pdo = FConnection::connect();
        $query = 'select * from reviews as r where r.productId=:id';
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':id'=>$id));
        $r=$stmt->fetchAll();
        $reviews=[];
        $fcustomer=new FCustomer();
        foreach ($r as $review){
            //print_r($review);
            $rew=new Review;
            $rew->setId($review['id']);
            $rew->setStars($review['stars']);
            $rew->setComment($review['comment']);
            $rew->setCustomer($fcustomer->loadNameSurname($review['customerId']));
            array_push($reviews, $rew);
        }
        return $reviews;
    }
// lasciare una recensione su un prodotto
    function createReview($review, $productId){
        $pdo = FConnection::connect();
        $query = 'insert into reviews(stars, comment, customerId, productId) values (:stars, :comment, :customerId, :pId)';
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':stars'=>$review->getStars(),
            ':comment'=>$review->getComment(),
            'customerId'=>$review->getCustomer()->getId(),
            'pId'=>$productId
            ));
    }
}