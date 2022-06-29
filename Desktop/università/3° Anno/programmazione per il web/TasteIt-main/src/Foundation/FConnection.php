<?php

namespace App\Foundation;
require_once 'configDatabase.php';

use PDO;
use PDOException;

abstract class FConnection {
    private static $instance;

    public function __construct() {
    }

    public static function connect(){
        if(!isset(self::$instance)){
            try{
                self::$instance = new PDO('mysql:host=localhost;dbname=tasteit', $GLOBALS['$user'], $GLOBALS['$password']);
            }
            catch(PDOException $ex){

            }
        }
        return self::$instance;
    }

}