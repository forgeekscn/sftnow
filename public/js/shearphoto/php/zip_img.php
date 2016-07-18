<?php
class zip_img {
    protected $arg;
    protected $waterimg = false;
    protected $GDfun = false;
    protected $result = array();
    protected $quality = false;
    final function __construct($arg) {
        $this->arg = $arg;
         if ($arg["force_jpg"]) {
			 $this->quality = $arg["quality"];
            $this->GDfun = array(
                "imagejpeg",
                ".jpg"
            );
        } else {
            $this->GDfun = $arg["GdFun"];
			$this->quality =0;
        }
        if ($arg["water"]) {
            list($W, $H, $type) = @getimagesize($arg["water"]);
            if ($type == 3) {
                $this->waterimg = array(
                    imagecreatefrompng($arg["water"]) ,
                    $W,
                    $H
                );
            }
        }
    }
    protected function zip_img($dest, $width, $height, $save_url, $water) {
        $createsrc = imagecreatetruecolor($width, $height);  
        imagecopyresampled($createsrc, $dest, 0, 0, 0, 0, $width, $height, $this->arg["w"], $this->arg["h"]);
        $water and $createsrc = $this->add_water($createsrc, $width, $height);
        return $this->saveimg($createsrc, $save_url, $width, $height);
    }
    protected function add_water($src, $width, $height) {
        imagecopy($src, $this->waterimg[0], $width - $this->waterimg[1] - 10, $height - $this->waterimg[2] - 10, 0, 0, $this->waterimg[1], $this->waterimg[2]);
        return $src;
    }
    protected function saveimg($createsrc, $save_url, $width, $height) {
        $save_url.= $this->GDfun[1];
        $GDW = $this->quality ? @call_user_func($this->GDfun[0], $createsrc, $save_url, $this->quality) : @call_user_func($this->GDfun[0], $createsrc, $save_url);
        imagedestroy($createsrc);
        array_push($this->result, array(
            "ImgUrl" => str_replace(array(
                ShearURL,
                "\\"
            ) , array(
                "",
                "/"
            ) , $save_url) ,
            "ImgName" => basename($save_url) ,
            "ImgWidth" => $width,
            "ImgHeight" => $height
        ));
        return $GDW;
    }
    final function __destruct() {
        @imagedestroy($this->arg["dest"]);
        $this->waterimg[0] and @imagedestroy($this->waterimg[0]);
    }
    public function run($this_) {
        $dest = $this->arg["dest"];
        $zip_array = $this->arg["zip_array"];
        foreach ($zip_array as $k => $v) {
            list($width, $height, $save_url, $water) = $v;
            if (!$this->zip_img($dest, $width, $height, $save_url, $this->waterimg and $water)) {
			   $this_->erro = "后端获取不到文件写入权限。原因：" . $this->GDfun[0] . "()函数-无法写入文件";
			   return false;
            }
        }
        return $this->result;
    }
}
?>        
