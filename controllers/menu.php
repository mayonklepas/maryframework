<?php
class Menu{
   
    var $db;
    var $baseDir;
    public function __construct() {
        require_once $_SERVER['DOCUMENT_ROOT']."/helpers/DB.php";
        
        $this->db = new DB("webcpdb"); 
        
        $this->baseDir = $_SERVER['DOCUMENT_ROOT'];
    }
    
    public function viewMenu(){
        $data = $this->db->table("menu")->get();
        
        
        require_once $this->baseDir."/views/menu.php";
    }
    
    
    
}