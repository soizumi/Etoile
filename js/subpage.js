//トップへ戻るボタン
$(function(){
$(window).on('load' , function() {
    var scrollHeight = $(document).height();
    var scrollPosition = $(window).height() + $(window).scrollTop();
    var footHeight = $("footer").innerHeight();
    if (window.matchMedia( "(max-width: 640px)" ).matches) {
        mainvisual_height = $(".mainvisual_subpage").outerHeight();
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
    if ($(this).scrollTop() > 400) {
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
            mainvisual_height = $(".mainvisual_subpage").outerHeight();
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
        if ($(this).scrollTop() > 400) {
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
//背景図形
function shape2_sizing(){
    console.log('図形2の高さ取得');
    var shape2_height = $(".content_wrapper").outerHeight();
    $(".content_shadow").css('height',shape2_height * 0.9);
}
function shape1_sizing(){
    var shape1_height = $(".content_shadow").outerHeight();
    var shape1_width = $(".content_shadow").outerWidth();
    $(".mainvisual_highlight").css({height:shape1_height * 0.15,width:shape1_width * 0.15});
}
function shape2_sizing_sp(){
    var shape2_height = $(".content_wrapper").outerHeight();
    $(".content_shadow").css('height',shape2_height * 0.5);
}
function shape1_sizing_sp(){
    var shape1_height = $(".content_shadow").outerHeight();
    var shape1_width = $(".content_shadow").outerWidth();
    $(".mainvisual_highlight").css({height:shape1_height * 0.15,width:shape1_width * 0.15});
}
$(window).on("load resize", function(){
if (window.matchMedia( "(max-width: 640px)" ).matches) {
$(function(){
    shape2_sizing_sp();
    shape1_sizing_sp();
});
}else{
$(function(){
    shape2_sizing();
    shape1_sizing();
});
}
});
//$(window).on("resize", function() {
//if ($(window).width() > 640){
//$(function(){
//    shape2_sizing();
//    shape1_sizing();
//});
//}else{
//$(function(){
//    shape2_sizing_sp();
//    shape1_sizing_sp();
//});
//}
//});

//抜粋の文字数制御

function excerpt_script_news(){
   if (window.matchMedia( "(max-width: 640px)" ).matches) {
   var count = 21;
   }
   else{
   var count = 44;
   }
    $('.subpage_news_text p').each(function() {
          var thisText = $(this).next('.subpage_news_text_data').text();
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
    $('.subpage_news_text_data').hide();
    excerpt_script_news();
});

//単独投稿ページ、隣接記事へのリンクの文字数制御
function single_pager_string(){
    var count = 12;
    $('.single_pager_title a').each(function() {
    var thisText = $(this).text();
    var textLength = thisText.length;
    if (textLength > count) {
      var showText = thisText.substring(0, count);
      var insertText = showText += '…';
      $(this).html(insertText);
    };
    });
}

$(window).on('load resize' , function() {
    single_pager_string();
});

//お問い合わせフォーム
//エラーの出ている部分に色をつける

$(function(){
    $('.form_element_wrapper').has('span.error').addClass('error_include');
});

//確認画面で入力されていない要素を隠す
$(function(){
    $('.mw_wp_form_confirm .form_element_wrapper input,.mw_wp_form_confirm .form_element_wrapper .confirm_form_element_wrapper input').each(function() {
        if($(this).val() == ""){
            $(this).parents('.form_element_wrapper').hide();
        }
    });
});
