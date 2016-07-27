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
<style>
.home_info li em {
    float: left;
    width: 120px;
    font-style: normal;
}

li {
    list-style: none;
}
</style>
<script src="/thinkcmfx/public/js/common.js"></script>
<script src="/thinkcmfx/public/js/jquery.js"></script>
<script src="/thinkcmfx/public/js/jquery-ui-1.9.2.custom.js"></script>
<!-- jquery-ui-1.9.2.custom.js -->
<link rel="stylesheet" href="/thinkcmfx/public/css/ui-lightness/jquery-ui-1.9.2.custom.css">
</head>

<body>
    <?php  redirect(U('Product/AdminIndex/productE'), 1, '加载中...'); ?>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#tabs").tabs();

        $("#newtab").click(function() {

        	
            $("#tabs ul").append("<li><a href='#tabs-new'>new</a></li>");
            $("#tabs").append( < div id = 'tabs-new' >
                < p > 在下载生成器（ Download Builder） 页面， 您将看到一个文本框， 列出了一系列为 jQuery UI 小部件预先设计的主题。 您可以从这些提供的主题中选择一个， 也可以使用 ThemeRoller 自定义一个主题（ 详见后面章节的讲解）。 高级主题设置： 下载生成器（ Download Builder） 的主题部分也为主题提供了一些高级配置设置。 如果您打算在一个页面上使用多个主题， 这些字段会派上用场。 如果您打算在一个页面上只使用一个主题， 那么您完全可以跳过这些设置。 < /p> < /div > );

        });


    });
    </script>
    <button id="newtab">new</button>
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">首页</a></li>
        </ul>
        <div id="tabs-1">
            <p>在下载生成器（Download Builder）页面，您将看到一个文本框，列出了一系列为 jQuery UI 小部件预先设计的主题。您可以从这些提供的主题中选择一个，也可以使用 ThemeRoller 自定义一个主题（详见后面章节的讲解）。 高级主题设置： 下载生成器（Download Builder）的主题部分也为主题提供了一些高级配置设置。如果您打算在一个页面上使用多个主题，这些字段会派上用场。如果您打算在一个页面上只使用一个主题，那么您完全可以跳过这些设置。</p>
        </div>
    </div>
</body>

</html>