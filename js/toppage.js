//トップへ戻るボタン
$(function(){
$(window).on('load' , function() {
    var scrollHeight = $(document).height();
    var scrollPosition = $(window).height() + $(window).scrollTop();
    var footHeight = $("footer").innerHeight();
    if (window.matchMedia( "(max-width: 640px)" ).matches) {
        mainvisual_height = $(".mainvisual").outerHeight();
        if ($(this).scrollTop() > mainvisual_height) {
        $(".scroll_top").css({opacity:"1",visibility:"visible"});
        }
        if ( scrollHeight - scrollPosition  <= footHeight ) {
            $(".scroll_top").css({
            "position":"absolute",
            "bottom": "10vw",
            });
        }else{
            $(".scroll_top").css({
            "position":"fixed",
            "bottom":"10vw"
            });
        }
    }else{
    if ($(this).scrollTop() > 720) {
        $(".scroll_top").css({opacity:"1",visibility:"visible"});
        }
        if ( scrollHeight - scrollPosition  <= footHeight ) {
            $(".scroll_top").css({
            "position":"absolute",
            "bottom": "72px",
            });
        }else{
            $(".scroll_top").css({
            "position":"fixed",
            "bottom":"72px"
            });
        }
    }
});
$(window).on("scroll", function() {
    var scrollHeight = $(document).height();
    var scrollPosition = $(window).height() + $(window).scrollTop();
    var footHeight = $("footer").innerHeight();
    if (window.matchMedia( "(max-width: 640px)" ).matches) {
            mainvisual_height = $(".mainvisual").outerHeight();
            if ($(this).scrollTop() > mainvisual_height) {
                $(".scroll_top").css({opacity:"1",visibility:"visible"});
            }
            else{
            $(".scroll_top").css({opacity:"0",visibility:"hidden"});
            }
            if ( scrollHeight - scrollPosition  <= footHeight ) {
                $(".scroll_top").css({
                "position":"absolute",
                "bottom": "10vw",
                });
            }else{
                $(".scroll_top").css({
                "position":"fixed",
                "bottom":"10vw"
                });
            }
    }else{
        if ($(this).scrollTop() > 720) {
            $(".scroll_top").css({opacity:"1",visibility:"visible"});
        }else{
            $(".scroll_top").css({opacity:"0",visibility:"hidden"});
        }
        if ( scrollHeight - scrollPosition  <= footHeight ) {
            $(".scroll_top").css({
                "position":"absolute",
                "bottom":"72px",
            });
            } else {
                $(".scroll_top").css({
                    "position":"fixed",
                    "bottom": "72px"
                });
            }
        }
});
})
//メインビジュアルの背景のコントロール
$(function(){
var img_dir = window.location.href + "wp-content/themes/etoile_theme/";
console.log(img_dir);
$('.mainvisual').vegas({
slides: [
 { src: img_dir + 'img/main-visual1.jpg' },
 { src: img_dir + 'img/main-visual2.jpg' },
 { src: img_dir + 'img/main-visual3.jpg' }
],
 preload: true,
 delay: 4000,
 timer: false,
 transitionDuration: 3000,
 firstTransitionDuration: 3000,
 walk: function (index, slideSettings) {
//         console.log("Slide index " + index + " image " + slideSettings.src);
 $('.slide_pager li').removeClass('slide_pager_active');
 $('.slide_pager li[data-index=' + index + ']').addClass('slide_pager_active');
 $('slide_pager_active').css('opacity','1')
}
});
});
$(function(){
$('.pager_button').on('click', function(e) {
index = $(this).data('index');
$('.mainvisual').vegas('options', 'transition', 'fade').vegas('jump', index);
e.preventDefault();
});
});
$(window).on("resize", function() {
if ($(window).width() > 640){
$(".vegas-container").css('height','720px');
}else{
$(".vegas-container").css('height','80vw');
}
});
$(window).on("resize", function() {
var headHeight = $('.header_menu').outerHeight();
$(".vegas-container").css('margin-top',headHeight);
});
//動画のコントロール
$(function(){
var video = $('.video_top video');
function control_hidden(){
    $('.video_button').css({opacity:"0",visibility:"hidden"});
    video.css('filter','brightness(100%)');
    video.get(0).play();
}
function control_open(){
    $('.video_button').css({opacity:"1",visibility:"visible"});
    video.css('filter','brightness(70%)');
}
$('.video_button').on('click', function(){
  control_hidden();
});
video.on('click', function(){
  control_hidden();
});
video.get(0).addEventListener('play',
    function(){
        video.off('click')
        video.on('click', function(){
            $(this).get(0).pause();
            control_open();
        })
},false);
video.get(0).addEventListener('pause',
    function(){
        video.on('click', function(){
        control_hidden();
    });
},false)
$(video).on('ended',function(){
  control_open();
});
$('.video_top').hover(
function(){
    $('.video_button').css('opacity','0.3');
},
function(){
    $('.video_button').css('opacity','1');
}
);
});
//背景図形
function shape2_sizing(){
var shape2_height = $(".introduction_wrapper").outerHeight();
$(".introduction_shadow").css('height',shape2_height * 0.9);
}
function shape1_sizing(){
    var shape1_height = $(".introduction_shadow").outerHeight();
    var shape1_width = $(".introduction_shadow").outerWidth();
    $(".mainvisual_highlight").css({height:shape1_height * 0.3,width:shape1_width * 0.3});
}
function shape3_sizing(){
    var shape3_height = $(".introduction_shadow").outerHeight();
    var shape3_width = $(".introduction_shadow").outerWidth();
    $(".content_highlight").css({height:shape3_height * 0.3,width:shape3_width * 0.3});
}
function shape4_sizing(){
    var shape4_height = $(".introduction_shadow").outerHeight();
    var shape4_width = $(".introduction_shadow").outerWidth();
    $(".content_shadow").css({height:shape4_height * 2.5,width:shape4_width * 2.5});
}
function shape2_sizing_sp(){
    var shape2_height = $(".introduction_wrapper").outerHeight();
    $(".introduction_shadow").css('height',shape2_height * 0.9);
}
function shape1_sizing_sp(){
    var shape1_height = $(".introduction_shadow").outerHeight();
    var shape1_width = $(".introduction_shadow").outerWidth();
    $(".mainvisual_highlight").css({height:shape1_height * 0.3,width:shape1_width * 0.3});
}
function shape3_sizing_sp(){
    var shape3_height = $(".introduction_shadow").outerHeight();
    var shape3_width = $(".introduction_shadow").outerWidth();
    $(".content_highlight").css({height:shape3_height * 0.2,width:shape3_width * 0.2});
}
function shape4_sizing_sp(){
    var shape4_height = $(".introduction_shadow").outerHeight();
    var shape4_width = $(".introduction_shadow").outerWidth();
    $(".content_shadow").css({height:shape4_height * 1,width:shape4_width * 1});
}
if (window.matchMedia( "(max-width: 640px)" ).matches) {
    shape2_sizing();
    shape1_sizing();
    shape3_sizing();
    shape4_sizing();
}else{
    shape2_sizing_sp();
    shape1_sizing_sp();
    shape3_sizing_sp();
    shape4_sizing_sp();
}
$(window).on("resize", function() {
if ($(window).width() > 640){
    shape2_sizing_sp();
    shape1_sizing_sp();
    shape3_sizing_sp();
    shape4_sizing_sp();
}else{
    shape2_sizing();
    shape1_sizing();
    shape3_sizing();
    shape4_sizing();
}
});

//抜粋の文字数制御

function excerpt_script_news(){
   if (window.matchMedia( "(max-width: 640px)" ).matches) {
   var count = 19;
   }
   else{
   var count = 32;
   }
    $('.news_text p').each(function() {
          var thisText = $(this).next('.news_text_data').text();
          var thisText_surface = thisText;
          var textLength = thisText.length;
          if (textLength > count) {
              var showText = thisText_surface.substring(0, count);
              var insertText = showText += '<span class="omission">…</span';
              $(this).html(insertText);
          };
      });
    }

$(window).on('load resize' , function() {
    $('.news_text_data').hide();
    excerpt_script_news();
});