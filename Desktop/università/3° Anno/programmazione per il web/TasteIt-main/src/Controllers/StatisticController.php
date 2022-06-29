<?php

namespace App\Controllers;


use App\Foundation\FRestaurant;
use App\Foundation\FCategory;
use App\Foundation\FOrder;
use App\Foundation\FProduct;
use App\Models\Coupon;
use App\Views\VStatistic;

class StatisticController{

    public function visualizeStatistics(){
        $fOrder=new \App\Foundation\admin\FOrder(); // è per specificare meglio da dove prende i dati perch' l'utente ha lo stesspo nome della classe
        $fProducts=new \App\Foundation\admin\FProduct();
        $monthly=$fOrder->getMonthlyRevenues();
        $ordersQuantity=$fOrder->getMonthlyOrdersQuantity();
        $bestSeller=$fProducts->getBestSeller();
        $worstSeller=$fProducts->getWorstSeller();
        $data=$fOrder->getOrdersPerMonth();
        $data1=[];
        for($i=1; $i<=12; $i++){
            $data1[$i]=0;
        }
        foreach ($data as $element){
            $data1[$element[1]]=$element[0]; // quindi prende il mese ed il numero degli ordini
        }
        $vAdmin= new VStatistic();
        $vAdmin->visualizeStatistics($monthly,$ordersQuantity[0], json_encode(array_values($data1)), $bestSeller, $worstSeller);
    }

}