<?php

namespace App\Controllers;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class AdminMiddleware implements IMiddleware
{
   // se provo ad scrivere una url per accedere a qualcosa nell'applicazione  senza che sono loggato il midleware verifica se sono loggato o no e se non sono loggato
   // mi rendrizza a login
    public function handle(Request $request): void
    {
        $session=Session::getInstance();
        if (!$session->isRestaurantLogged()){
            redirect("/login");
        }
    }
}