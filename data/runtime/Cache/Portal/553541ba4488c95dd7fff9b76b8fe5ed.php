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

	<link href="/sftnow/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/sftnow/public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/sftnow/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/sftnow/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/sftnow/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/sftnow/",
    JS_ROOT: "public/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/sftnow/public/js/jquery.js"></script>
    <script src="/sftnow/public/js/wind.js"></script>
    <script src="/sftnow/public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
</head>
<body>
	<div class="wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a href="<?php echo U('AdminTerm/index');?>"><?php echo L('PORTAL_ADMINTERM_INDEX');?></a></li>
			<li><a href="<?php echo U('AdminTerm/add');?>"><?php echo L('PORTAL_ADMINTERM_ADD');?></a></li>
		</ul>
		<form method="post" class="js-ajax-form" action="<?php echo U('AdminTerm/listorders');?>">
			<div class="table-actions">
				<button type="submit" class="btn btn-primary btn-small js-ajax-submit"><?php echo L('SORT');?></button>
			</div>
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th width="50"><?php echo L('SORT');?></th>
						<th width="50">ID</th>
						<th><?php echo L('NAME');?></th>
						<th><?php echo L('CATEGORY_TYPE');?></th>
						<th><?php echo L('ACTIONS');?></th>
					</tr>
				</thead>
				<tbody>
					<?php echo ($taxonomys); ?>
				</tbody>
				<tfoot>
					<tr>
						<th width="50"><?php echo L('SORT');?></th>
						<th width="50">ID</th>
						<th><?php echo L('NAME');?></th>
						<th><?php echo L('CATEGORY_TYPE');?></th>
						<th><?php echo L('ACTIONS');?></th>
					</tr>
				</tfoot>
			</table>
			<div class="table-actions">
				<button type="submit" class="btn btn-primary btn-small js-ajax-submit"><?php echo L('SORT');?></button>
			</div>
		</form>
	</div>
	<script src="/sftnow/public/js/common.js"></script>
</body>
</html>