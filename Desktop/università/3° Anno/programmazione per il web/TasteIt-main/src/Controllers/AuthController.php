<?php

namespace App\Controllers;

use App\Foundation\FCart;
use App\Foundation\FFavourites;
use App\Foundation\FRestaurant;
use App\Foundation\FCustomer;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Favourites;
use App\Views\VAuth;
use Validator;

class AuthController
{
    public function visualizeLogin()// il tasto login
    {
        $vauth = new VAuth(); // viene chiamata dalla parte view ( per vedere la login )
        $vauth->visualizeLogin("");
    }

    public function visualizeSignUp() // viene chiamata dalla parte view ( per vedere la SignUp)
    // il tasto registrati
    {
        $vauth = new VAuth();
        $vauth->visualizeSignUp("");
    }

    public function login() // il form in cui inserisco i dati per loggare
    {
        $session = Session::getInstance(); // creare un istanza della sessione
        $email = $_POST["email"]; // recupero dei dati passati tramite  modulo form
        $password = $_POST["password"];  // recupero dei dati passati tramite  modulo form
        $fuser = new FCustomer(); // creato per poter assocciare dopo i dati passati attraverso il form con essi
        $frest = new FRestaurant(); // creato per poter assocciare dopo i dati passati attraverso il form con essi
        if ($fuser->authentication($email, $password)) { // per renderizzare alla parte di login del user
            $user = $fuser->getByEmail($email);
            $session->saveUserInSession($user); // salvataggio mail del user nella sessione
            redirect(url("home"));
        } else if ($frest->authentication($email, $password)) { // per renderizzare alla parte di login del admin
            $restaurant = $frest->getByEmail($email);
            $session->saveUserInSession($restaurant); // salvataggio mail del resturant  nella sessione
            redirect(url("admin"));
        } else {
            $message = "il login non è andato a buon fine"; // qua se l'accesso non è valido
            $vauth = new VAuth();
            $vauth->visualizeLogin($message);
        }

    }

    public function signUp() // il form in cui inserisco i dati per registrarmi
    {

        $vauth = new VAuth();
        $isValid = validate($_POST, [ // metodo che sta nell'utility
            // qua uso la validazione usata attraverso regex ( meglio se do un occhiata veloce nel sito w3school)
            "name" => ["maxLength:20", "minLength:3"], "surname" => ["minLength:2"], "email" => ["minLength:1"], "password" => ["minLength:5"]
        ]);
        if (!$isValid) {  // se non è valido quello che viene inserito  nel form
            $message = "Il form non è valido";
            return $vauth->visualizeSignUp($message);
        }
        else {
            $name = $_POST["name"]; // recupero dei dati passati tramite  modulo form
            $surname = $_POST["surname"]; // recupero dei dati passati tramite  modulo form
            $email = $_POST["email"]; // recupero dei dati passati tramite  modulo form
            $password = $_POST["password"]; // recupero dei dati passati tramite  modulo form
            $fuser = new FCustomer(); // creato per poter assocciare dopo i dati passati attraverso il form con essi
            $FCart = new FCart(); // creato per poter assocciare dopo i dati passati attraverso il form con essi
            $FFavourites = new FFavourites(); // per assegnarli dopo una lista di favoriti vuota
            
            $message = "";
            if (!$fuser->exist($email)) { //  se l'utente è nuovo allora fai il settagio dei dati
                $customer = new Customer();
                $customer->setName($name);
                $customer->setSurname($surname);
                $customer->setEmail($email);
                $customer->setPassword($password);
                $cart = new Cart();
                $cart->setId(NULL); // messo null perchè il database farà l'autoincrement dell'id del carello appena creato
                $FCart->store($cart);

                $fav = new Favourites();
                $fav->setId(NULL); // messo null perchè il database farà l'autoincrement dell'id del lista favoriti  appena creata
                $FFavourites->store($fav);
                $customer->setCart($cart);// assegna il carrello al customer
                $customer->setFav($fav); // assegna la lista favoriti al customer
                if (!$_FILES["uploadfile"]["name"]=="") { //se il file caricato non è vuoto allora carica l'immagine
                    $customer->setImagePath(uploadImage());
                }
                else {
                    $customer->setImagePath("/src/assets/images/user.jpg"); // altrimenti setta il customer con la foto di default gia esistente
                }
                $fuser->store($customer);
                redirect("/login");
            } else {
                $message = "Esiste già un utente con questa e-mail";
                $vauth = new VAuth();
                return $vauth->visualizeSignUp($message);
            }

        }


    }

    public function logout()
    {
        $session = Session::getInstance();
        $session->logout();
        $vauth = new VAuth();
        $vauth->visualizeLogin("");
    }

    public function error404(){
        return setData("error-404", []); // metodo  di utility
    }
}