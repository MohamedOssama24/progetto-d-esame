<?php

namespace App\Controllers;

class Session
{
    private static $instance;

    private function __construct() {}

    public static function getInstance(): Session{ // creare un istanza della sessione
        if (self::$instance == null) {
            self::$instance = new Session();
        }
        return self::$instance;
        // :: è un token che consente l'accesso a proprietà o metodi statici, costanti e sottoposti a override di una classe.
        // Tre parole chiave speciali self, parent e static vengono utilizzate per accedere a proprietà o metodi dall'interno della definizione della classe.
    }


    /*In PHP, utilizziamo session_start() una funzione integrata per avviare la sessione.
     Ma il problema che dobbiamo affrontare in uno script PHP è che se lo eseguiamo più di una volta genera un errore.
      Quindi qui impareremo come controllare la sessione avviata o meno senza chiamare due volte la funzione session_start().*/

    // we can utilize the function session_status(), which returns the status of the present session
    //PHP_SESSION_NONE: Sessions are enabled, but no session has been started.
    // Il codice  controlla se la sessione è iniziata o meno, se non è avviata, avvierà la sessione nello script PHP.
    private function newSession(){ //to check if a session is already started and active.
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function logout(): bool {
        if (isset($_COOKIE["PHPSESSID"])) { //chiedo se il cookie è settato o no e con $_COOKIE recupero il valore (perchè $_cookie è un array associativo )
            $this->newSession(); // recupera in automatico il cookie quindi recupera l'id
            session_unset(); // per cancellare tutte le variabili di sessione(cancello le informazioni dalla ram)
            session_destroy(); // per cancellare la sessione
            setcookie("PHPSESSID", "", time() - 3600, "/"); // Per eliminare un cookie, utilizzare la setcookie()funzione con data di scadenza passata
            // setcookie l'ho usata per sicurezza per sovrascrivere e cancellare  il cookie sul client  cosi sono sicura che viene cancellato
            $bool = true;
        }
        return $bool;
    }

    public function isUserLogged(): bool { // per verificare se l'utente è loggato
        $this->newSession();
        return (isset($_COOKIE["PHPSESSID"]) && (isset($_SESSION["customer"])));
        // il programmatore dice se sta tornando da parte del cliente questa chiave "PHPSESSID" e "customer"
    }


    public function isRestaurantLogged(): bool { // per verificare se il ristorante  è loggato
        $this->newSession();
        return (isset($_COOKIE["PHPSESSID"]) && isset($_SESSION["restaurant"]));
    }

    public function loadUser() {

        $this->newSession();

        if(isset($_SESSION["customer"])){
            $user =  $_SESSION["customer"];
            return unserialize($user);

        } else if (isset($_SESSION["restaurant"])) {
            $restaurant =  $_SESSION["restaurant"]; // Set session variables
            return unserialize($restaurant); //La funzione unserialize() converte i dati serializzati in dati effettivi.
        }
    }

    public function saveUserInSession($user) {
    $this->newSession();
    //per rigenerare il cookie con un id nuovo e stessi dati(per il fatto di sicurezza , per prevenire gli attacchi )
    session_regenerate_id(true);

    $userSer = serialize($user);
    // Serializzare i dati significa convertire un valore in una sequenza di bit, in modo che possa essere archiviato in un file, un buffer di memoria o trasmesso attraverso una rete.

    if ( get_class($user) == 'App\Models\Customer') {
        $_SESSION['customer'] = $userSer; //Per modificare una variabile di sessione, è sufficiente sovrascriverla

    } else if ( get_class($user) == 'App\Models\Restaurant' ) {
        $_SESSION['restaurant'] = $userSer;
        // get_class :Gets the name of the class of the given object.

    }
    }

    public function loadCart() { // il caso del carrello in cui abbiamo usato la sessione e non il cookie per il fatto della dimensione
        $this->newSession();
        $user = unserialize($_SESSION["customer"]);
        return $user->getCart();
    }

}
