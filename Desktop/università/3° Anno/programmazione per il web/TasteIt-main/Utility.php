<?php

use App\Controllers\Session;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

function setData($view, $data){
        $session=Session::getInstance(); // per prendere i dati dell'utente
        $fcat=new \App\Foundation\FCategory();
        $frestaurant=new \App\Foundation\FRestaurant();
        $categories=$fcat->getAll();
        $data["categories"]=$categories;
        $data["restaurant"]=$frestaurant->getByEmail("tasteit@gmail.com");
        if ($session->isUserLogged()){
            $user=$session->loadUser();
            $cart=$user->getCart();
            $favId = $user->getFav()->getId();

            $cartProducts=$cart->getProducts();
            $data["cartId"]=$cart->getId();
            $data["cartProducts"]= $cartProducts;
            $data["user"]= $user;
            $data["favId"] = $favId;
            return view($view, $data);
        }
        else{
            $data["user"]=NULL;
            return view($view, $data);
        }
    }

    function minLength($args): bool
    {
        return strlen($args[0]) >= $args[1];
    }

    function maxLength($args): bool
    {
        return strlen($args[0]) <= $args[1];
    }

    function maxValue($args): bool
    {
        return (int)$args[0] <= $args[1];
    }

    function minValue($args): bool
    {
        return (int)$args[0] >= $args[1];
    }

    function isPositive($args): bool {
        return intval($args[0]) > 0;
    }

    function isNotExpired($args): bool {
        return $args[0] > date("Y-m-d");
    }


function validate($target, $fields): bool {
        $isValid = true;
        foreach ($fields as $field=>$validators) {
           foreach ($validators as $validator) {
               $splitted = explode(":", $validator);
               //la prima parola splittata
               $functionToCall = $splitted[0];
               //argomenti da passare alla funzione
               $args = [$target[$field], $splitted[1]];
               if(call_user_func(strval($functionToCall), $args) == false) {
                   $isValid = false;
               }

           }
        }
        return $isValid;
    }


    function printObject($data) {
        echo '<pre>'; print_r($data); echo '</pre>';
    }


    function uploadImage(): string { // metodo di utility
        $msg = "";
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "src/assets/images/" . $filename;
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }
        return '/'.$folder;
    }


