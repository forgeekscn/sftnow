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
<style type="text/css">
.pic-list li {
	margin-bottom: 5px;
}
</style>
</head>
<body>
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
			<li><a href="javascrip:;">修改电表</a></li>
		</ul>
		<form action="<?php echo U('AdminPost/edit_post');?>" method="post" class="form-horizontal js-ajax-forms" enctype="multipart/form-data">
			<div class="row-fluid">
				<div class="span9">
					<table class="table table-bordered">
						<tr>
							<th width="80">栏目</th>
							<td>
								<select multiple="multiple" style="max-height: 100px;"name="term[]"><?php echo ($taxonomys); ?></select>
								<div>windows：按住 Ctrl 按钮来选择多个选项,Mac：按住 command 按钮来选择多个选项</div>
							</td>
						</tr>
						<tr>
							<th>标题</th>
							<td>
								<input type="hidden" name="post[id]" value="<?php echo ($post["id"]); ?>">
								<input type="text" style="width: 400px;" name="post[post_title]" required value="<?php echo ($post["post_title"]); ?>" placeholder="请输入标题"/>
								<span class="form-required">*</span>
							</td>
						</tr>
						<tr>
							<th>关键词</th>
							<td>
								<input type="text" name="post[post_keywords]" style="width: 400px" value="<?php echo ($post['post_keywords']); ?>" placeholder="请输入关键字">
								多关键词之间用空格或者英文逗号隔开
							</td>
						</tr>
	
						<tr>
							<th>文章来源</th>
							<td>
								<input type="text" name="post[post_source]" value="<?php echo ($post['post_source']); ?>" style="width: 400px" placeholder="请输入文章来源">
							</td>
						</tr>
						<tr>
							<th>摘要</th>
							<td>
								<textarea name="post[post_excerpt]" required style="width: 98%; height: 50px;" placeholder="请填写摘要"><?php echo ($post["post_excerpt"]); ?></textarea>
								<span class="form-required">*</span>
							</td>
						</tr>
						<tr>
							<th>内容</th>
							<td>
								<script type="text/plain" id="content" name="post[post_content]"><?php echo ($post["post_content"]); ?></script>
							</td>
						</tr>
						<tr>
							<th>相册图集</th>
							<td>
								<fieldset>
									<legend>图片列表</legend>
									<ul id="photos" class="pic-list unstyled">
										<?php if(is_array($smeta['photo'])): foreach($smeta['photo'] as $key=>$vo): $img_url=sp_get_asset_upload_path($vo['url']); ?>
										<li id="savedimage<?php echo ($key); ?>">
											<input type="text" name="photos_url[]" value="<?php echo ($img_url); ?>" title="双击查看" style="width: 310px;height:48px;" ondblclick="image_priview(this.value);" class="input image-url-input"> 
											<input type="text" name="photos_alt[]" value="<?php echo ($vo["alt"]); ?>" style="width: 160px;height:48px;" class="input image-alt-input" onfocus="if(this.value == this.defaultValue) this.value = ''" onblur="if(this.value.replace(' ','') == '') this.value = this.defaultValue;">
											<a class="img_a" href="javascript:onClick=image_priview('<?php echo ($img_url); ?>')"><img class="img_prew" src="<?php echo sp_get_asset_upload_path($vo['url']);?>" style="height:50px;"></img></a>
											<a href="javascript:flashupload('replace_albums_images', '图片替换','savedimage<?php echo ($key); ?>',replace_image,'10,gif|jpg|jpeg|png|bmp,0','','','')">替换</a>
											<a href="javascript:remove_div('savedimage<?php echo ($key); ?>')">移除</a>
										</li><?php endforeach; endif; ?>
									</ul>
								</fieldset>
								<a href="javascript:;" onclick="javascript:flashupload('albums_images', '图片上传','photos',change_images,'10,gif|jpg|jpeg|png|bmp,0','','','')" class="btn btn-small">选择图片</a>
							</td>
						</tr>
					</table>
				</div>
				<div class="span3">
					<table class="table table-bordered">
						<tr>
							<td><b>缩略图</b></td>
						</tr>
						<tr>
							<td>
								<div style="text-align: center;">
									<input type="hidden" name="smeta[thumb]" id="thumb" value="<?php echo ((isset($smeta["thumb"]) && ($smeta["thumb"] !== ""))?($smeta["thumb"]):''); ?>">
									<a href="javascript:void(0);" onclick="flashupload('thumb_images', '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|png|bmp,1,,,1','','','');return false;">
										<?php if(empty($smeta['thumb'])): ?><img src="/thinkcmfx/admin/themes/simplebootx/Public/assets/images/default-thumbnail.png" id="thumb_preview" width="135" style="cursor: hand"/>
										<?php else: ?>
											<img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" id="thumb_preview" width="135" style="cursor: hand"/><?php endif; ?>
									</a>
									<input type="button" class="btn btn-small" onclick="$('#thumb_preview').attr('src','/thinkcmfx/admin/themes/simplebootx/Public/assets/images/default-thumbnail.png');$('#thumb').val('');return false;" value="取消图片">
								</div>
							</td>
						</tr>
						<tr>
							<th>发布时间</th>
						</tr>
						<tr>
							<td><input type="text" name="post[post_modified]" value="<?php echo ($post["post_modified"]); ?>" class="js-datetime" style="width: 160px;"></td>
						</tr>
						<tr>
							<th>评论</th>
						</tr>
						<tr>
							<td><label style="width: 88px"><a href="javascript:open_iframe_dialog('<?php echo U('comment/commentadmin/index',array('post_id'=>$post['id']));?>','评论列表')">查看评论</a></label>
							</td>
						</tr>
						<tr>
							<th>状态</th>
						</tr>
						<tr>
							<td>
								<?php $status_yes=$post['post_status']==1?"checked":""; $status_no=$post['post_status']==0?"checked":""; $istop_yes=$post['istop']==1?"checked":""; $istop_no=$post['istop']==0?"checked":""; $recommended_yes=$post['recommended']==1?"checked":""; $recommended_no=$post['recommended']==0?"checked":""; ?>
								<label class="radio"><input type="radio" name="post[post_status]" value="1" <?php echo ($status_yes); ?>>审核通过</label>
							</td>
						</tr>
						<tr>
							<td>
								<label class="radio"><input type="radio" name="post[istop]" value="1" <?php echo ($istop_yes); ?>>置顶</label>
								<label class="radio"><input type="radio" name="post[istop]" value="0" <?php echo ($istop_no); ?>>未置顶</label>
							</td>
						</tr>
						<tr>
							<td>
								<label class="radio"><input type="radio" name="post[recommended]" value="1" <?php echo ($recommended_yes); ?>>推荐</label>
								<label class="radio"><input type="radio" name="post[recommended]" value="0" <?php echo ($recommended_no); ?>>未推荐</label>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="form-actions">
				<button class="btn btn-primary js-ajax-submit" type="submit">提交</button>
				<a class="btn" href="<?php echo U('AdminPost/index');?>">返回</a>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="/thinkcmfx/public/js/common.js"></script>
	<script type="text/javascript" src="/thinkcmfx/public/js/content_addtop.js?t=<?php echo time();?>"></script>
	<script type="text/javascript">
		//编辑器路径定义
		var editorURL = GV.DIMAUB;
	</script>
	<script type="text/javascript" src="/thinkcmfx/public/js/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="/thinkcmfx/public/js/ueditor/ueditor.all.min.js"></script>
	<script type="text/javascript">
		$(function() {
			//setInterval(function(){public_lock_renewal();}, 10000);
			$(".js-ajax-close-btn").on('click', function(e) {
				e.preventDefault();
				Wind.use("artDialog", function() {
					art.dialog({
						id : "question",
						icon : "question",
						fixed : true,
						lock : true,
						background : "#CCCCCC",
						opacity : 0,
						content : "您确定需要关闭当前页面嘛？",
						ok : function() {
							setCookie("refersh_time", 1);
							window.close();
							return true;
						}
					});
				});
			});
			/////---------------------
			Wind.use('validate', 'ajaxForm', 'artDialog', function() {
				//javascript

				//编辑器
				editorcontent = new baidu.editor.ui.Editor();
				editorcontent.render('content');
				try {
					editorcontent.sync();
				} catch (err) {
				}
				//增加编辑器验证规则
				jQuery.validator.addMethod('editorcontent', function() {
					try {
						editorcontent.sync();
					} catch (err) {
					}
					;
					return editorcontent.hasContents();
				});
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
								cancelVal : '确定',
								cancel : function() {
									$(errorArr[0].element).focus();
								}
							});
						} catch (err) {
						}
					},
					//验证规则
					rules : {
						'post[post_title]' : {
							required : 1
						},
						'post[post_content]' : {
							editorcontent : true
						}
					},
					//验证未通过提示消息
					messages : {
						'post[post_title]' : {
							required : '请输入标题'
						},
						'post[post_content]' : {
							editorcontent : '内容不能为空'
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
									//添加成功
									Wind.use("artDialog", function() {
										art.dialog({
											id : "succeed",
											icon : "succeed",
											fixed : true,
											lock : true,
											background : "#CCCCCC",
											opacity : 0,
											content : data.info,
											button : [ {
												name : '继续编辑？',
												callback : function() {
													//reloadPage(window);
													return true;
												},
												focus : true
											}, {
												name : '返回列表页',
												callback : function() {
													location = "<?php echo U('AdminPost/index');?>";
													return true;
												}
											} ]
										});
									});
								} else {
									isalert(data.info);
								}
							}
						});
					}
				});
			});
			////-------------------------
		});
	</script>
</body>
</html>