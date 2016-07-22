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
			<li><a href="<?php echo U('setting/site');?>">网站信息</a></li>
			<li class="active"><a href="<?php echo U('route/index');?>">URL美化</a></li>
			<li><a href="<?php echo U('route/add');?>">添加URL规则</a></li>
		</ul>
		<form class="js-ajax-form" action="<?php echo U('route/listorders');?>" method="post">
			<div class="table-actions">
				<button type="submit" class="btn btn-primary btn-small js-ajax-submit">排序</button>
			</div>
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th width="50">排序</th>
						<th width="50">ID</th>
						<th>原始网址</th>
						<th>显示网址</th>
						<th>状态</th>
						<th width="120">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php $statuses=array('0'=>"已禁用","1"=>"已启用"); ?>
					<?php if(is_array($routes)): foreach($routes as $key=>$vo): ?><tr>
						<td><input name='listorders[<?php echo ($vo["id"]); ?>]'
							class="input input-order mr5" type='text' size='3'
							value='<?php echo ($vo["listorder"]); ?>'></td>
						<td><?php echo ($vo["id"]); ?></td>
						<td><?php echo ($vo["full_url"]); ?></td>
						<td><?php echo ($vo["url"]); ?></td>
						<td><?php echo ($statuses[$vo['status']]); ?></td>
						<td>
							<a href="<?php echo U('route/edit',array('id'=>$vo['id']));?>">修改</a>|
							<a href="<?php echo U('route/open',array('id'=>$vo['id']));?>" class="js-ajax-dialog-btn" data-msg="确定启用吗？">启用</a>|
							<a href="<?php echo U('route/ban',array('id'=>$vo['id']));?>" class="js-ajax-dialog-btn" data-msg="确定禁用吗？">禁用</a>|
							<a href="<?php echo U('route/delete',array('id'=>$vo['id']));?>" class="js-ajax-delete">删除</a>
						</td>
					</tr><?php endforeach; endif; ?>
				</tbody>
				<tfoot>
					<tr>
						<th width="50">排序</th>
						<th width="50">ID</th>
						<th>原始网址</th>
						<th>显示网址</th>
						<th>状态</th>
						<th width="120">操作</th>
					</tr>
				</tfoot>
			</table>
			<div class="table-actions">
				<button type="submit" class="btn btn-primary btn-small js-ajax-submit">排序</button>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="/thinkcmfx/public/js/common.js"></script>
</body>
</html>