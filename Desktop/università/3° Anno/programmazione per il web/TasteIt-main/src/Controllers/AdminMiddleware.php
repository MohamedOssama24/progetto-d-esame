<?php

namespace App\Controllers;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class AdminMiddleware implements IMiddleware
{

    public function handle(Request $request): void
    {
        $session=Session::getInstance();
        if (!$session->isRestaurantLogged()){
            redirect("/login"); // se il ristorante è loggato o no
        }
    }
}