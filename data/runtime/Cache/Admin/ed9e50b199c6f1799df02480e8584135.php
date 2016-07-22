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
			<li class="active"><a href="<?php echo U('slide/index');?>"><?php echo L('ADMIN_SLIDE_INDEX');?></a></li>
			<li><a href="<?php echo U('slide/add');?>"><?php echo L('ADMIN_SLIDE_ADD');?></a></li>
		</ul>
		<form class="well form-search" method="post" id="cid-form">
			<select class="select_2" name="cid" style="width: 100px;" id="selected-cid">
				<option value=''><?php echo L('ALL');?></option>
				<?php if(is_array($categorys)): foreach($categorys as $key=>$vo): $cid_select=$vo['cid']===$slide_cid?"selected":""; ?>
				<option value="<?php echo ($vo["cid"]); ?>"<?php echo ($cid_select); ?>><?php echo ($vo["cat_name"]); ?></option><?php endforeach; endif; ?>
			</select>
		</form>
		<form class="js-ajax-form" method="post">
			<div class="table-actions">
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('slide/listorders');?>"><?php echo L('SORT');?></button>
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('slide/toggle',array('display'=>1));?>" data-subcheck="true"><?php echo L('DISPLAY');?></button>
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('slide/toggle',array('hide'=>1));?>" data-subcheck="true"><?php echo L('HIDDEN');?></button>
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('slide/delete');?>" data-subcheck="true"><?php echo L('DELETE');?></button>
			</div>
			<?php $status=array("1"=>L('DISPLAY'),"0"=>L('HIDDEN')); ?>
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th width="15"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
						<th width="50"><?php echo L('SORT');?></th>
						<th width="50">ID</th>
						<th width="200"><?php echo L('TITLE');?></th>
						<th width="200"><?php echo L('DESCRIPTION');?></th>
						<th width="100"><?php echo L('LINK');?></th>
						<th width="50"><?php echo L('IMAGE');?></th>
						<th width="50"><?php echo L('STATUS');?></th>
						<th width="100"><?php echo L('ACTIONS');?></th>
					</tr>
				</thead>
				<?php if(is_array($slides)): foreach($slides as $key=>$vo): ?><tr>
					<td><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo ($vo["slide_id"]); ?>"></td>
					<td><input name='listorders[<?php echo ($vo["slide_id"]); ?>]' class="input input-order mr5" type='text' size='3' value='<?php echo ($vo["listorder"]); ?>'></td>
					<td><?php echo ($vo["slide_id"]); ?></td>
					<td><?php echo ($vo["slide_name"]); ?></td>
					<td><?php echo ($slide_des = mb_substr($vo['slide_des'], 0, 48,'utf-8')); ?></td>
					<td><?php echo ($vo["slide_url"]); ?></td>
					<td>
						<?php if(!empty($vo['slide_pic'])): ?><a href="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" target="_blank"><?php echo L('VIEW');?></a><?php endif; ?>
					</td>
					<td><?php echo ($status[$vo['slide_status']]); ?></td>
					<td>
						<a href="<?php echo U('slide/edit',array('id'=>$vo['slide_id']));?>"><?php echo L('EDIT');?></a>
						<a href="<?php echo U('slide/delete',array('id'=>$vo['slide_id']));?>" class="js-ajax-delete"><?php echo L('DELETE');?></a>
						<?php if(empty($vo['slide_status']) == 1): ?><a href="<?php echo U('slide/cancelban',array('id'=>$vo['slide_id']));?>" class="js-ajax-dialog-btn" data-msg="确定显示此幻灯片吗？"><?php echo L('DISPLAY');?></a>
						<?php else: ?> 
							<a href="<?php echo U('slide/ban',array('id'=>$vo['slide_id']));?>" class="js-ajax-dialog-btn" data-msg="确定隐藏此幻灯片吗？"><?php echo L('HIDE');?></a><?php endif; ?>
					</td>
				</tr><?php endforeach; endif; ?>
				<tfoot>
					<tr>
						<th width="15"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
						<th width="50"><?php echo L('SORT');?></th>
						<th width="50">ID</th>
						<th width="200"><?php echo L('TITLE');?></th>
						<th width="200"><?php echo L('DESCRIPTION');?></th>
						<th width="100"><?php echo L('LINK');?></th>
						<th width="50"><?php echo L('IMAGE');?></th>
						<th width="50"><?php echo L('STATUS');?></th>
						<th width="100"><?php echo L('ACTIONS');?></th>
					</tr>
				</tfoot>
			</table>
			<div class="table-actions">
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('slide/listorders');?>"><?php echo L('SORT');?></button>
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('slide/toggle',array('display'=>1));?>" data-subcheck="true"><?php echo L('DISPLAY');?></button>
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('slide/toggle',array('hide'=>1));?>" data-subcheck="true"><?php echo L('HIDDEN');?></button>
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('slide/delete');?>" data-subcheck="true"><?php echo L('DELETE');?></button>
			</div>
		</form>
	</div>
	<script src="/thinkcmfx/public/js/common.js"></script>
	<script>
		setCookie('refersh_time', 0);
		function refersh_window() {
			var refersh_time = getCookie('refersh_time');
			if (refersh_time == 1) {
				window.location.reload();
			}
		}
		setInterval(function() {
			refersh_window()
		}, 3000);
		$(function() {
			$("#selected-cid").change(function() {
				$("#cid-form").submit();
			});
		});
	</script>
</body>
</html>