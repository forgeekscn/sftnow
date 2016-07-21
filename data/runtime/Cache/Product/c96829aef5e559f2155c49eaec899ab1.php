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
            <li><a href="<?php echo U('AdminIndex/productW');?>">水表管理</a></li>
            <li class="active"><a href="<?php echo U('AdminIndex/addW');?>" target="_self">添加水表</a></li>
        </ul>
        <form action="<?php echo U('AdminIndex/addW_post');?>" method="post" class="form-horizontal js-ajax-forms" enctype="multipart/form-data">
            <div class="row-fluid">
                <div class="span9">
                    <table class="table table-bordered">
                        <tr>
                            <th width="80"></th>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <th width="80">水表名称</th>
                            <td>
                                <input type="text" style="width:400px;" name="Title" id="title" required value="" />
                                <span class="form-required"></span>
                            </td>
                        </tr>
                        <tr>
                            <th>水表型号</th>
                            <td>
                                <input type="text" name="ExtendContent01" id="keywords" value="" style="width: 400px"> </td>
                        </tr>
                        <tr>
                            <th>水表简介</th>
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
     
    </script>
</body>

</html>