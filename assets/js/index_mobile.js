$(function(){
    navBarOption.init();
    carousel.init();
    footer.init();
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
    bianliang: {"src": ["assets/images/lunboImg/carousel1.png", "assets/images/lunboImg/carousel2.png", "assets/images/lunboImg/carousel3.png"],"src2":["assets/images/lunboImg/carousel1_1.png","assets/images/lunboImg/carousel2_2.png","assets/images/lunboImg/carousel3_3.png"]},
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

var footer={
    bianliang:{"产品中心":["预设填充","预设填充","预设填充","预设填充","预设填充","预设填充","预设填充","预设填充","预设填充"],"企业简介":["董事长致辞","组织结构","品质保障","公司简介","资质荣誉"],"成功案例":["成功案例"],"服务项目":["服务项目","AO登陆"],"招纳贤士":["社会招聘","校园招聘"]},
    address:["武汉盛帆电子股份有限公司版权所有 鄂ICP备06778号","中国·武汉市江夏区经济开发区阳光大道9号"],
    tel:"15255646666",
    footerOption:function(){
        for(o in this.bianliang){
            var item_tit=$("<div class='item_tit'></div>");
            var item_add=$("<div class='item_add' style='position:absolute;right:0;top:0;display: none'>＋</div>");
            var span=$("<span></span>");
            span.html(o);
            item_tit.append(span);
            for(var i=0;i<footer.bianliang[o].length;i++){
                var item=$("<div class='item'></div>");
                item.html(footer.bianliang[o][i]);
                item_tit.append(item);
                item_tit.append(item_add);
            }
            $("footer .introduce").append(item_tit);
        }
        var address=$("<div class='address'></div>");
        for(var j=0;j<this.address.length;j++){
            var addressItem=$("<div class='addressItem'></div>");
            addressItem.html(this.address[j]);
            address.append(addressItem);
        }
        $("footer .bottom .left").append(address);
        $("footer .bottom .right .tel").html(this.tel);
    },
    addClick:function(){
        var arr=["产品中心","企业简介","成功案例","服务项目","招纳贤士"];
        var flag=true;
        $("footer .item_tit").css("height", $("footer .item_tit").find("span").height());
        $("footer .item_add").each(function(x){
            $(this).click(function(){
                if(flag){
                    $(this).parent().css({"height":($(this).siblings(".item").height()+10)*(footer.bianliang[arr[x]].length)});
                    flag=false;
                }else {
                    $(this).parent().css({"height":$(this).siblings("span").height()});
                    flag=true;
                }
            });
        });
    },
    init:function(){
        this.footerOption();
        this.addClick();
    }
};