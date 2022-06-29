<?php

namespace App\Foundation\admin;

use App\Foundation\FAddress;
use App\Foundation\FConnection;
use App\Foundation\FPaymentMethod;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductWithQuantity;

class FOrder {


    //per fare il grafico degli ordini
    public function getOrdersPerMonth(){
        $pdo = FConnection::connect();
        //select count(*), extract(Month from creationDate)  from orders group by extract(Month from creationDate) order by extract(Month from creationDate)
        $query="select count(*) as numorders, extract(Month from creationDate) from orders where extract(Year from creationDate)=20".date("y") ." group by extract(Month from creationDate) order by extract(Month from creationDate)";
        $stmt = $pdo->prepare($query);
        //$stmt->debugDumpParams();
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getMonthlyOrdersQuantity(){
        $pdo = FConnection::connect();
        //select count(*) from orders where extract(Month from creationDate)=date("m") and state=Completed;
        $query ="select count(*) from orders where extract(Month from creationDate)=".date("m")." and extract(Year from creationDate)=20".date("y");
        $stmt = $pdo->prepare($query);
        //$stmt->debugDumpParams();
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getMonthlyRevenues(){
        $pdo = FConnection::connect();
        //select sum(total) from orders where extract(Month from creationDate)=date("m") and state=Completed;
        $query ='select sum(total) from orders where orderState="Completed" and extract(Month from creationDate) = '. date("m").' and extract(Year from creationDate) = 20' . date("y");
        //print_r($query);
        $stmt = $pdo->prepare($query);
        //$stmt->debugDumpParams();
        $stmt->execute();
        $sum=$stmt->fetch()[0];
        return round($sum, 2);
    }


    public function getTotal($customerId) {
        $pdo = FConnection::connect();
        $query = "select total from orders join customers on customers.id = orders.customerId where customers.id = :customerId;";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':customerId'=>$customerId));
        return $stmt->fetch();
    }


}