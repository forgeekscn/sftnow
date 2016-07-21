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
	<div class="wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#A" data-toggle="tab"><?php echo L('QQ_CONNECT');?></a></li>
			<li><a href="#B" data-toggle="tab"><?php echo L('WEIBO_CONNECT');?></a></li>
		</ul>
		<form method="post" class="js-ajax-form" action="<?php echo U('oauthadmin/setting_post');?>">
			<div class="tabbable">
				<div class="tab-content">
					<div class="tab-pane active" id="A">
						<table width="100%" cellpadding="2" cellspacing="2">
							<tbody>
								<tr>
									<td width="140">APPkey</td>
									<td><input type="text" name="qq_key" value="<?php echo (C("THINK_SDK_QQ.APP_KEY")); ?>" /></td>
								</tr>
								<tr>
									<td>APPsecret</td>
									<td><input type="text" name="qq_sec" value="<?php echo (C("THINK_SDK_QQ.APP_SECRET")); ?>" /></td>
								</tr>
								<tr>
									<td>授权回调页：</td>
									<td><?php echo sp_get_host();?>/index.php</td>
								</tr>
								<tr>
									<td colspan="2"><a href="http://connect.qq.com/" target="_blank"><?php echo L('CLICK_HERE');?></a><?php echo L('GET_QQ_APPKEY_AND_APPSECRET');?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="B">
						<table width="100%">
							<tbody>
								<tr>
									<td width="140">APPkey</td>
									<td><input type="text" name="sina_key" value="<?php echo (C("THINK_SDK_SINA.APP_KEY")); ?>" /></td>
								</tr>
								<tr>
									<td>APPsecret</td>
									<td><input type="text" name="sina_sec" value="<?php echo (C("THINK_SDK_SINA.APP_SECRET")); ?>" /></td>
								</tr>
								<tr>
									<td><?php echo L('CALLBACK_URL');?></td>
									<td><?php echo ($callback_uri_root); ?>sina</td>
								</tr>
								<tr>
									<td><?php echo L('CANCEL_CALLBACK_URL');?></td>
									<td><?php echo sp_get_host();?></td>
								</tr>
								<tr>
									<td colspan="2"><a href="http://open.weibo.com/" target="_blank"><?php echo L('CLICK_HERE');?></a> <?php echo L('GET_WEIBO_APPKEY_AND_APPSECRET');?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-primary js-ajax-submit"><?php echo L('SAVE');?></button>
			</div>
		</form>
	</div>
	<script src="/thinkcmfx/public/js/common.js"></script>
</body>
</html>