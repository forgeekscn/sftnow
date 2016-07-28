$(function(){
    navBarOption.init();
    carousel.init();
    footer.init();
    // fullpage.init();
});


//导航条内容加载
var navBarOption={
    contentReload:function(){
        $("header .nav_header ul.menu li").each(function(x){
            if(x==3){
                var span=$("<span class='dropHover' style='display: block;top: 52px'></span>");
                $(this).addClass("liHover");
                $(this).append(span);
            }
        });
        $(window).scroll(function(){
            $("header").css({"position":"fixed","top":0,"left":0,"right":0,"z-index":200,"background":"white"});
        });
    },
    menuToggleClick:function(){
        var flag=true;
        $(".nav_header .menu_toggle").click(function(){
            var width=$(window).width();
            var height=$(window).height();
            if(width>399){
                if(flag){
                    $(".menu_toggle_dropDown_con").css({"height":height+"px"});
                    $("body").animate({"right":"200px"},600);
                    $(".menu_toggle_dropDown_con").show();
                    flag=false;
                }else{
                    $("body").animate({"right":"0px"},600,function(){$("header .nav_header .menu_toggle_dropDown_con").hide()});
                    flag=true;
                }
            }else{
                if(flag){
                    $(".menu_toggle_dropDown_con").css({"right":-width+"px","height":height-67+"px"}).animate({"right":0},600);
                    $(".menu_toggle_dropDown_con").show();
                    flag=false;
                }else{
                    $(".menu_toggle_dropDown_con").animate({"right":-width+"px"},600,function(){$("header .nav_header .menu_toggle_dropDown_con").remove();});
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
        this.menuHover();
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
        $("article .content li").hover(function(){
            $(this).append(cover);
            $(this).find(".content").css("display","inline");
        },function(){
            $(this).find(".content").css("display","none");
        });
    },
    init: function () {
        this.carouselOption();
        this.contentHover();
    }
};


var footer={
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
        this.addClick();
    }
};
