<?php

namespace App\Controllers;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class AuthMiddleware implements IMiddleware{

    public function handle(Request $request): void
    {
        $session=Session::getInstance();
        if (!$session->isUserLogged()){
            redirect("/login"); // per sapere se l'utente è loggato o no
        }

    }
}