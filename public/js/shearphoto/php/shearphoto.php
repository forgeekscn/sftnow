<?php
header('Content-type:text/html;charset=utf-8');   //编码
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING); //关闭错误提示
require("shearphoto.config.php");              //加载设置文件
class ShearPhoto
{
    public $erro = false;

    protected function rotate($src, $R)
    {
        $arr = array(90, 180, 270);
        if (in_array($R, $arr)) {
            $rotatesrc = imagerotate($src, $R, 0);
            imagedestroy($src);
        } else {
            return $src;
        }
        return $rotatesrc;
    }

    public function html5_run(&$PHPconfig, &$JSconfig)
    {
        $ShearPhoto["config"] = $PHPconfig;
        if (is_bool($PHPconfig["proportional"])) {
            $PHPconfig["proportional"] = $JSconfig["P"];
        } elseif ($PHPconfig["proportional"] != $JSconfig["P"]) {
            $this->erro = "JS设置的比例和PHP设置不一致！";
            return false;
        }
        require("shearphoto.up.php");
        $tempurl = $PHPconfig["temp"] . DIRECTORY_SEPARATOR . "shearphoto.lock";
        !file_exists($tempurl) && file_put_contents($tempurl, "ShearPhoto Please don't delete");
        $this->delTempImg($PHPconfig["temp"], $PHPconfig["tempSaveTime"]);
        $imagecreatefrom = $this->imagecreatefrom($_FILES['UpFile']['tmp_name'], $int_type[2]);
        if (!$imagecreatefrom) return false;
        list($src, $GdFun) = $imagecreatefrom;
        return $this->compression($src, $PHPconfig, $JSconfig, $int_type[2], $GdFun);
    }

    protected function delTempImg($temp, $deltime)
    {
        if ($deltime == 0) return;
        $dir = opendir($temp);
        $time = time();
        while (($file = readdir($dir)) !== false) {
            if ($file != "." and $file != ".." and $file != "shearphoto.lock") {
                $fileUrl = $temp . DIRECTORY_SEPARATOR . $file;
                $pastTime = $time - filemtime($fileUrl);
                if ($pastTime < 0 || $pastTime > $deltime) @unlink($fileUrl);
            }
        }
        closedir($dir);
    }

    public function run(&$JSconfig, &$PHPconfig)
    {
        $tempurl = $PHPconfig["temp"] . DIRECTORY_SEPARATOR . "shearphoto.lock";
        !file_exists($tempurl) && file_put_contents($tempurl, "ShearPhoto Please don't delete");
        $this->delTempImg($PHPconfig["temp"], $PHPconfig["tempSaveTime"]);
        if (!isset($JSconfig["url"]) || !isset($JSconfig["R"]) || !isset($JSconfig["X"]) || !isset($JSconfig["Y"]) || !isset($JSconfig["IW"]) || !isset($JSconfig["IH"]) || !isset($JSconfig["P"]) || !isset($JSconfig["FW"]) || !isset($JSconfig["FH"])) {
            $this->erro = "服务端接收到的数据缺少参数";
            return false;
        }
        if (!file_exists($JSconfig["url"])) {
            $this->erro = "此图片路径有误";
            return false;
        }
        foreach ($JSconfig as $k => $v) {
            if ($k !== "url") { //验证是否为数字除了url参数之外
                if (!is_numeric($v)) {
                    $this->erro = "传递的参数有误";
                    return false;
                }
            }
        }
        if (is_bool($PHPconfig["proportional"])) {
            $PHPconfig["proportional"] = $JSconfig["P"];
        } elseif ($PHPconfig["proportional"] != $JSconfig["P"]) {
            $this->erro = "JS设置的比例和PHP设置不一致！";
            return false;
        }
        list($w, $h, $type) = getimagesize($JSconfig["url"]);
        $strtype = image_type_to_extension($type);
        $type_array = array(
            ".jpeg",
            ".gif",
            ".png",
            ".jpg"
        );
        if (!in_array(strtolower($strtype), $type_array)) {
            $this->erro = "无法读取图片";
            return false;
        }

        if ($JSconfig["R"] == 90 || $JSconfig["R"] == 270) {
            list($w, $h) = array(
                $h,
                $w
            );
        }
        return $this->createshear($PHPconfig, $w, $h, $type, $JSconfig);
    }

    protected function imagecreatefrom($url, $type)
    {
        switch ($type) {
            case 1:
                $src = @imagecreatefromgif($url);
                $GdFun = array(
                    "imagegif",
                    ".gif"
                );
                break;

            case 2:
                $src = @imagecreatefromjpeg($url);
                $GdFun = array(
                    "imagejpeg",
                    ".jpg"
                );
                break;

            case 3:
                $src = @imagecreatefrompng($url);
                $GdFun = array(
                    "imagepng",
                    ".png"
                );
                break;

            default:
                $this->erro = "不支持的类型";
                return false;
                break;
        }
        return array($src, $GdFun);
    }

    protected function createshear(&$PHPconfig, $w, $h, $type, &$JSconfig)
    {
        $imagecreatefrom = $this->imagecreatefrom($JSconfig["url"], $type);
        if (!$imagecreatefrom) return false;
        list($src, $GdFun) = $imagecreatefrom;
        $src = $this->rotate($src, $JSconfig["R"]);
        $dest = imagecreatetruecolor($JSconfig["IW"], $JSconfig["IH"]);
        $white = imagecolorallocate($dest, 255, 255, 255);
        imagefill($dest, 0, 0, $white);
        imagecopy($dest, $src, 0, 0, $JSconfig["X"], $JSconfig["Y"], $w, $h);
        imagedestroy($src);
        return $this->compression($dest, $PHPconfig, $JSconfig, $type, $GdFun);
    }

