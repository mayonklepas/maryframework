<?php
require_once './route.php';
$requestUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

$selectedRoute = explode("@", $route[$requestUrl]);

$controller=$selectedRoute[0];
$function=$selectedRoute[1];

require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/" . $controller . ".php";
$array = explode("/", $controller);
$class = $array[count($array) - 1];
$object = new $class;
$param=(object)$_GET;
if($requestMethod=="POST"){
    $param=(object)$_POST;
}    
$object->$function($param);
