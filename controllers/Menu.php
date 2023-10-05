<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/helpers/BaseFunction.php";

class Menu extends BaseFunction {

    public function view($request) {
        $menu= $this->db("webcpdb")->table("menu")->get();
        $data=[
            "menu"=>$menu
        ];
        $this->viewPage("menu",$data);
    }

}
