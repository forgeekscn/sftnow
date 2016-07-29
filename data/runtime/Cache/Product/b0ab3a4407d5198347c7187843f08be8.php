<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>	 
</head>
<body>
 
<?php  $data['CategoryId']=$categoryId; $productModel=D("Product/PluginProductItem"); $list=$productModel->where($data)->order('Id')->select(); ?>
	<h1>产品展示</h1>
	 
	
<!-- 	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p> <?php echo ($vo["title"]); ?> | <?php echo ($vo["imageurl"]); ?> </p><?php endforeach; endif; else: echo "" ;endif; ?> -->

 

</body>
</html>