<?php

class BaseFunction {

    function redirect($page) {
        $mainUrl = "https://" . $_SERVER['HTTP_HOST'];
        if (empty($_SERVER['HTTPS'])) {
            $mainUrl = "http://" . $_SERVER['HTTP_HOST'];
        }
        header("location:" . $mainUrl . $page);
    }

    function viewPage($page, $data = []) {
        if (count($data) > 0) {
            foreach ($data as $key => $value) {
                ${$key} = $value;
            }
        }
        $baseDir = $_SERVER['DOCUMENT_ROOT'];
        $baseUrl="http://".$_SERVER['HTTP_HOST'];

        require_once $baseDir . "/views/" . $page . ".php";
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
        $fileFrom = $file["tmp_name"];
        $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
        $fileName = explode(".", $file["name"])[0];
        $newFileName = $fileName . "-" . date("ymdhisz") . "." . $ext;

        $fileTo = $path . "/" . $newFileName;
        move_uploaded_file($fileFrom, $fileTo);
        return $newFileName;
    }

    function resizeImage($src, $dest, $ext, $percent) {
        list($width, $height) = getimagesize($src);
        echo $width;
        $newwidth = $width * $percent;
        $newheight = $height * $percent;
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $imageSource = null;
        if ($ext == "bmp") {
            $imageSource = imagecreatefrombmp($src);
        } else if ($ext == "png") {
            $imageSource = imagecreatefrompng($src);
        } else if ($ext == "gif") {
            $imageSource = imagecreatefromgif($src);
        } else {
            $imageSource = imagecreatefromjpeg($src);
        }
        imagecopyresized($thumb, $imageSource, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        if ($ext == "bmp") {
            imagebmp($thumb, $dest);
        } else if ($ext == "png") {
            imagepng($thumb, $dest);
        } else if ($ext == "gif") {
            imagegif($thumb, $dest);
        } else {
            imagejpeg($thumb, $dest);
        }

        imagedestroy($thumb);
        imagedestroy($imageSource);
    }

    function uploadImage($file) {
        $path = $_SERVER['DOCUMENT_ROOT'] . "/resources/files/images";
        if (!file_exists($path)) {
            mkdir($path, 0775, true);
        }
        $fileFrom = $file["tmp_name"];
        $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
        $fileName = explode(".", $file["name"])[0];
        $newFileName = str_replace(" ", "-", $fileName) . "-" . date("ymdhisz") . "." . $ext;

        $fileTo = $path . "/" . $newFileName;
        move_uploaded_file($fileFrom, $fileTo);

        $pathThumb = $path . "/thumb";
        if (!file_exists($pathThumb)) {
            mkdir($pathThumb, 0777, true);
        }

        $this->resizeImage($fileTo, $pathThumb . "/" . $newFileName, $ext, 0.2);

        $this->resizeImage($fileTo, $fileTo, $ext, 0.4);

        return $newFileName;
    }

    function removeFile($path) {
        try {
            $filePath = $_SERVER['DOCUMENT_ROOT'] . "/resources/files" . $path;
            unlink($filePath);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function removeImage($filename) {
        try {
            $filethumb = $_SERVER['DOCUMENT_ROOT'] . "/resources/files/image/thumb/" . $filename;
            unlink($filethumb);
            $filePath = $_SERVER['DOCUMENT_ROOT'] . "/resources/files/images/" . $filename;
            unlink($filePath);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }


}
