<?php
$ini_set = array(
    'max_size' => 2 * 1024 * 1024,  //文件大小限制设置  M单位
    'out_time' => 60,                //上传超时设置
    'list' =>  $ShearPhoto["config"]["temp"].DIRECTORY_SEPARATOR, //上传路径
    'whitelist' => array(
                   ".jpeg",
                   ".gif",
                   ".png",
                   ".jpg")//上传的文件后缀
 );
/*设置部份结束*/
ini_set('max_execution_time', $ini_set['out_time']);
function HandleError($erro = '系统错误') {
	 die('{"erro":"'.$erro.'"}');
}
if (!isset($_FILES['UpFile'])) {
    HandleError();
}
if (isset($_FILES['UpFile']['error']) && $_FILES['UpFile']['error'] != 0) {
    $uploadErrors = array(
        0 => '文件上传成功',
        1 => '上传的文件超过了 php.ini 文件中的 upload_max_filesize directive 里的设置',
        2 => '上传的文件超过了 HTML form 文件中的 MAX_FILE_SIZE directive 里的设置',
        3 => '上传的文件仅为部分文件',
        4 => '没有文件上传',
        6 => '缺少临时文件夹'
    );
    HandleError($uploadErrors[$_FILES['UpFile']['error']]);
}
if (!isset($_FILES['UpFile']['tmp_name']) || !@is_uploaded_file($_FILES['UpFile']['tmp_name'])) {
    HandleError('无法找到上传的文件，上传失败');
 }
if (!isset($_FILES['UpFile']['name'])) {
    HandleError('上传空名字文件名');
}
$POST_MAX_SIZE = ini_get('post_max_size');
$unit = strtoupper(substr($POST_MAX_SIZE, -1));
$multiplier = $unit == 'M' ? 1048576 : ($unit == 'K' ? 1024 : ($unit == 'G' ? 1073741824 : 1));
if ((int)$_SERVER['CONTENT_LENGTH'] > $multiplier * (int)$POST_MAX_SIZE && $POST_MAX_SIZE) {
    HandleError('超过POST_MAX_SIZE的设置值，请查看PHP.ini的设置');
}
$file_size = @filesize($_FILES['UpFile']['tmp_name']);
if (!$file_size || $file_size > $ini_set['max_size']) {
  HandleError('零字节文件 或 上传的文件已经超过所设置最大值');
}
$UpFile = array();
$int_type = getimagesize($_FILES['UpFile']['tmp_name']); 
$str_type = image_type_to_extension($int_type[2]);
if (!in_array(strtolower($str_type) , $ini_set['whitelist'])) {
    HandleError('不允许上传此类型文件');
}
$str_type==".jpeg" && ($str_type=".jpg");
$UpFile['filename']=uniqid("temp_")."_".mt_rand(100,999).$str_type;

$UpFile['file_url'] = $ini_set['list'] . $UpFile['filename'];

file_exists($ini_set['list']) or @mkdir($ini_set['list'], 511,true);
?>