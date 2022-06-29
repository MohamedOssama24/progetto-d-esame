<?php header('Content-type: text/html; charset=UTF-8');

require_once "vendor/autoload.php";
require_once "routes.php";
require_once "View.php";
require_once "vendor/pecee/simple-router/helpers.php";
require_once "Utility.php";


use Pecee\SimpleRouter\SimpleRouter;


$smarty = new View();
$GLOBALS['smarty'] = $smarty;



SimpleRouter::setDefaultNamespace("\App\Controllers");

SimpleRouter::start(); 
