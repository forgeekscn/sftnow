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
			<li class="active"><a href="#A" data-toggle="tab"><?php echo L('WEB_SITE_INFOS');?></a></li>
			<li><a href="#B" data-toggle="tab"><?php echo L('SEO_SETTING');?></a></li>
			<li><a href="#C" data-toggle="tab"><?php echo L('URL_SETTING');?></a></li>
			<li><a href="<?php echo U('route/index');?>"><?php echo L('URL_OPTIMIZATION');?></a></li>
			<li><a href="#D" data-toggle="tab"><?php echo L('UCENTER_SETTING');?></a></li>
			<li><a href="#E" data-toggle="tab"><?php echo L('COMMENT_SETTING');?></a></li>
			<li><a href="#F" data-toggle="tab"><?php echo L("USERNAME_FILTER");?></a></li>
		</ul>
		<form class="form-horizontal js-ajax-forms" action="<?php echo U('setting/site_post');?>" method="post">
			<fieldset>
				<div class="tabbable">
					<div class="tab-content">
						<div class="tab-pane active" id="A">
							<fieldset>
								<div class="control-group">
									<label class="control-label"><?php echo L('WEBSITE_NAME');?></label>
									<div class="controls">
										<input type="text" name="options[site_name]" value="<?php echo ($site_name); ?>"><span class="form-required">*</span>
										<?php if($option_id): ?>
										<input type="hidden" name="option_id" value="<?php echo ($option_id); ?>">
										<?php endif; ?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php echo L('WEBSITE_DOMAIN');?></label>
									<div class="controls">
										<input type="text" name="options[site_host]" value="<?php echo ($site_host); ?>"><span class="form-required">*</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">后台地址加密码：</label>
									<div class="controls">
										<input type="text" name="options[site_admin_url_password]" value="<?php echo ($site_admin_url_password); ?>" id="js-site-admin-url-password"><span class="form-required">*</span>
										<span class="help-block" style="color: red;">设置加密码后必须通过以下地址访问后台,请劳记此地址，为了安全，您也可以定期更换此加密码!</span>
										<?php $site_admin_url_password =C("SP_SITE_ADMIN_URL_PASSWORD"); ?>
										<?php if(!empty($site_admin_url_password)): ?><span class="help-block">后台地址：<span id="js-site-admin-url"><?php echo sp_get_host();?>/thinkcmfx?g=admin&upw=<?php echo C('SP_SITE_ADMIN_URL_PASSWORD');?></span></span><?php endif; ?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php echo L('WEBSITE_THEME');?></label>
									<div class="controls">
										<select name="options[site_tpl]">
											<?php if(is_array($templates)): foreach($templates as $key=>$vo): $tpl_selected=$site_tpl==$vo?"selected":""; ?>
											<option value="<?php echo ($vo); ?>" <?php echo ($tpl_selected); ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php echo L('ENABLE_MOBILE_THEME');?>：</label>
									<div class="controls">
										<?php $mobile_tpl_enabled_checked=empty($mobile_tpl_enabled)?'':'checked'; ?>
										<label class="checkbox inline"><input type="checkbox" name="options[mobile_tpl_enabled]" value="1" <?php echo ($mobile_tpl_enabled_checked); ?>></label>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php echo L('WEBSITE_ADMIN_THEME');?></label>
									<div class="controls">
										<select name="options[site_adminstyle]">
											<?php if(is_array($adminstyles)): foreach($adminstyles as $key=>$vo): $adminstyle_selected=$site_adminstyle==$vo?"selected":""; ?>
											<option value="<?php echo ($vo); ?>" <?php echo ($adminstyle_selected); ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php echo L('HTML_CACHE');?>：</label>
									<div class="controls">
										<?php $html_cache_on_checked=empty($html_cache_on)?'':'checked'; ?>
										<label class="checkbox inline"><input type="checkbox" name="options[html_cache_on]" value="1" <?php echo ($html_cache_on_checked); ?>></label>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php echo L('WEBSITE_ICP');?></label>
									<div class="controls">
										<input type="text" name="options[site_icp]" value="<?php echo ($site_icp); ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php echo L('WEBMASTER_EMAIL');?></label>
									<div class="controls">
										<input type="text" name="options[site_admin_email]" value="<?php echo ($site_admin_email); ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php echo L("WEBSITE_STATISTICAL_CODE");?></label>
									<div class="controls">
										<textarea name="options[site_tongji]" rows="5" cols="57"><?php echo ($site_tongji); ?></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php echo L('WEBSITE_COPYRIGHT_INFOMATION');?></label>
									<div class="controls">
										<textarea name="options[site_copyright]" rows="5" cols="57"><?php echo ($site_copyright); ?></textarea>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="tab-pane" id="B">
							<fieldset>
								<div class="control-group">
									<label class="control-label"><?php echo L('WEBSITE_SEO_TITLE');?></label>
									<div class="controls">
										<input type="text" name="options[site_seo_title]" value="<?php echo ($site_seo_title); ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php echo L('WEBSITE_SEO_KEYWORDS');?></label>
									<div class="controls">
										<input type="text" name="options[site_seo_keywords]" value="<?php echo ($site_seo_keywords); ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php echo L('WEBSITE_SEO_DESCRIPTION');?></label>
									<div class="controls">
										<textarea name="options[site_seo_description]" rows="5" cols="57"><?php echo ($site_seo_description); ?></textarea>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="tab-pane" id="C">
							<fieldset>
								<div class="control-group">
									<label class="control-label"><?php echo L('URL_MODE');?></label>
									<div class="controls">
										<?php $urlmodes=array( "0"=>L('URL_NORMAL_MODE'), "1"=>L('URL_PATHINFO_MODE'), "2"=>L('URL_REWRITE_MODE')); ?>
										<select name="options[urlmode]">
											<?php if(is_array($urlmodes)): foreach($urlmodes as $key=>$vo): $urlmode_selected=$key==$urlmode?"selected":""; ?>
											<option value="<?php echo ($key); ?>" <?php echo ($urlmode_selected); ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
										</select>
										<span class="form-required">* <?php echo L('URL_MODE_HELP_TEXT');?></span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php echo L('URL_REWRITE_SUFFIX');?></label>
									<div class="controls">
										<input type="text" name="options[html_suffix]" value="<?php echo ($html_suffix); ?>">
										<span class="form-required"><?php echo L('URL_REWRITE_SUFFIX_HELP_TEXT');?></span>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="tab-pane" id="D">
							<fieldset>
								<div class="control-group">
									<label class="control-label"><?php echo L('ENABLE_UCENTER');?></label>
									<div class="controls">
										<?php $ucenter_enabled_checked=empty($ucenter_enabled)?"":"checked"; ?>
										<input type="checkbox" class="js-check" name="options[ucenter_enabled]" value="1" <?php echo ($ucenter_enabled_checked); ?>>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="tab-pane" id="E">
							<fieldset>
								<div class="control-group">
									<label class="control-label"><?php echo L('COMMENT_CHECK');?></label>
									<div class="controls">
										<?php $comment_need_checked=empty($comment_need_check)?"":"checked"; ?>
										<input type="checkbox" class="js-check" name="options[comment_need_check]" value="1" <?php echo ($comment_need_checked); ?>>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php echo L('COMMENT_TIME_INTERVAL');?></label>
									<div class="controls">
										<input type="number" name="options[comment_time_interval]" value="<?php echo ((isset($comment_time_interval) && ($comment_time_interval !== ""))?($comment_time_interval):60); ?>" style="width:40px;"><?php echo L('SECONDS');?>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="tab-pane" id="F">
							<fieldset>
								<div class="control-group">
									<label class="control-label"><?php echo L('SPECAIL_USERNAME');?></label>
									<div class="controls">
										<textarea name="cmf_settings[banned_usernames]" rows="5" cols="57"><?php echo ($cmf_settings["banned_usernames"]); ?></textarea>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-primary  js-ajax-submit"><?php echo L("SAVE");?></button>
				</div>
			</fieldset>
		</form>

	</div>
	<script type="text/javascript" src="/thinkcmfx/public/js/common.js"></script>
	<script>
		/////---------------------
		$(function(){
			$("#urlmode-select").change(function(){
				if($(this).val()==1){
					alert("更改后，若发现前台链接不能正常访问，可能是您的服务器不支持PATHINFO，请先修改data/conf/config.php文件的URL_MODEL为0保证网站正常运行,在配置服务器PATHINFO功能后再更新为PATHINFO模式！");
				}
				
				if($(this).val()==2){
					alert("更改后，若发现前台链接不能正常访问，可能是您的服务器不支持REWRITE，请先修改data/conf/config.php文件的URL_MODEL为0保证网站正常运行，在开启服务器REWRITE功能后再更新为REWRITE模式！");
				}
			});
			$("#js-site-admin-url-password").change(function(){
				$(this).data("changed",true);
			});
		});
		Wind.use('validate', 'ajaxForm', 'artDialog', function() {
			//javascript
			var form = $('form.js-ajax-forms');
			//ie处理placeholder提交问题
			if ($.browser.msie) {
				form.find('[placeholder]').each(function() {
					var input = $(this);
					if (input.val() == input.attr('placeholder')) {
						input.val('');
					}
				});
			}
			//表单验证开始
			form.validate({
				//是否在获取焦点时验证
				onfocusout : false,
				//是否在敲击键盘时验证
				onkeyup : false,
				//当鼠标掉级时验证
				onclick : false,
				//验证错误
				showErrors : function(errorMap, errorArr) {
					//errorMap {'name':'错误信息'}
					//errorArr [{'message':'错误信息',element:({})}]
					try {
						$(errorArr[0].element).focus();
						art.dialog({
							id : 'error',
							icon : 'error',
							lock : true,
							fixed : true,
							background : "#CCCCCC",
							opacity : 0,
							content : errorArr[0].message,
							cancelVal : "<?php echo L('OK');?>",
							cancel : function() {
								$(errorArr[0].element).focus();
							}
						});
					} catch (err) {
					}
				},
				//验证规则
				rules : {
					'options[site_name]' : {
						required : 1
					},
					'options[site_host]' : {
						required : 1
					},
					'options[site_root]' : {
						required : 1
					}
				},
				//验证未通过提示消息
				messages : {
					'options[site_name]' : {
						required : "<?php echo L('WEBSITE_SITE_NAME_REQUIRED_MESSAGE');?>"
					},
					'options[site_host]' : {
						required : "<?php echo L('WEBSITE_SITE_HOST_REQUIRED_MESSAGE');?>"
					}
				},
				//给未通过验证的元素加效果,闪烁等
				highlight : false,
				//是否在获取焦点时验证
				onfocusout : false,
				//验证通过，提交表单
				submitHandler : function(forms) {
					$(forms).ajaxSubmit({
						url : form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
						dataType : 'json',
						beforeSubmit : function(arr, $form, options) {

						},
						success : function(data, statusText, xhr, $form) {
							if (data.status) {
								setCookie("refersh_time", 1);
								var admin_url_changed=$("#js-site-admin-url-password").data("changed");
								var message =admin_url_changed?data.info+'<br><span style="color:red;">后台地址已更新(请劳记！)</span>':data.info;
								
								//添加成功
								Wind.use("artDialog", function() {
									art.dialog({
										id : "succeed",
										icon : "succeed",
										fixed : true,
										lock : true,
										background : "#CCCCCC",
										opacity : 0,
										content : message,
										button : [ {
											name : "<?php echo L('OK');?>",
											callback : function() {
												reloadPage(window);
												return true;
											},
											focus : true
										}, {
											name : "<?php echo L('CLOSE');?>",
											callback : function() {
												reloadPage(window);
												return true;
											}
										} ]
									});
								});
							} else {
								alert(data.info);
							}
						}
					});
				}
			});
		});
		////-------------------------
	</script>
</body>
</html>