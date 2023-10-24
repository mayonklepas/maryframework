<?php
require_once "helpers/BaseFunction.php";

class Home extends BaseFunction {

    function view() {
        return $this->viewPage("home");
    }

}
