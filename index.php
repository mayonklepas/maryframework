<?php
require_once './route.php';
$req = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$controller=$route[$req]["controller"];
$function=$route[$req]["function"];

require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/" . $controller . ".php";
$array = explode("/", $controller);
$class = $array[count($array) - 1];
$object = new $class;
$param=$_GET;
if($_SERVER['REQUEST_METHOD']=="POST")
    $param=$_POST;
$object->$function($param);
