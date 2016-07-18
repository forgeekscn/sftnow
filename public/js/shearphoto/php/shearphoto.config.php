<?php
define('IOURL', dirname(dirname(__FILE__)));   //锁定相对目录
define('ROOT', dirname(dirname(dirname(IOURL))) . DIRECTORY_SEPARATOR);//网站根目录,//DIRECTORY_SEPARATOR 是斜杠符，为兼容WINDOW和LINUX,设置头像保存路径
define('ShearURL', ROOT . 'data/upload/avatar');
$ShearPhoto["config"] = array(
    "proportional" => 1 / 1,//比例截图
    "quality" => 85,// 截图质量，0为一般质量（质量大概75左右），  0-100可选
    "force_jpg" => true,// 是否强制截好的图片是JPG格式  可选 true false
    "width" => array(//自定义设置生成截图的张数，大小，在这设，看好下面！
        //array(0,true,"name0"),//此时的0   代表以用户取当时截取框的所截的大小为宽
        //array(-1,true,"name1"),//此时的-1   代表以原图为基准，获得截图
        array(128, true, ""),//@参数1要生成的宽 （高度不用设，系统会按比例做事），    @参数2：是否为该图加水印，water参数要有水印地址才有效true或false  @参数3：图片后面添加字符串
    ),
    "water" => false,//只接受PNG水印，当然你对PHP熟练，你可以对主程序进行修改支持其他类型水印,不设就"water"=>false
    "water_scope" => 100,       //图片少于多少不添加水印！没填水印地址，这里不起任何作用
    "temp" => ShearURL . DIRECTORY_SEPARATOR . "temp",  //等待截图的大图文件。就是上传图片的临时目录
    "tempSaveTime" => 600,//临时图片（也就是temp内的图片）保存时间，需要永久保存请设为0。单位秒
    "saveURL" => ShearURL . DIRECTORY_SEPARATOR,//截好后的图片。储存的目录位置，后面不要加斜杠
    "filename" => uniqid("")//截好后的图片的文件名字定义！要生成多个文件时 系统会自动在后面补上
);
?>