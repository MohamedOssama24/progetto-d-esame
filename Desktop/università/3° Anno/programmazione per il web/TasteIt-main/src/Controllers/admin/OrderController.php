<?php

namespace App\Controllers\admin;

use App\Foundation\FCustomer;
use App\Foundation\FOrder;
use App\Foundation\FProduct;
use App\Foundation\FAddress;
use App\Models\Order;
use App\Views\admin\VOrder;


class OrderController
{

    public function visualizeOrders() // fa vedere tutti gli ordini che sono stati fatti
    {
        $FOrder = new FOrder();
        $orders = $FOrder->getAll();
        $vorder = new VOrder();
        $vorder->getOrders($orders);
    }

    public function visualizeOrderDetails($id) // il button dettagli ordini
    {
        $forder = new FOrder();
        $fcustomer = new FCustomer();
        $faddress = new FAddress();
        $order = $forder->load($id); // fa vedere l'ordine attraverso l'id
        $customer = $fcustomer->load($order->getCustomerId()); // fa vedere il customer di quel ordine
        $products = $forder->getOrderProducts($id); // fa vedere i prodotti che sono stati ordinati
        $vorder = new VOrder();
        $vorder->getOrderDetails($order, $products, $customer);
    }

    public function acceptOrder($id) // il bottone accetta ordine
    {
        $forder = new FOrder();
        $order = $forder->load($id);
        $order->setState("Accepted"); // il tasto accetta ordine
        $order->setArrivalTime(date('H:i:s', strtotime($_POST["arrival"]))); // quello del settaggio del tempo di arrivo
        $forder->update($order);
        redirect(url("/admin/orders"));
    }

    public function refuseOrder($id) // il tasto di rifiutare l'ordine
    {
        $forder = new FOrder();
        $order = $forder->load($id);
        $order->setState("Denied");
        $forder->update($order);
        redirect(url("/admin/orders"));
    }
}