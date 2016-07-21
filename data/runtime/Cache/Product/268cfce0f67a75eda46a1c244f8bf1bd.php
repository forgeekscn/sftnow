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
            <li><a href="<?php echo U('AdminIndex/productE');?>">电表管理</a></li>
            <li class="active"><a href="<?php echo U('AdminIndex/add');?>" target="_self">添加电表</a></li>
        </ul>
        <form action="<?php echo U('AdminIndex/add_post');?>" method="post" class="form-horizontal js-ajax-forms" enctype="multipart/form-data">
            <div class="row-fluid">
                <div class="span9">
                    <table class="table table-bordered">
                        <tr>
                            <th width="80"></th>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <th width="80">电表名称</th>
                            <td>
                                <input type="text" style="width:400px;" name="Title" id="title" required value="" />
                                <span class="form-required"></span>
                            </td>
                        </tr>
                        <tr>
                            <th>电表型号</th>
                            <td>
                                <input type="text" name="ExtendContent01" id="keywords" value="" style="width: 400px"> </td>
                        </tr>
                        <tr>
                            <th>电表简介</th>
                            <td>
                                <input type="text" name="Content" id="source" value="" style="width: 400px">
                            </td>
                        </tr>
                        <tr>
                            <th>产品特色</th>
                            <td>
                                <textarea name="ExtendContent03" id="description" required style="width: 98%; height: 50px;" placeholder=""></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>功能简介</th>
                            <td>
                                <textarea name="ExtendContent02" required style="width: 98%; height: 50px;" placeholder=""></textarea>
                        </tr>
                        <tr>
                            <th>样品图</th>
                            <td>
                                <input type="file" name="photo" />
                                <fieldset name="photo1">
                                    <legend></legend>
                                    <ul id="photos" class="pic-list unstyled"></ul>
                                </fieldset>
                                <a href="javascript:;" onclick="javascript:flashupload('albums_images', '图片上传','photos',change_images,'10,gif|jpg|jpeg|png|bmp,0','','','')" class="btn btn-small">选择图片</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <button class="btn btn-primary js-ajax-submit" type="submit">提交</button>
        </form>
    </div>
    <script type="text/javascript" src="/thinkcmfx/public/js/common.js"></script>
    <script type="text/javascript" src="/thinkcmfx/public/js/content_addtop.js"></script>
    <script type="text/javascript">
    //编辑器路径定义
    var editorURL = GV.DIMAUB;
    </script>
    <script type="text/javascript" src="/thinkcmfx/public/js/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/thinkcmfx/public/js/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript">
    // $(function() {
        // $(".js-ajax-close-btn").on('click', function(e) {
        //     e.preventDefault();
        //     Wind.use("artDialog", function() {
        //         art.dialog({
        //             id: "question",
        //             icon: "question",
        //             fixed: true,
        //             lock: true,
        //             background: "#CCCCCC",
        //             opacity:0,
        //             content: "您确定需要关闭当前页面嘛？",
        //             ok: function() {
        //                 setCookie("refersh_time", 1);
        //                 window.close();
        //                 return true;
        //             }
        //         });
        //     });
        // });
        /////---------------------
        // Wind.use('validate', 'ajaxForm', 'artDialog', function() {
            //javascript

            //编辑器
    //         editorcontent = new baidu.editor.ui.Editor();
    //         editorcontent.render('content');
    //         try {
    //             editorcontent.sync();
    //         } catch (err) {}
    //         //增加编辑器验证规则
    //         jQuery.validator.addMethod('editorcontent', function() {
    //             try {
    //                 editorcontent.sync();
    //             } catch (err) {}
    //             return editorcontent.hasContents();
    //         });
    //         var form = $('form.js-ajax-forms');
    //         //ie处理placeholder提交问题
    //         if ($.browser.msie) {
    //             form.find('[placeholder]').each(function() {
    //                 var input = $(this);
    //                 if (input.val() == input.attr('placeholder')) {
    //                     input.val('');
    //                 }
    //             });
    //         }

    //         var formloading = false;
    //         //表单验证开始
    //         form.validate({
    //             //是否在获取焦点时验证
    //             onfocusout: false,
    //             //是否在敲击键盘时验证
    //             onkeyup: false,
    //             //当鼠标掉级时验证
    //             onclick: false,
    //             //验证错误
    //             showErrors: function(errorMap, errorArr) {
    //                 //errorMap {'name':'错误信息'}
    //                 //errorArr [{'message':'错误信息',element:({})}]
    //                 try {
    //                     $(errorArr[0].element).focus();
    //                     art.dialog({
    //                         id: 'error',
    //                         icon: 'error',
    //                         lock: true,
    //                         fixed: true,
    //                         background: "#CCCCCC",
    //                         opacity: 0,
    //                         content: errorArr[0].message,
    //                         cancelVal: '确定',
    //                         cancel: function() {
    //                             $(errorArr[0].element).focus();
    //                         }
    //                     });
    //                 } catch (err) {}
    //             },
    //             //验证规则
    //             rules: {
    //                 'post[post_title]': {
    //                     required: 1
    //                 },
    //                 'post[post_content]': {
    //                     editorcontent: true
    //                 }
    //             },
    //             //验证未通过提示消息
    //             messages: {
    //                 'post[post_title]': {
    //                     required: '请输入标题'
    //                 },
    //                 'post[post_content]': {
    //                     editorcontent: '内容不能为空'
    //                 }
    //             },
    //             //给未通过验证的元素加效果,闪烁等
    //             highlight: false,
    //             //是否在获取焦点时验证
    //             onfocusout: false,
    //             //验证通过，提交表单
    //             submitHandler: function(forms) {
    //                 if (formloading)
    //                     return;
    //                 $(forms).ajaxSubmit({
    //                     url: form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
    //                     dataType: 'json',
    //                     beforeSubmit: function(arr, $form, options) {
    //                         formloading = true;
    //                     },
    //                     success: function(data, statusText, xhr, $form) {
    //                         formloading = false;
    //                         if (data.status) {
    //                             setCookie("refersh_time", 1);
    //                             //添加成功
    //                             Wind.use("artDialog", function() {
    //                                 art.dialog({
    //                                     id: "succeed",
    //                                     icon: "succeed",
    //                                     fixed: true,
    //                                     lock: true,
    //                                     background: "#CCCCCC",
    //                                     opacity: 0,
    //                                     content: data.info,
    //                                     button: [{
    //                                         name: '继续添加？',
    //                                         callback: function() {
    //                                             reloadPage(window);
    //                                             return true;
    //                                         },
    //                                         focus: true
    //                                     }, {
    //                                         name: '返回列表页',
    //                                         callback: function() {
    //                                             location = "<?php echo U('AdminIndex/add');?>";
    //                                             return true;
    //                                         }
    //                                     }]
    //                                 });
    //                             });
    //                         } else {
    //                             isalert(data.info);
    //                         }
    //                     }
    //                 });
    //             }
    //         });
    //     });
    //     ////-------------------------
    // });
    </script>
</body>

</html>