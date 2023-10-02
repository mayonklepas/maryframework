<?php
$req = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
$baseUrl = "/";
$dir = __DIR__;

switch ($req) {
       case $baseUrl."menu":
              require_once $dir."/controllers/menu.php";
              $menu = new Menu();
              $menu->viewMenu();
              break;
       default:
              break;
}
