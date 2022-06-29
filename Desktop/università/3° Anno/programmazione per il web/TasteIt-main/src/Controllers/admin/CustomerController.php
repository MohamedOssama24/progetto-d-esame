<?php

namespace App\Controllers\admin;

use App\Foundation\admin\FCoupon;
use App\Foundation\admin\FCustomer;
use App\Models\Coupon;
use App\Views\admin\VCustomer;

class CustomerController
{

    function index() { // fa vedere la lista degli utenti
        $vCustomer = new VCustomer();
        $fCustomer = new FCustomer();

        return $vCustomer->showAll($fCustomer->getAll());
    }


    public function sendCoupon() { // il taso manda sconto
        $fCoupon = new FCoupon;
        $customersId = $_POST['customers'];// form per scegliere l'utente a cui mando
        $pricecut = $_POST['pricecut'];  // form per la percentuale
        $expiration = $_POST['expiration']; // form della data di scadenza
        if (validate($_POST, [ // validazione dei dati inseriti
            "expiration"=>["isNotExpired"]
        ])){
            foreach ($customersId as $c) {
                $coupon = new Coupon(); // istanziare il model di coupon per settare i dati
                $coupon->setPriceCut($pricecut);
                $coupon->setExpirationDate($expiration);
                $fCoupon->store($coupon, $c); // salvare nel database
            }
            redirect(url('showAllCustomers'));
        }
       else{
           redirect(url('showBest'));
       }
    }


    public function showBest() { // fa vedere i clienti che hanno speso di piu
        $vCustomer = new VCustomer();
        $fCustomers = new FCustomer();
        $previousMonth = date('m') - 1; // -1 per fare vedere il mese prima di questo (A month before today)
        return $vCustomer->showBest( $fCustomers->topTenCustomersByTotal($previousMonth));
    }

}