//ローディング画面
$(window).on('load', function () {
    $('.loading_wrapper').delay(500).fadeOut(500);
});
function stopload(){
    $('.loading_wrapper').delay(500).fadeOut(500);
}
setTimeout('stopload()',10000);
//読み込み時transition無効
$(window).on('load' , function() {
$("body").removeClass("preload");
});
//全体をメニュー分下げる
$(function(){
    var menuHeight = $('.header_menu_wrapper').outerHeight();
    $('.mainvisual').css('margin-top', menuHeight + 'px');
    $('.menu_sp').css('padding-top', menuHeight + 'px');
});
$(window).on("resize", function() {
    var menuHeight = $('.header_menu_wrapper').outerHeight();
    $('.menu_sp').css('padding-top', menuHeight + 'px');
});
//SP版メニュー
function scrollStop(event) {
event.preventDefault();
}
$(function(){
    $('.menu_sp_button').on('click' , function() {
        if($("#menu_sp_checkbox").prop('checked')) {
            document.removeEventListener('touchmove', scrollStop, {
                passive: false
            });
            document.removeEventListener('wheel', scrollStop, {
                passive: false
            });
            $('.line1_light').removeClass('line1_animate');
            $('.line2_light').removeClass('line2_animate');
            $('.line3_light').removeClass('line3_animate');
            $('.menu_sp_button_text_open').removeClass('animate_open');
            $('.menu_sp_button_text_close').removeClass('animate_close');
            $('.line1_light').addClass('line1_animate_r');
            $('.line2_light').addClass('line2_animate_r');
            $('.line3_light').addClass('line3_animate_r');
            $('.menu_sp_button_text_open').addClass('animate_open_r');
            $('.menu_sp_button_text_close').addClass('animate_close_r');
        }else{
            document.addEventListener('touchmove', scrollStop, {
                passive: false
            });
            document.addEventListener('wheel', scrollStop, {
                passive: false
            });
            $('.line1_light').removeClass('line1_animate_r');
            $('.line2_light').removeClass('line2_animate_r');
            $('.line3_light').removeClass('line3_animate_r');
            $('.menu_sp_button_text_open').removeClass('animate_open_r');
            $('.menu_sp_button_text_close').removeClass('animate_close_r');
            $('.line1_light').addClass('line1_animate');
            $('.line2_light').addClass('line2_animate');
            $('.line3_light').addClass('line3_animate');
            $('.menu_sp_button_text_open').addClass('animate_open');
            $('.menu_sp_button_text_close').addClass('animate_close');

        }
    });
});
//ページ上部へスムーススクロール
$(function(){
$('a[href^="#"]').click(function(){
    var speed = 2000;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
    });
});