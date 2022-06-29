<?php

namespace App\Foundation\admin;

use App\Foundation\FConnection;
use App\Models\Coupon;

class FCoupon extends FConnection {

    public function __construct() {
        parent::__construct();
    }

    public function load($id){
        $pdo = FConnection::connect();
        $query = 'select * from coupons where id= :id';
        $stmt = $pdo->prepare($query);
        $stmt->execute(array( ':id'=> $id));
        $coupon=$stmt->fetch();
        $c=new Coupon;
        if ($coupon!=null){
            $c->setId($coupon[0]);
            $c->setPriceCut($coupon[1]);
            $c->setExpirationDate($coupon[2]);
            $c->setIsUsed($coupon[3]);
        }
        return $c;
    }

    public function exist($id){
        $pdo = FConnection::connect();
        $query="select * from coupons where id= :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array( ':id'=> $id));
        $coupon=$stmt->fetch();
        if ($coupon!=NULL){
            return true;
        }
        else{
            return false;
        }
    }
    public function store($coupon, $customerId){
        $pdo = FConnection::connect();
        $query="insert into coupons (`id`, `priceCut`, `expirationDate`, `customerId`, `isUsed`) values (:id, :priceCut, :expirationDate, :customerId, 0)";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
            ':id'=> $coupon->getId(),
            ':priceCut'=> $coupon->getPriceCut(),
            ':expirationDate'=> $coupon->getExpirationDate(),
            ':customerId'=> $customerId
            ));
    }

    public function delete($id){
        $pdo = FConnection::connect();
        $query="delete from coupons where id= :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':id'=>$id));
    }

    public function isExpired($id){
        $pdo = FConnection::connect();
        $query="select * from coupons where expirationDate > NOW()";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $coupons= $stmt->fetchAll();
        $result=true;
        foreach($coupons as $coupon){
            if ($coupon[0]==$id){
                $result=false;
            }
        }
        return $result;
    }

    public function isUsed($id){
        $pdo = FConnection::connect();
        $query="select * from coupons where isUsed = 0";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $coupons= $stmt->fetchAll();
        $result=true;
        foreach($coupons as $coupon){
            if ($coupon[0]==$id){
                $result=false;
            }
        }
        return $result;
    }

    public function getAll(){
        $pdo = FConnection::connect();
        $query="select * from coupons where expirationDate>NOW() and isUsed = 0";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $coupons= $stmt->fetchAll();
        $cou=[];
        foreach ($coupons as $c){
            $coupon=new Coupon;
            $coupon->setId($c[0]);
            $coupon->setPriceCut($c[1]);
            $coupon->setExpirationDate($c[2]);
            array_push($cou, $coupon);
        }
        return $cou;
    }

    public function setAsUsed($id){
        $pdo = FConnection::connect();
        $query="update coupons set isUsed=1 where id= :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':id'=>$id));
    }
}