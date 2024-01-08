<?php

require_once "helpers/DB.php";
require_once "helpers/BaseFunction.php";

class Post extends BaseFunction {

    var $db;

    public function __construct() {
        $this->db = new DB("webcp.db");
    }

    public function viewData($req) {
        $menu = $this->db->table("tbl_post")->get();
        $data = [
            "post" => $menu,
        ];
        $this->viewPage("post/view", $data);
    }

    public function viewInput($req) {
        
        $id = 0;
        if(isset($req->id)){
            $id=$req->id;
        }
        $detail = $this->db->table("tbl_post")->where("rowid",$id)->first();
        
        
        $data = [
            "detail" => $detail
        ];
        $this->viewPage("post/input", $data);
    }

    public function save($req) {
        $data = [
            "post_title" => $req->postTitle,
            "post_content" => $req->postContent,
        ];
        
        if ($req->file->banner->size>0) {
            $file = $req->file->banner;
            $filename = $this->uploadImage($file);
            $data["post_banner"] = $filename;
        }

        if ($req->id == 0) {
            $this->db->table("tbl_post")->insert($data);
        } else {
            $dataById = $this->db->where("rowid", $req->id)->first();
            $this->removeImage($dataById->banner);

            $data["id"] = $dataById->id;
            $this->db->table("tbl_post")->update($data);
        }

        $this->redirect("/post");
    }

    public function delete($req) {
        $this->db->table("tbl_post")->delete($req->id);
        $this->redirect("/post");
    }

}
