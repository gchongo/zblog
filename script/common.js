/*
Theme ID: ydtu
Author: 老白
Author QQ：525887672
Author Email：525887672@qq.com
Author URI: http://www.ylefu.com/
*/

(function(){
    //PC搜索
  $(function(){
    $("#search").click(function(){
      $("#search i").toggleClass('fa-search');
      $("#search i").toggleClass('fa-remove');
      $(".search").slideToggle(100);
      $(".nav").slideUp(100);
      $("#search i").toggleClass('mcolor');
    });
  });
  //移动端下拉
$(function(){
    $("#nav").click(function(){
        $("#nav i").toggleClass('fa-bars');
        $("#nav i").toggleClass('fa-remove');
        $(".nav").slideToggle(100);
        $(".search").slideUp(100);
        $("#nav i").toggleClass('mcolor');
    })
});
})();

//菜单跟随
$(function () {
    var nav=$("#side_gensui"); //得到导航对象
    var win=$(window); //得到窗口对象
    var sc=$(document);//得到document文档对象。
    win.scroll(function () {
        if (sc.scrollTop() >= 0) {
            nav.addClass("fixednav");
//			$(".navTmp").fadeIn();
        } else {
            nav.removeClass("fixednav");
//			$(".navTmp").fadeOut();
        }
    })
});

//======高亮
$(function () {
    var datatype = $("#monavber").attr("data-type");
    $(".navbar>li ").each(function () {
        try {
            var myid = $(this).attr("id");
            if ("index" == datatype) {
                if (myid == "nvabar-item-index") {
                    $("#nvabar-item-index").addClass("active");
                }
            } else if ("category" == datatype) {
                var infoid = $("#monavber").attr("data-infoid");
                if (infoid != null) {
                    var b = infoid.split(' ');
                    for (var i = 0; i < b.length; i++) {
                        if (myid == "navbar-category-" + b[i]) {
                            $("#navbar-category-" + b[i] + "").addClass("active");
                        }
                    }
                }
            } else if ("article" == datatype) {
                var infoid = $("#monavber").attr("data-infoid");
                if (infoid != null) {
                    var b = infoid.split(' ');
                    for (var i = 0; i < b.length; i++) {
                        if (myid == "navbar-category-" + b[i]) {
                            $("#navbar-category-" + b[i] + "").addClass("active");
                        }
                    }
                }
            } else if ("page" == datatype) {
                var infoid = $("#monavber").attr("data-infoid");
                if (infoid != null) {
                    if (myid == "navbar-page-" + infoid) {
                        $("#navbar-page-" + infoid + "").addClass("active");
                    }
                }
            } else if ("tag" == datatype) {
                var infoid = $("#monavber").attr("data-infoid");
                if (infoid != null) {
                    if (myid == "navbar-tag-" + infoid) {
                        $("#navbar-tag-" + infoid + "").addClass("active");
                    }
                }
            }
        } catch (E) {}
    });
    $("#monavber").delegate("a", "click", function () {
        $(".navbar>li").each(function () {
            $(this).removeClass("active");
        });
        if ($(this).closest("ul") != null && $(this).closest("ul").length != 0) {
            if ($(this).closest("ul").attr("id") == "munavber") {
                $(this).addClass("active");
            } else {
                $(this).closest("ul").closest("li").addClass("active");
            }
        }
    });
});
//返回顶部
$(function(){
 var $bottomTools = $('.bottom_tools');
 var $qrTools = $('.qr_tool');
 var qrImg = $('.qr_img');
 
 $(window).scroll(function () {
  var scrollHeight = $(document).height();
  var scrollTop = $(window).scrollTop();
  var $windowHeight = $(window).innerHeight();
  scrollTop > 50 ? $("#scrollUp").fadeIn(200).css("display","block") : $("#scrollUp").fadeOut(200);   
  $bottomTools.css("bottom", scrollHeight - scrollTop > $windowHeight ? 40 : $windowHeight + scrollTop + 40 - scrollHeight);
 });
 
 $('#scrollUp').click(function (e) {
  e.preventDefault();
  $('html,body').animate({ scrollTop:0});
 });

 $qrTools.hover(function () {
  qrImg.fadeIn();
 }, function(){
   qrImg.fadeOut();
 });
 
});
//视频自适应
function video_ok(){
    $('.article_content embed, .article_content video, .article_content iframe').each(function(){
        var w = $(this).attr('width'),
            h = $(this).attr('height')
        if( h ){
            $(this).css('height', $(this).width()/(w/h))
        }
    })
}

//$(document).ready(function() {
//  var a = $(".footer").find('a[href="https://www.52fb.cn/"], a[href="https://www.b5b6.com/"], a[href="https://www.ylefu.com/"]');
//  if ("前端老白" != a.text() && !a.is(":hidden") && "nofollow" != a.attr("rel") && "hidden" != a.css("visibility")) {
    // $("head").remove();
//    alert("不可删除“theme by zblog老白”作者版权链接，会收到此提醒！\n 如您是更新后遇到问题，请到主题管理中，启用一次本主题\n 修改的用户退回删除的版权代码或者再安装一次模板即可恢复，如不恢复清除浏览器缓存解决，或加Q:525887672 ");
//  }
});