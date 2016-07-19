<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<h1>其他产品信息</h1>

<?php  foreach ($productOther as $key => $value){ foreach ($value as $key1 => $value1){ $newsitem=$value1; print_r($newsitem); } } ?>

</body>
</html>