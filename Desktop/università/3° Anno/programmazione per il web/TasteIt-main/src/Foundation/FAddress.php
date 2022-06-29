<?php

namespace App\Foundation;

use App\Models\Address;

class FAddress extends FConnection{

    function __construct()
    {
        parent::__construct();
    }
    //load:carica dal database lo stato dell'oggetto salvato nel database
// questa è dell'applicazione resturant
    public function load($id){ // prende in parametro un id e ritorno un oggetto
        $pdo = FConnection::connect(); //eredita il metodo connect dalla classe FConnection
        $query = 'select * from shippingaddresses where id = :id';
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(":id"=>$id));
        $address = $stmt->fetch();
        $add = new Address(); // ha creato un oggetto della classe address in models con i suoi metodi
        $add->setId($address[0]);
        $add->setCap($address[1]);
        $add->setCity($address[2]);  // sta settando tutti i parametri da aggiungere nell'oggetto legato alla classe entity
        $add->setStreet($address[3]);
        $add->setHomeNumber($address[4]);
        return $add; // mi ritorna un oggetto di Address
    }

    public function loadFromCustomerId($id){
        //print_r($id);
        $pdo = FConnection::connect();
        $query = 'select * from shippingaddresses where customerId= :id';
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(":id"=>$id));
        $addresses=$stmt->fetchAll();
        $a=[];
        foreach ($addresses as $address){
        $add=new Address();
        $add->setId($address[0]);
        $add->setCap($address[1]);
        $add->setCity($address[2]);
        $add->setStreet($address[3]);
        $add->setHomeNumber($address[4]);
        array_push($a, $add);
        }
        return $a;
    }
    // Exist :metodo che testa l'esistenza , si passa una chiave della tupla per vedere se lo stato di un oggetto è salvato nel database

    public function exist($id){ // il metodo exist prende id e ritorna un booleano
        $pdo = FConnection::connect();
        $query = 'select * from shippingaddresses where id=:id';
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(":id"=>$id));
        $address=$stmt->fetch();
        if ($address!=NULL){
            return true;
        }
        else{
            return false;
        }
    }
//Store: memorizza sul database , si passa l'intero oggetto poi il metodo si occupa di recuperare le informazioni
// dall'oggetto passato e trasformare queste informazioni in una query e fa l'insert
    public function store($address, $customerid){ // prende come parametri degli oggetti delle classi model
        $pdo = FConnection::connect();
        $cap=$address->getCap(); // sta richiamando i metodi nel model address e le assegna alle variabili
        $city=$address->getCity();
        $street=$address->getStreet();
        $homenumber=$address->getHomeNumber();
        $query="INSERT INTO `shippingaddresses` (`cap`, `city`, `street`, `homeNumber`, `customerId`) VALUES (:cap, :city, :street, :homenumber, :customerId)";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':cap'=>$cap, // un array associativo con chiave valore
            'city'=>$city,
            'street'=>$street,
            'homenumber'=>$homenumber,
            'customerId'=>$customerid));
    }

    /*public function update($address){
        $pdo = FConnection::connect();
        $id=$address->getId();
        $cap=$address->getCap();
        $city=$address->getCity();
        $street=$address->getStreet();
        $homenumber=$address->getHomeNumber();
        //QUESTO LO PRENDIAMO DALLA SESSIONE
        $customerid="dalla sessione";
        $query="UPDATE `shippingaddresses` SET `id`='.$id.',`cap`='.$cap.',`city`='.$city.',`street`='.$street.',`homeNumber`='.$homenumber.',`customerId`='.$customerid.' WHERE id=".$id;
        $stmt = $pdo->prepare($query);
        $stmt->execute();
    }*/

    public function delete($id){ // prende un id come parametro
        $pdo = FConnection::connect();
        $query="delete from shippingaddresses where id=:id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':id'=>$id));
    }

}