$(function(){
    navBarOption.init();
    carousel.init();
});


//导航条内容加载
var navBarOption={
    bianLiang:{"navContent":["首页","关于我们","新闻动态","产品中心","成功案例","招纳贤士","服务项目","联系我们"]},
    contentReload:function(){
        var li=null;
        for(var i=0;i<this.bianLiang.navContent.length;i++){
            li=$("<li class='navItem'></li>");
            if(i==3){
                var span=$("<span class='dropHover' style='display: block;top: 52px'></span>");
                li.addClass("liHover");
                li.html(this.bianLiang.navContent[i]);
                li.append(span);

            }else{
                li.html(this.bianLiang.navContent[i]);
            }

            $(".nav_header .menu").append(li);
        }
    },
    menuToggleClick:function(){
        var flag=true;
        var menuToggle=$("<ul class='menu_toggle_dropDown_con'></ul> ");
        for(var i=0;i<navBarOption.bianLiang.navContent.length;i++){
            li=$("<li class='navItemToggle'></li>");
            li.html(navBarOption.bianLiang.navContent[i]);
            menuToggle.append(li);
        }
        $("header .nav_header").append(menuToggle);
        $(".nav_header .menu_toggle").click(function(){
            var li=null;
            var width=$(window).width();
            var height=$(window).height();
            if(width>399){
                if(flag){
                    $(".menu_toggle_dropDown_con").css({"height":height+"px"});
                    $("body").css("-webkit-transform","translate3d(-200px, 0, 0)");
                    menuToggle.show();
                    flag=false;
                }else{
                    $("body").css("-webkit-transform","translate3d(0, 0, 0)").on('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd',
                        function() {
                            //alert("回调已经启用");
                            menuToggle.hide();
                            $("body").unbind("transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd");

                        });
                    flag=true;
                }
            }else{
                if(flag){
                    menuToggle.css("display","block");
                    setTimeout(function(){
                        $(".menu_toggle_dropDown_con").css({"height":height+"px","-webkit-transform":"translate3d(0px, 0, 0)"});
                    },50);
                    flag=false;
                }else{
                    $(".menu_toggle_dropDown_con").css({"-webkit-transform":"translate3d("+width+"px, 0, 0)"}).on('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd',
                        function() {
                            menuToggle.css("display","none");
                            $(".menu_toggle_dropDown_con").unbind("transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd");
                        });
                    flag=true;
                }
            }
        });
    },
    menuHover:function(){
        $("header .nav_header ul.menu li").mouseover(function(){
            $(this).siblings(".liHover").removeClass();
            $(".dropHover").remove();
            $(this).addClass("liHover");
            var dropHover=$("<span class='dropHover'></span>");
            $(this).append(dropHover);
            dropHover.fadeIn(function(){$(this).animate({"top":"52px"})});

        });
    },
    init:function(){
        this.contentReload();
        this.menuToggleClick();
        $(".menu_toggle_dropDown_con").css({"transform":"translate3d("+$(window).width()+"px, 0, 0)","transition":"-webkit-transform 1s ease","height":$(window).height()});
        this.menuHover();
    }
};

var carousel= {
    bianliang: {"src": ["assets/images/lunboImg/img1.jpg", "assets/images/lunboImg/img2.jpg", "assets/images/lunboImg/img3.jpg", "assets/images/lunboImg/img4.jpg", "assets/images/lunboImg/img5.jpg"]},
    carouselOption:function(){
        var div=$("<div id='slider-box'></div>");
        var ul=$("<ul id='slider'></ul>");
        div.append(ul);
        for(var i=0;i<this.bianliang.src.length;i++){
            var li=$("<li></li>");
            var img=$("<img src='"+this.bianliang.src[i]+"'' alt=''>");
            li.append(img);
            ul.append(li);
        }
        $(".responsiveImgPlay").append(div);
    },
    start:function(){
        $('#slider-box').touchSlider({
            box: '#slider-box',
            arrow: false,
            auto: true,
            autoTime: 4000
        });
    },
    init: function () {
        this.carouselOption();
        this.start();
    }
};