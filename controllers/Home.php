<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/helpers/BaseFunction.php";

class Home extends BaseFunction {

    function view() {
        return $this->viewPage("home");
    }

}
