<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/helpers/DB.php";

class BaseFunction extends DB {

    function redirect($page) {
        $mainUrl = "https://" . $_SERVER['HTTP_HOST'];
        if (empty($_SERVER['HTTPS'])) {
            $mainUrl = "http://" . $_SERVER['HTTP_HOST'];
        }
        header("location:" . $mainUrl . $page);
    }

    function viewPage($page, $data) {
        $countData = 1;
        foreach ($data as $key => $value) {
            ${$key} = $value;
            if (count($data) == $countData) {
                require_once $_SERVER['DOCUMENT_ROOT'] . "/views/" . $page . ".php";
            }
            $countData++;
        }
    }

}
