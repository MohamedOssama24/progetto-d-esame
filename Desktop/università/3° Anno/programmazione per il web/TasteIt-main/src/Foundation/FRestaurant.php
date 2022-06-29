<?php

namespace App\Foundation;


use App\Models\Order;
use App\Models\Restaurant;
use PDO;

class FRestaurant extends FConnection {

    function __construct()
    {
        parent::__construct();
    }

    public function authentication($email, $password){
        $pdo = FConnection::connect();
        $query = "SELECT password FROM restaurant WHERE email=:email";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':email'=>$email));
        $rows = $stmt->fetch();
        if($rows==""){
            return false;
        }
        else{
            return password_verify($password, $rows[0]); // password_verify è una funzione di php che dice
            // Verifies that the given hash matches the given password. password_verify() is compatible with crypt().
            //  Therefore, password hashes created by crypt() can be used with password_verify().
        }
    }

    public function getByEmail($email){ // mi ritorna tutte le informazioni riguardanti il ristorante se lo cerco per Email
        $pdo = FConnection::connect();
        $query = "SELECT * FROM restaurant WHERE email=:email";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':email'=>$email));
        $r= $stmt->fetch();
        $rest=new Restaurant;
        $rest->setId($r[0]);
        $rest->setName($r[1]);
        $rest->setEmail($r[2]);
        $faddress=new FAddress;
        $rest->setAddresses([$faddress->load($r[4])]);
        $rest->setPhone($r[5]);
        return $rest;
    }


}