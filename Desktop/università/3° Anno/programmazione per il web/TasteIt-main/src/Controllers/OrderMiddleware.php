<?php

namespace App\Controllers;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class OrderMiddleware implements IMiddleware{

    public function handle(Request $request): void // verifica se hai un corrello vuoto o no
    {
        $session=Session::getInstance();
        if ($session->loadCart()->getProducts()==[]){
            redirect("/home");
        }
    }
}