
$(function() {
    $(".rslides").responsiveSlides({
        auto: true,             // Boolean: 设置是否自动播放, true or false
        speed: 700,            // Integer: 动画持续时间，单位毫秒
        timeout: 4000,          // Integer: 图片之间切换的时间，单位毫秒
        pager: true,           // Boolean: 是否显示页码, true or false
        nav: false,             // Boolean: 是否显示左右导航箭头（即上翻下翻）, true or false
        random: false,          // Boolean: 随机幻灯片顺序, true or false
        pause: true,           // Boolean: 鼠标悬停到幻灯上则暂停, true or false
        pauseControls: true,    // Boolean: 悬停在控制板上则暂停, true or false
        prevText: "Previous",   // String: 往前翻按钮的显示文本
        nextText: "Next",       // String: 往后翻按钮的显示文本
        maxwidth: "",           // Integer: 幻灯的最大宽度
        navContainer: ".rslides",       // Selector: Where controls should be appended to, default is after the 'ul'
        manualControls: "",     // Selector: 声明自定义分页导航
        namespace: "rslides",   // String: 修改默认的容器名称
        before: function(){},   // Function: 回调之前的参数
        after: function(){}     // Function: 回调之后的参数
    });

    $(".rslides_tabs").find("a").html("");
    //$(".rslides").hover(function(){$(".rslides_tabs").stop().fadeIn()},function(){$(".rslides_tabs").stop().fadeOut()});
});












