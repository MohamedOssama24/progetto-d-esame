<?php


namespace App\Models;


interface PaymentMethod {

    public function getId();

    public function pay();

}