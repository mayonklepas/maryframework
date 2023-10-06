<?php

class BaseFunction {

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

    function setflashMessage($message) {
        session_start();
        $_SESSION["flash"] = $message;
        session_stop();
    }

    function getflashMessage() {
        session_start();
        $message = $_SESSION["flash"];
        unset($_SESSION["flash"]);
        session_stop();
        return $message;
    }

    function uploadFile($file, $tipe) {
        $path = $_SERVER['DOCUMENT_ROOT'] . "/resources/files/" . $tipe;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $fileFrom = $file["temp_name"];
        $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
        $newFileName = file["name"] . "-" . date("yyMMddHmsz") . "." . $ext;

        $fileTo = $path . "/" . $newFileName;
        move_uploaded_file($fileFrom, $fileTo);
        return $newFileName;
    }
    
    
    function thumbImage($imgSource) {
        $percent = 0.5;
        list($width, $height) = getimagesize($imgSource);
        $newwidth = $width * $percent;
        $newheight = $height * $percent;
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresized($thumb, $imageSource, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        return imagejpeg($thumb);
    }

    function uploadImage($file) {
        $path = $_SERVER['DOCUMENT_ROOT'] . "/resources/files/image";
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $fileFrom = $file["temp_name"];
        $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
        $newFileName = file["name"] . "-" . date("yyMMddHmsz") . "." . $ext;

        $fileTo = $path . "/" . $newFileName;
        move_uploaded_file($fileFrom, $fileTo);
        
        $pathThumb = $path."/thumb";
        if (!file_exists($pathThumb)) {
            mkdir($pathThumb, 0777, true);
        }
        file_put_contents($pathThumb, $this->thumbImage($imgSource));
        
        return $newFileName;
    }


}
