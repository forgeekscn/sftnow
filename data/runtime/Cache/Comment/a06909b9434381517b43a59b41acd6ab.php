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
<body style="min-width: 800px;">
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a href="<?php echo U('commentadmin/index');?>"><?php echo L('COMMENT_COMMENTADMIN_INDEX');?></a></li>
		</ul>
		<form class="js-ajax-form" method="post">
			<div class="table-actions">
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('Commentadmin/check',array('check'=>1));?>" data-subcheck="true"><?php echo L('AUDIT');?></button>
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('Commentadmin/check',array('uncheck'=>1));?>" data-subcheck="true"><?php echo L('CANCEL_AUDIT');?></button>
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('Commentadmin/delete');?>" data-subcheck="true" data-msg="<?php echo L('DELETE_CONFIRM_MESSAGE');?>"><?php echo L('DELETE');?></button>
			</div>
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th width="15"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
						<th width="50">ID</th>
						<th width="100"><?php echo L('NAME');?></th>
						<th width="150"><?php echo L('EMAIL');?></th>
						<th><?php echo L('CONTENT');?></th>
						<th width="120"><?php echo L('TIME');?></th>
						<th width="50"><?php echo L('STATUS');?></th>
						<th width="80"><?php echo L('ACTIONS');?></th>
					</tr>
				</thead>
				<?php $status=array("1"=>L('AUDITED'),"0"=>L('NOT_AUDITED')); ?>
				<?php if(is_array($comments)): foreach($comments as $key=>$vo): ?><tr>
					<td><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo ($vo["id"]); ?>"></td>
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["full_name"]); ?></td>
					<td><?php echo ($vo["email"]); ?></td>
					<td><?php echo ($vo["content"]); ?></td>
					<td><?php echo ($vo["createtime"]); ?></td>
					<td><?php echo ($status[$vo['status']]); ?></td>
					<td>
						<a target="_blank" href="/thinkcmfx/<?php echo ($vo["url"]); ?>">查看原文</a> 
						<a href="<?php echo U('Commentadmin/delete',array('id'=>$vo['id']));?>" class="js-ajax-delete"><?php echo L('DELETE');?></a>
					</td>
				</tr><?php endforeach; endif; ?>
				<tfoot>
					<tr>
						<th width="15"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
						<th width="50">ID</th>
						<th width="100"><?php echo L('NAME');?></th>
						<th width="150"><?php echo L('EMAIL');?></th>
						<th><?php echo L('CONTENT');?></th>
						<th width="120"><?php echo L('TIME');?></th>
						<th width="50"><?php echo L('STATUS');?></th>
						<th width="80"><?php echo L('ACTIONS');?></th>
					</tr>
				</tfoot>
			</table>
			<div class="table-actions">
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('Commentadmin/check',array('check'=>1));?>" data-subcheck="true"><?php echo L('AUDIT');?></button>
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('Commentadmin/check',array('uncheck'=>1));?>" data-subcheck="true"><?php echo L('CANCEL_AUDIT');?></button>
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('Commentadmin/delete');?>" data-subcheck="true" data-msg="<?php echo L('DELETE_CONFIRM_MESSAGE');?>"><?php echo L('DELETE');?></button>
			</div>
			<div class="pagination"><?php echo ($Page); ?></div>
		</form>
	</div>
	<script src="/thinkcmfx/public/js/common.js"></script>
</body>
</html>