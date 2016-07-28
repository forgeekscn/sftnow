 
$(function(){
    navBarOption.init();
    carousel.init();
    footer.init();
   // fullpage.init();
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
        $(window).scroll(function(){
             $("header").css({"position":"fixed","top":0,"left":0,"right":0,"z-index":200,"background":"white"});
        });
    },
    menuToggleClick:function(){
        var flag=true;
        $(".nav_header .menu_toggle").click(function(){
            var li=null;
            var width=$(window).width();
            var height=$(window).height();
            var menuToggle=$("<ul class='menu_toggle_dropDown_con'></ul> ");
            for(var i=0;i<navBarOption.bianLiang.navContent.length;i++){
                li=$("<li class='navItemToggle'></li>");
                li.html(navBarOption.bianLiang.navContent[i]);
                menuToggle.append(li);
            }
            $("header .nav_header").append(menuToggle);
            if(width>399){
                if(flag){
                    $(".menu_toggle_dropDown_con").css({"height":height+"px"});
                    $("body").animate({"right":"200px"},600);
                    menuToggle.show();
                    flag=false;
                }else{
                    $("body").animate({"right":"0px"},600,function(){$("header .nav_header .menu_toggle_dropDown_con").remove();});
                    flag=true;
                }
            }else{
                if(flag){
                    $(".menu_toggle_dropDown_con").css({"right":-width+"px","height":height-67+"px"}).animate({"right":0},600);
                    menuToggle.show();
                    flag=false;
                }else{
                    $(".menu_toggle_dropDown_con").animate({"right":-width+"px"},600,function(){$("header .nav_header .menu_toggle_dropDown_con").remove();});
                    flag=true;
                }
            }

        });
    },
    screenChange:function(){
        $(window).resize(function(){
            var width=$(window).width();
            if(width>399){
                $(".menu_toggle_dropDown_con").css({"right":-"200px"});
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
        this.menuHover();
        //this.screenChange();
    }
};

var carousel= {
    bianliang: {"src": ["assets/images/lunboImg/carousel1.png", "assets/images/lunboImg/carousel2.png", "assets/images/lunboImg/carousel3.png"],"src2":["assets/images/lunboImg/carousel1_1.png","assets/images/lunboImg/carousel2_2.png","assets/images/lunboImg/carousel3_3.png"]},
    carouselOption:function(){
        var ul=$("<ul class='rslides'></ul>");
        for(var i=0;i<this.bianliang.src.length;i++){
            var li=$("<li></li>");
            var img=$("<img src='"+this.bianliang.src[i]+"' class='img'>");
            var img2=$($("<img src='"+this.bianliang.src2[i]+"' alt='' style='position: absolute' class='img2'>"));
            if(i==0){
                var buttonGroup=$("<div class='btngroup'></div>");
                var btn1=$("<button class='btn1'>了解更多</button>");
                var btn2=$("<button class='btn2'>查看业务</button>");
                buttonGroup.append(btn1).append(btn2);
                li.append(buttonGroup);
            }
            li.append(img).append(img2);
            ul.append(li);
        }
        $(".responsiveImgPlay").append(ul);
        $(".rslides .img2").eq(0).css({"left":"38%","top":"38%"});
        $(".rslides .img2").eq(1).css({"left":"26%"});
        $(".rslides .img2").eq(2).css({"left":"30%"});
        $(".rslides .btngroup .btn1").addClass("btn_blue");
        $(".rslides .btngroup button").hover(function(){
            $(this).addClass("btn_blue").siblings().removeClass("btn_blue");
        });

    },
    contentHover:function(){
        var cover=$("<div class='cover'></div>");
        var con=$("<div class='con'><img src='assets/images/index/content/i1.png' alt=''><span>盛帆电子股份专业能效监管平台</span></div>");
        $("article .content li").hover(function(){
            $(this).append(cover).append(con);
        });
    },
    init: function () {
        this.carouselOption();
        this.contentHover();
    }
};


var footer={
    bianliang:{"产品中心":["预设填充","预设填充","预设填充","预设填充","预设填充","预设填充","预设填充","预设填充","预设填充"],"企业简介":["董事长致辞","组织结构","品质保障","公司简介","资质荣誉"],"成功案例":["成功案例"],"服务项目":["服务项目","AO登陆"],"招纳贤士":["社会招聘","校园招聘"]},
    address:["武汉盛帆电子股份有限公司版权所有 鄂ICP备06778号","中国·武汉市江夏区经济开发区阳光大道9号"],
    tel:"027-81802561",
    footerOption:function(){
        var erweima=$("<div class='ewm'><img src='assets/images/index/erweima.png' alt=''></div>");
        $("footer .introduce").append(erweima);
        for(o in this.bianliang){
            var item_tit=$("<div class='item_tit'></div>");
            var item_add=$("<div class='item_add' style='position:absolute;right:0;top:0;display: none'>＋</div>");
            item_tit.html(o);
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
        if($(window).width()<789){
            $("footer .item_tit .item").css("display","none");
        }
        $(window).resize(function(){
            if($(this).width()<789){
                $("footer .item_tit .item").css("display","none");
            }else {
                $("footer .item_tit .item").css("display","block");
            }
        });
        $("footer .item_add").each(function(x){
            $(this).click(function(){
               $(this).siblings(".item").slideToggle();
            });
        });
    },
    init:function(){
        this.footerOption();
        this.addClick();
    }
};

var fullpage={
    cssRemake:function(){
        $(".aboutUs .header").css({"top":"-57px"});
        $(".aboutUs .introduce").hide();
        $(".aboutUs .introduce_idea li").eq(0).css({"left":-$(window).width()/2});
        $(".aboutUs .introduce_idea li").eq(2).css({"left":$(window).width()/2});
        $(".aboutUs .introduce_idea li").eq(1).css({"top":200});
        $("html").attr("style","none");
    },
    reload:function(){
            autoScrolling();
            $(window).resize(function(){
                autoScrolling();
            });
            $('#fullpage').fullpage({
                scrollingSpeed:1000,
                'verticalCentered': false,
                'css3': false,
                anchors: ['page1', 'page2','page3'],
                'navigation': false,
                'navigationPosition': 'right',
                afterLoad: function(anchorLink, index){
                    if(index==1){
                        $("article .header").animate({"left":0},1000);
                        $("article .content").animate({"left":0},1000);
                    }
                    if(index==2){
                        $(".aboutUs .header").animate({"top":0},1000);
                        $(".aboutUs .introduce").fadeIn(1000);
                        $(".aboutUs .introduce_idea li").eq(0).animate({"left":0},1000);
                        $(".aboutUs .introduce_idea li").eq(2).animate({"left":0},1000);
                        $(".aboutUs .introduce_idea li").eq(1).animate({"top":0},1000);
                    }
                },
                onLeave:function(index ,nextIndex,direction){
                    if(nextIndex==2 ){
                        $("article .header").animate({"left":$(window).width()},1000);
                        $("article .content").animate({"left":-$(window).width()},1000);
                    }
                    if(nextIndex==1){
                        $(".aboutUs .header").animate({"top":"-57px"},1000);
                        $(".aboutUs .introduce").fadeOut(1000);
                        $(".aboutUs .introduce_idea li").eq(0).animate({"left":-$(window).width()/2},1000);
                        $(".aboutUs .introduce_idea li").eq(2).animate({"left":$(window).width()/2},1000);
                        $(".aboutUs .introduce_idea li").eq(1).animate({"top":200},1000);
                    }
                }
            });
            function autoScrolling(){
                var $ww = $(window).width();
                if($ww < 993){
                    //$('#fullpage').fullpage({"onLeave":function(){return false},"afterLoad":function(){return false}});
                    $.fn.fullpage.destroy('all');
                }
            }

    },
    init:function() {
        fullpage.cssRemake();
        if($(window).width()>993){
            fullpage.reload()
        }else{
            $(".aboutUs .header").css({"top":0});
            $(".aboutUs .introduce").show();
            $(".aboutUs .introduce_idea li").eq(0).css({"left":0});
            $(".aboutUs .introduce_idea li").eq(2).css({"left":0});
            $(".aboutUs .introduce_idea li").eq(1).css({"top":0});
        }
        $(window).resize(function(){
            if($(this).width()>993){
                //fullpage.cssRemake();
                fullpage.reload();
            }else{
                $(".aboutUs .header").css({"top":0});
                $(".aboutUs .introduce").show();
                $(".aboutUs .introduce_idea li").eq(0).css({"left":0});
                $(".aboutUs .introduce_idea li").eq(2).css({"left":0});
                $(".aboutUs .introduce_idea li").eq(1).css({"top":0});
                $(".fullpage").remove();
                location.reload();
            }
        });
    }
};
 