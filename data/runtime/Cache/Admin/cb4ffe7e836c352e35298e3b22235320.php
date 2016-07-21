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
			<li class="active"><a href="<?php echo U('ad/index');?>"><?php echo L('ADMIN_AD_INDEX');?></a></li>
			<li><a href="<?php echo U('ad/add');?>"><?php echo L('ADMIN_AD_ADD');?></a></li>
		</ul>
		<form method="post" class="js-ajax-form">
			<div class="table-actions">
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('ad/toggle',array('display'=>1));?>" data-subcheck="true"><?php echo L('DISPLAY');?></button>
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('ad/toggle',array('hide'=>1));?>" data-subcheck="true"><?php echo L('HIDE');?></button>
			</div>
			<?php $status=array("1"=>L('DISPLAY'),"0"=>L('HIDDEN')); ?>
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th width="16"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
						<th width="50">ID</th>
						<th><?php echo L('NAME');?></th>
						<th><?php echo L('HOW_TO_USE');?></th>
						<th width="45"><?php echo L('STATUS');?></th>
						<th width="120"><?php echo L('ACTIONS');?></th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($ads)): foreach($ads as $key=>$vo): ?><tr>
						<td><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo ($vo["ad_id"]); ?>"></td>
						<td><?php echo ($vo["ad_id"]); ?></td>
						<td><?php echo ($vo["ad_name"]); ?></td>
						<?php $usercode="{".":sp_getad('".$vo['ad_name']."')}"; ?>
						<td><?php echo ($usercode); ?></td>
						<td><?php echo ($status[$vo['status']]); ?></td>
						<td>
							<a href="<?php echo U('ad/edit',array('id'=>$vo['ad_id']));?>"><?php echo L('EDIT');?></a> |
							<a href="<?php echo U('ad/delete',array('id'=>$vo['ad_id']));?>" class="js-ajax-delete"><?php echo L('DELETE');?></a>
						</td>
					</tr><?php endforeach; endif; ?>
				</tbody>
				<tfoot>
					<tr>
						<th width="16"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
						<th width="50">ID</th>
						<th><?php echo L('NAME');?></th>
						<th><?php echo L('HOW_TO_USE');?></th>
						<th width="45"><?php echo L('STATUS');?></th>
						<th width="120"><?php echo L('ACTIONS');?></th>
					</tr>
				</tfoot>
			</table>
			<div class="table-actions">
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('ad/toggle',array('display'=>1));?>" data-subcheck="true"><?php echo L('DISPLAY');?></button>
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('ad/toggle',array('hide'=>1));?>" data-subcheck="true"><?php echo L('HIDE');?></button>
			</div>
		</form>
	</div>
	<script src="/thinkcmfx/public/js/common.js"></script>
</body>
</html>