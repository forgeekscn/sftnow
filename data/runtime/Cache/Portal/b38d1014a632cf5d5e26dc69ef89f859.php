<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=Edge,chrome=1">
    <meta name="author" content="盛帆电子">
    <meta name="keywords" content="武汉盛帆电子股份有限公司,水、电、气的计量、抄表和收费的解决方案。">
    <meta name="description" content="武汉盛帆电子股份有限公司位于中国光谷的汤逊湖畔，是武汉市重点推荐的高新技术企业。公司现有员工500余名，其中本科及以上学历人员180余人，2008年公司资产和销售额均超过亿元。目前，公司已通过ISO9001、ISO14001和OHSAS18001系列认证。">
    <title>水、电、气的计量、抄表和收费的专业解决方案提供商-盛帆电子</title>
    <link rel="stylesheet" href="assets/css/zeptoCarousel.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <!--<link rel="stylesheet" href="assets/css/jquery.fullPage.css">-->
    <link rel="stylesheet" href="assets/css/media.css">
    <!--[if IE]>
    <script>
        (function () {
            if (!/*@cc_on!@*/0)return;
            var e = "header,footer,nav,article,section".split(','), i = e.length;
            while (i--) {
                document.createElement(e[i])
            }
        })()
    </script>
    <style>
        article, aside, dialog, footer, header, section, footer, nav, figure, menu {
            display: block
        }
    </style>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <?php  $articleModel=D("News/PluginArticleItem"); ?>
    <!--首页头部(包括头部和导航菜单)-->
    <header>
        <div class="head_top">
            <div class="content">
                <div class="head_top_left">中国领先的水、电、气、热，节能监测管理方案提供商</div>
                <div class="head_top_right">中文/英文
                    <!--<a class="XLweib" href="#"><img src="assets/images/index/xinlangWB.png" alt="">新浪微博</a><a class="TXweib" href="#"><img src="assets/images/index/txWB.png" alt="">腾讯微博</a>--></div>
            </div>
        </div>
        <div class="nav">
            <nav class="nav_header">
                <div class="logo"><img src="assets/images/index/logo.png" alt="盛帆电子股份有限公司" title="盛帆电子股份有限公司"></div>
                <ul class="menu"></ul>
                <ul class="menu_toggle">
                    <li class="menu_toggle_item"></li>
                    <li class="menu_toggle_item"></li>
                    <li class="menu_toggle_item"></li>
                </ul>
                <div class="clear"></div>
            </nav>
        </div>
    </header>
    <div class="responsiveImgPlay"></div>
    <article>
        <div class="header">
            <h2>MANAGEMENT&nbsp; CONSULTING</h2>
            <hr>
            <h5>解决方案</h5>
        </div>
        <div class="content">
            <ul>
                <li><img src="assets/images/index/content/c1.png" alt=""><span>计量设备</span></li>
                <li><img src="assets/images/index/content/c2.png" alt=""><span>四表合一</span></li>
                <li><img src="assets/images/index/content/c3.png" alt=""><span>公益体育</span></li>
                <li><img src="assets/images/index/content/c4.png" alt=""><span>能效监管</span></li>
            </ul>
        </div>
    </article>
    <div class="footer-content">
        <div class="aboutUs">
            <div class="header">
                <h2>ABOUT&nbsp; US</h2>
                <hr>
                <h5>关于我们</h5>
            </div>
        <?php  $lastnews=$articleModel->order("LastUpdateTime desc")->select(); ?>
            <div class="introduce">
                <?php echo ($lastnews[0]["content"]); ?>
            </div>
            <div class="introduce_idea">
                <ul>
                    <li>
                        <div><img src="assets/images/index/content/e1.png" alt=""></div>
                        <div class="tit">国家电网</div>
                    </li>
                    <li>
                        <div><img src="assets/images/index/content/e2.png" alt=""></div>
                        <div class="tit">教育机构</div>
                    </li>
                    <li>
                        <div><img src="assets/images/index/content/e3.png" alt=""></div>
                        <div class="tit">住宅小区</div>
                    </li>
                    <li>
                        <div><img src="assets/images/index/content/e4.png" alt=""></div>
                        <div class="tit">商业中心</div>
                    </li>
                    <li>
                        <div><img src="assets/images/index/content/e5.png" alt=""></div>
                        <div class="tit">工矿企业</div>
                    </li>
                    <li>
                        <div><img src="assets/images/index/content/e6.png" alt=""></div>
                        <div class="tit">建筑楼宇</div>
                    </li>
                    <li>
                        <div><img src="assets/images/index/content/e7.png" alt=""></div>
                        <div class="tit">交通运输</div>
                    </li>
                    <li>
                        <div><img src="assets/images/index/content/e8.png" alt=""></div>
                        <div class="tit">市政工程</div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="news">
            <div class="header">
                <h2>COMPANY&nbsp; NEWS</h2>
                <hr>
                <h5>公司新闻</h5>
            </div>
            
                    <?php  $url=$lastnews[0]["imageurl"]; $url=preg_replace("/\.axd/", "", $url); $url=preg_replace("/\/{2}/", "/", $url); $url1="http://localhost"."/thinkcmfx/public"."".$url; ?>

                <div class="news_content">
                    <div class="contain">
                        <div class="left">
                            <div class="title">
                                <font style="font-weight: bolder">·</font>公司动态</div>
                            <div class="summary">
                                <img src="<?php echo ($url1); ?>" alt="<?php echo ($url1); ?>" width="134px" height="77px"  >
                                <div class="summary_content">
                                    <div class="tit"><?php echo ($lastnews[0]["title"]); ?></div>
                                    <div class="con"></div>
                                </div>
                            </div>
                            <?php  $lastnews1=$articleModel->where("CategoryId='5'")->order("LastUpdateTime desc")->limit(2)->select(); ?>
                             <?php if(is_array($lastnews1)): $i = 0; $__LIST__ = $lastnews1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="newsList">
                                    <li><span><?php echo ($vo["title"]); ?></span><span class="time"><?php echo ($vo["lastupdatetime"]); ?></span></li>
                                     
                                </ul><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>



                    <?php  $url=$lastnews[1]["imageurl"]; $url=preg_replace("/\.axd/", "", $url); $url=preg_replace("/\/{2}/", "/", $url); $url1="http://localhost"."/thinkcmfx/public"."".$url; ?>
                            
                        <div class="right">
                            <div class="title">
                                <font style="font-weight: bolder">·</font>盛帆公益基金会动态</div>
                            <div class="summary">
                                <img src="<?php echo ($url1); ?>" alt="" width="134px" height="77px">
                                <div class="summary_content">
                                    <div class="tit"><?php echo ($lastnews[1]["title"]); ?> </div>
                                    <div class="con"></div>
                                </div>
                            </div>
                            <?php  $lastnews2=$articleModel->where("CategoryId='6'")->order("LastUpdateTime desc")->limit(3)->select(); ?> 
                            <?php if(is_array($lastnews2)): $i = 0; $__LIST__ = $lastnews2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="newsList">
                                    <li><span><?php echo ($vo["title"]); ?></span><span class="time"><?php echo ($vo["lastupdatetime"]); ?></span></li>
                                     
                                </ul><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>

        



        </div>
    </div>
    <footer>
        <div class="contain">
            <div class="introduce"></div>
            <hr>
            <div class="bottom">
                <div class="left"></div>
                <div class="right"><img src="assets/images/index/c8.png" alt=""><span class="tel" style="font-size: 27px"></span>
                </div>
            </div>
        </div>
    </footer>
    <?php
 $user_agent = $_SERVER['HTTP_USER_AGENT']; if(stristr($user_agent,'iPad') ||stristr($user_agent,'Android')||stristr($user_agent,'iPhone') ) { ?>
        <script src='assets/plugins/zepto.min.js'></script>
        <script src='assets/js/index_mobile.js'></script>
        <script src='assets/js/zeptoCarousel.js'></script>
        <?php
 $fb_fs= '移动设备'; }else if(stristr($user_agent,'Linux')){ $fb_fs= 'Linux'; }else{ ?>
            <script src='assets/plugins/jquery-1.9.1.min.js'></script>"
            <script src='assets/js/index.js'></script>
            <script src='assets/js/responsiveImg.js'></script>"
            <script src='assets/js/lunbo.js'></script>
            <script src='assets/plugins/jquery.fullPage.min.js' class='fullpage'></script>
            <?php
 $fb_fs= 'PC设备'; } ?>
</body>

</html>