<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/thinkcmfx/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/thinkcmfx/public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/thinkcmfx/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/thinkcmfx/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/thinkcmfx/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/thinkcmfx/",
    JS_ROOT: "public/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/thinkcmfx/public/js/jquery.js"></script>
    <script src="/thinkcmfx/public/js/wind.js"></script>
    <script src="/thinkcmfx/public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
</head>
<body>
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a href="<?php echo U('navcat/index');?>"><?php echo L('ADMIN_NAVCAT_INDEX');?></a></li>
			<li><a href="<?php echo U('navcat/add');?>"><?php echo L('ADMIN_NAVCAT_ADD');?></a></li>
		</ul>
		<form class="form-horizontal js-ajax-form" method="post">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th width="100">ID</th>
						<th><?php echo L('NAME');?></th>
						<th><?php echo L('DESCRIPTION');?></th>
						<th width="120"><?php echo L('MAIN_NAVCAT');?></th>
						<th width="120"><?php echo L('ACTIONS');?></th>
					</tr>
				</thead>
				<?php if(is_array($navcats)): foreach($navcats as $key=>$vo): ?><tr>
					<td><?php echo ($vo["navcid"]); ?></td>
					<td><?php echo ($vo["name"]); ?></td>
					<td><?php echo ($vo["remark"]); ?></td>
					<td><?php $mainmenu=$vo['active']?L('YES'):L('NO'); ?> <?php echo ($mainmenu); ?></td>
					<td>
						<a href="<?php echo U('navcat/edit',array('id'=>$vo['navcid']));?>"><?php echo L('EDIT');?></a>|
						<a href="<?php echo U('navcat/delete',array('id'=>$vo['navcid']));?>" class="js-ajax-delete"><?php echo L('DELETE');?></a>
					</td>
				</tr><?php endforeach; endif; ?>
			</table>
		</form>
	</div>
	<script src="/thinkcmfx/public/js/common.js"></script>
</body>
</html>