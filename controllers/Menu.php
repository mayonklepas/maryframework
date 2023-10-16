<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/helpers/DB.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/helpers/BaseFunction.php";

class Menu extends BaseFunction {
    
    var $db;
    
    public function __construct() {
        $this->db=new DB("webcpdb");
    }

    public function view($req) {
        $menu = $this->db->table("menu")->get();
        $menu1 =  $this->db->table("menu")->first();
        
        $data=[
            "menu"=>$menu,
        ];
        $this->viewPage("menu",$data);
    }
    
    public function save($req) {
$data = [
            "title"=>$req->title,
            "synopsis"=>$req->synopsis,
            "content"=>$req->content,
            "is_root"=>$req->isRoot,
            "is_sub"=>$req->isSub,
            "id_root"=>$req->idRoot
        ];
        
        if($req->file->banner!=null){
            $file = $req->file->banner;
            $filename = $this->uploadImage($file);
            $data["banner"] = $filename;
        }
        
        if($req->id==0){
            $this->db->table("menu")->insert($data);
        }else{
            $dataById = $this->db->where("id", $req->id)->first();
            $this->removeImage($dataById->banner);
            
            $data["id"]=$dataById->id;
            $this->db->table("menu")->update($data);
        }
      
        $this->redirect("/menu");
        
    }
    
    public function delete($req) {
        $this->db->table("menu")->delete($req->id);
        $this->redirect("/menu");
    }

}