    protected function CreateArray(&$PHPconfig, &$JSconfig)
    {
        $arr = array();
        if ($PHPconfig["proportional"] > 0) {
            $proportion = $PHPconfig["proportional"];
        } else {
            $proportion = $JSconfig["IW"] / $JSconfig["IH"];
        }
        $water_or = isset($PHPconfig["water"]) && $PHPconfig["water"] && file_exists($PHPconfig["water"]) && is_numeric($PHPconfig["water_scope"]);
        if (!file_exists($PHPconfig["saveURL"])) {
            if (!mkdir($PHPconfig["saveURL"], 0777, true)) {
                $this->erro = "目录权限有问题";
                return false;
            }
        }
        $file_url = $PHPconfig["saveURL"] . $PHPconfig["filename"];
        foreach ($PHPconfig["width"] as $k => $v) {
            ($v[0] == 0) ? ($v[0] = $JSconfig["FW"]) : ($v[0] == -1) and ($v[0] = $JSconfig["IW"]);
            $height = $v[0] / $proportion;
            $suffix = isset($v[2]) ? $v[2] : "0";
            $arr[$k] = array(
                $v[0],
                $height,
                $file_url . $suffix,
                ($v[1] === true and $water_or === true and $v[0] > $PHPconfig["water_scope"] and $height > $PHPconfig["water_scope"])
            );
        }
        return array(
            $water_or,
            $arr
        );
    }

    protected function compression($DigShear, &$PHPconfig, &$JSconfig, $type, $GdFun)
    {
        require 'zip_img.php';
        $arrimg = $this->CreateArray($PHPconfig, $JSconfig);
        if (count($arrimg[1]) < 1) {
            $this->erro = "系统没有检测到处理截图的命令！";
            return false;
        }
        $arrimg[0] and $arrimg[0] = $PHPconfig["water"];
        $zip_photo = new zip_img(array(
            "dest" => $DigShear,
            "GdFun" => $GdFun,
            "quality" => isset($PHPconfig["quality"]) ? $PHPconfig["quality"] : false,
            "force_jpg" => isset($PHPconfig["force_jpg"]) && $PHPconfig["force_jpg"],
            "water" => $arrimg[0],
            "water_scope" => $PHPconfig["water_scope"],
            "w" => $JSconfig["IW"],
            "h" => $JSconfig["IH"],
            "type" => $type,
            "zip_array" => $arrimg[1]
        ));
        return $zip_photo->run($this);
    }
}

/*........................普通截取时开始..........................*/

if (isset($_POST["JSdate"])) {//普通截取时
    $ShearPhoto["JSdate"] = json_decode(trim(stripslashes($_POST["JSdate"])), true);
    $Shear = new ShearPhoto; //类实例开始
    $result = $Shear->run($ShearPhoto["JSdate"], $ShearPhoto["config"]); //传入参数运行
    if ($result === false) { //切图失败时
        echo '{"erro":"' . $Shear->erro . '"}'; //把错误发给JS /请匆随意更改"erro"的编写方式，否则JS出错
        exit;
    } else {
        $dirname = pathinfo($ShearPhoto["JSdate"]["url"]);
        $ShearPhotodirname = $dirname["dirname"] . DIRECTORY_SEPARATOR . "shearphoto.lock"; //认证删除的密钥
        file_exists($ShearPhotodirname) && @unlink($ShearPhoto["JSdate"]["url"]); //密钥存在，当然就删掉原图
    }

}

/*........................普通截取时结束..........................*/


/*........................HTML5截取时..........................*/

elseif (isset($_POST["ShearPhotoIW"]) &&
    isset($_POST["ShearPhotoIH"]) &&
    isset($_POST["ShearPhotoFW"]) &&
    isset($_POST["ShearPhotoFH"]) &&
    isset($_POST["ShearPhotoP"]) &&
    is_numeric($JSconfig["P"] = trim($_POST["ShearPhotoP"])) &&
    is_numeric($JSconfig["IW"] = trim($_POST["ShearPhotoIW"])) &&
    is_numeric($JSconfig["IH"] = trim($_POST["ShearPhotoIH"])) &&
    is_numeric($JSconfig["FW"] = trim($_POST["ShearPhotoFW"])) &&
    is_numeric($JSconfig["FH"] = trim($_POST["ShearPhotoFH"]))
) {
    $Shear = new ShearPhoto; //类实例开始
    $result = $Shear->html5_run($ShearPhoto["config"], $JSconfig);//加载HTML5已切好的图片独有方法
    if ($result === false) { //切图失败时
        echo '{"erro":"' . $Shear->erro . '"}'; //把错误发给JS /请匆随意更改"erro"的编写方式，否则JS出错
        exit;
    }
}
/*........................HTML5截取时结束..........................*/

/*........错误的操作................*/
else {
    die('{"erro":"错误的操作！或缺少参数或错误参数"}');
}
/*........错误的操作................*/
/*.............结果输出给JS..............................................................*/
/*
到此程序已运行完毕，并成功！你可以在这里愉快地写下你的逻辑代码
$result[X]["ImgUrl"] //图片URL路径  X是数字
$result[X]["ImgName"] //纯图片名字  X是数字
$result[X]["ImgWidth"]//图片宽度    X是数字
$result[X]["ImgHeight"] //图片高度    X是数字
很多人问怎么把截好图片写到数据库， $result[X]["ImgUrl"]是完整的URL地址（包含文件名），不适宜写到数据库，因为图片路径一旦变动你会很麻烦
一般写到数据库都是纯图片名字写进为好，那么正确的做法是把 $result[X]["ImgName"]  写进去数据库
*/
$str_result = json_encode($result);
echo str_replace("\/", "/", $str_result); //去掉无用的字符修正URL地址，再把数据传弟给JS
?>
