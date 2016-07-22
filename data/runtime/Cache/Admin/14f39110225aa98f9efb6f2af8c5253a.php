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
</head>

<body>
	<?php  ?>

	<script type="text/javascript">
		
		$(document).ready(function() {

			$("button").click(function(){
				var div=$("div");
				div.animate({height:'300px',opacity:'0.4'},100).animate({height:'300px',opacity:'0.4'},100).animate({height:'300px',opacity:'0.4'},200).animate({height:'300px',opacity:'0.4'},100).animate({height:'300px',opacity:'0.4'},100).animate({height:'300px',opacity:'0.4'},100).animate({height:'300px',opacity:'0.4'},200).animate({height:'300px',opacity:'0.4'},100).animate({height:'300px',opacity:'0.4'},100).animate({height:'300px',opacity:'0.4'},100).animate({height:'300px',opacity:'0.4'},200).animate({height:'300px',opacity:'0.4'},100);
				div.animate({width:'300px',opacity:'0.8'},200);
				div.animate({height:'100px',opacity:'0.4'},1000);
				div.animate({width:'100px',opacity:'0.8'},100);
			});
			// $("[type$='n']").hide();


			// $("button").mouseover(function() {
				
			// 	$("p").toggle(2000);
			// });

			// $("p").fadeToggle(2000);
			// $(".ad").fadeto(1000,0.02);
			// $("p").slideUp('2000', function() {
				
			// });

			// $("button").click(function() {
				
			// 	$("div").animate({
			// 		up: '200px',
			// 		opacity: '0.5'},
			// 		2000, function() {
			// 		/* stuff to do after animation is complete */
			// 	});
			// });


	});

	</script>

	<a href="aaaa" class="ad" id="ss">asdas</a>
	<h2>This is a heading</h2>
	<p>This is a paragraph.</p>
	<p>This is another paragraph.</p>
	<div style="background: #2f2 ; width:100px;height:100px;" ></div>
	<button type="button">Click me</button>


</body>

</html>