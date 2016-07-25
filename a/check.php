<?php
//设备类型
$user_agent = $_SERVER['HTTP_USER_AGENT'];
if(stristr($user_agent,'iPad')) {
$fb_fs= 'iPad';
}else if(stristr($user_agent,'Android')) {
$fb_fs= 'Android';
}else if(stristr($user_agent,'Linux')){
$fb_fs= 'Linux';
}else if(stristr($user_agent,'iPhone')){
$fb_fs= 'iPhone';
}else{
$fb_fs= 'PC';
}
echo $fb_fs;
?>