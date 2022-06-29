<?php

namespace App\Views\admin;

class VCustomer
{

    function showAll($customers) {
        return view("admin/customers/customer", [
            'customers' => $customers
        ]);
    }

    function showBest($customers) {
        return view("admin/customers/showBest", [
            'customers' => $customers
        ]);
    }
}