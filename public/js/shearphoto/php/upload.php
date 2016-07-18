<?php
header('Content-type:text/html;charset=utf-8');
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
require("shearphoto.config.php");
require("shearphoto.up.php");
if (!move_uploaded_file($_FILES['UpFile']['tmp_name'], $UpFile['file_url'])) {
    HandleError('后端获取不到文件写入权限。原因：move_uploaded_file()函数-无法写入文件');
}
$UpFile['file_url']=str_replace(array(ShearURL,"\\"),array("","/"),$UpFile['file_url']);
/*
来到这里时，已经代表上传成功，你可以在这里尽情写的你逻辑
$UpFile['file_url']就是那张临时待截图片的路径！
*/
echo('{"success":"'.$UpFile['file_url'].'"}');
?>