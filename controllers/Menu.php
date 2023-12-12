<?php

require_once "helpers/DB.php";
require_once "helpers/BaseFunction.php";

class Menu extends BaseFunction {

    var $db;

    public function __construct() {
        $this->db = new DB("webcp.db");
    }

    public function viewData($req) {
        $menu = $this->db->table("tbl_menu")->get();
        $data = [
            "menu" => $menu,
        ];
        $this->viewPage("menu/view", $data);
    }

    public function viewInput($req) {
        $menu = $this->db->table("tbl_menu")->where("is_sub","0")->get(); 
        $detail = $this->db->table("tbl_menu")->where("rowid",$req->id)->first();
        

        $data = [
            "menu" => $menu,
            "detail" => $detail
        ];
        $this->viewPage("menu/input", $data);
    }

    public function save($req) {
        $data = [
            "menu_name" => $req->menuName,
            "menu_desc" => $req->menuDesc,
            "is_sub" => $req->isSub,
            "id_root" => $req->idRoot,
        ];

        if ($req->file->banner != null) {
            $file = $req->file->banner;
            $filename = $this->uploadImage($file);
            $data["menu_banner"] = $filename;
        }

        if ($req->id == 0) {
            $this->db->table("tbl_menu")->insert($data);
        } else {
            $dataById = $this->db->where("id", $req->id)->first();
            $this->removeImage($dataById->banner);

            $data["id"] = $dataById->id;
            $this->db->table("tbl_menu")->update($data);
        }

        $this->redirect("/menu");
    }

    public function delete($req) {
        $this->db->table("tbl_menu")->delete($req->id);
        $this->redirect("/menu");
    }

}
