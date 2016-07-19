<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<h1>燃气表信息</h1>

<?php  foreach ($productG as $key => $value){ foreach ($value as $key1 => $value1){ $newsitem=$value1; print_r($newsitem); } } ?>

</body>
</html>