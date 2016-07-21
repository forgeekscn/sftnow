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
			<li class="active"><a href="<?php echo U('plugin/index');?>"><?php echo L('ADMIN_PLUGIN_INDEX');?></a></li>
			<li><a href="http://www.thinkcmf.com/appstore/plugin.html" target="_blank">插件市场</a></li>
			<li><a href="http://www.thinkcmf.com/topic/index/index/cat/9.html" target="_blank"><?php echo L('PLUGIN_DISCUSSION');?></a></li>
			<li><a href="http://www.thinkcmf.com/document/article/id/373.html" target="_blank"><?php echo L('PLUGIN_DOCUMENT');?></a></li>
		</ul>
		<form method="post" class="js-ajax-form">
			<?php $status=array("1"=>L('ENABLED'),"0"=>L('DISABLED'),"3"=>L('UNINSTALLED')); ?>
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th><?php echo L('NAME');?></th>
						<th><?php echo L('TEXT_DOMAIN');?></th>
						<th><?php echo L('HOOKS');?></th>
						<th><?php echo L('DESCRIPTION');?></th>
						<th><?php echo L('AUTHOR');?></th>
						<th width="45"><?php echo L('STATUS');?></th>
						<th width="150"><?php echo L('ACTIONS');?></th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($plugins)): foreach($plugins as $key=>$vo): ?><tr>
						<td><?php echo ($vo["title"]); ?></td>
						<td><?php echo ($vo["name"]); ?></td>
						<td><?php echo ($vo["hooks"]); ?></td>
						<td><?php echo ($vo["description"]); ?></td>
						<td><?php echo ($vo["author"]); ?></td>
						<td><?php echo ($status[$vo['status']]); ?></td>
						<td>
							<?php if($vo['status']==3): ?><a href="<?php echo U('plugin/install',array('name'=>$vo['name']));?>" class="js-ajax-dialog-btn" data-msg="确定安装该插件吗？">安装</a>
							<?php else: ?>
								<?php $config=json_decode($vo['config'],true); ?>
								<?php if(!empty($config)): ?><a href="<?php echo U('plugin/setting',array('id'=>$vo['id']));?>"><?php echo L('SETTING');?></a>|
								<?php else: ?>
									<a href="javascript:;" style="color: #ccc;"><?php echo L('SETTING');?></a>|<?php endif; ?>
								
								<?php if(!empty($vo['has_admin'])): ?><a href="javascript:parent.openapp('<?php echo sp_plugin_url($vo['name'].'://AdminIndex/index');?>','plugin_<?php echo ($vo["name"]); ?>','<?php echo ($vo["title"]); ?>')">管理</a>|
								<?php else: ?>
									<a href="javascript:;" style="color: #ccc;">管理</a>|<?php endif; ?>
								
								<a href="<?php echo U('plugin/update',array('name'=>$vo['name']));?>" class="js-ajax-dialog-btn" data-msg="确定更新该插件吗？">更新</a>| 
								
								<?php if($vo['status']==0): ?><a href="<?php echo U('plugin/toggle',array('id'=>$vo['id'],'enable'=>1));?>" class="js-ajax-dialog-btn" data-msg="确定启用该插件吗？">启用</a>| 
								<?php else: ?>
									<a href="<?php echo U('plugin/toggle',array('id'=>$vo['id'],'disable'=>1));?>" class="js-ajax-dialog-btn" data-msg="确定禁用该插件吗？">禁用</a>|<?php endif; ?>
								
								<a href="<?php echo U('plugin/uninstall',array('id'=>$vo['id']));?>" class="js-ajax-dialog-btn" data-msg="确定卸载该插件吗？">卸载</a><?php endif; ?>
						</td>
					</tr><?php endforeach; endif; ?>
				</tbody>
			</table>
		</form>
	</div>
	<script src="/thinkcmfx/public/js/common.js"></script>
</body>
</html>