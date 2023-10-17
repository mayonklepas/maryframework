<?php

$requestUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

if (str_starts_with($requestUrl, "/public")) {
    getAssets($requestUrl);
} else {
    getMain($requestUrl, $requestMethod);
}

function getAssets($requestUrl) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/route/resources.php';

    $urlExplode = explode("/", $requestUrl);
    $dir = $urlExplode[2];
    $file = $urlExplode[3];

    $isExist = array_key_exists($dir, $route);
    if (!$isExist) {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/views/404.php";
        return;
    }

    header($route[$dir][1]);
    $selectedRoute = $route[$dir][0] . "/" . $file;
    
    require_once $selectedRoute;
}

function getMain($requestUrl, $requestMethod) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/route/web.php';

    $isExist = array_key_exists($requestUrl, $route);
    if (!$isExist) {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/views/404.php";
        return;
    }

    $rute = $route[$requestUrl];
    $selectedRoute = explode("@", $rute);

    $controller = $selectedRoute[0];
    $function = $selectedRoute[1];

    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/" . $controller . ".php";
    $array = explode("/", $controller);
    $class = $array[count($array) - 1];
    $object = new $class;
    $param = (object) $_GET;
    if ($requestMethod == "POST") {
        $param = (object) $_POST;
        $file = (object) $_FILES;
        $param->file = $file;
    }
    $object->$function($param);
}
