<?php

require_once "helpers/DB.php";
require_once "helpers/BaseFunction.php";

class Post extends BaseFunction {

    var $db;

    public function __construct() {
        $this->db = new DB("webcp.db");
    }

    public function viewData($req) {
        $menu = $this->db->table("tbl_media")->get();
        $data = [
            "media" => $menu,
        ];
        $this->viewPage("media/view", $data);
    }

    public function viewInput($req) {
        
        $id = 0;
        if(isset($req->id)){
            $id=$req->id;
        }
        $detail = $this->db->table("tbl_media")->where("rowid",$id)->first();
        
        
        $data = [
            "detail" => $detail
        ];
        $this->viewPage("media/input", $data);
    }

    public function save($req) {
       
        if ($req->file->banner->size>0) {
            $file = $req->file->banner;
            $filename = $this->uploadImage($file);
            $data["media_filename"] = $filename;
        }else{
            $this->redirect("/post");
        }
        
         $data = [
            "media_title" => $req->postTitle,
            "media_desc" => $req->postContent,
        ];

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
