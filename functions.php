<?php

if ( ! function_exists( 'lab_setup' ) ) :

function lab_setup() {
	/*
	 * 自動フィードリンク
	 */
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * titleを自動で書き出し
	 */
//	add_theme_support( 'title-tag' );
	
	/*
	 * アイキャッチ画像を設定できるようにする
	 */
	add_theme_support( 'post-thumbnails', array( 'post','menu' ) );
	
	/*
	 * 検索フォーム、コメントフォーム、コメントリスト、ギャラリー、キャプションでHTML5マークアップの使用を許可します
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	/*
	 * テーマカスタマイザーにおける編集ショートカット機能の使用
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/*
	 * カスタムメニュー位置を定義
	 * 参照：
	 */
	register_nav_menus( array(
		'global' => 'グローバルナビ',
	) );
	
}
endif;
add_action( 'after_setup_theme', 'lab_setup' );

/*
* 動画や写真を投稿する際のコンテンツの最大幅を設定
*/
function lab_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lab_content_width', 300 );
}
add_action( 'after_setup_theme', 'lab_content_width', 0 );

add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 300, 200, true);
/*
* サイドバーを定義
*/
function lab_widgets_init() {
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar-1',
		'description'   => 'ここにウィジェットを追加',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'lab_widgets_init' );

//---------------------------------------------------------------------------
//スマホならtrue, タブレット・PCならfalseを返す
//---------------------------------------------------------------------------
function is_mobile(){
    $useragents = array(
 'iPhone',          // iPhone
 'iPod',            // iPod touch
 'Android',         // 1.5+ Android
 'dream',           // Pre 1.5 Android
 'CUPCAKE',         // 1.5+ Android
 'blackberry9500',  // Storm
 'blackberry9530',  // Storm
 'blackberry9520',  // Storm v2
 'blackberry9550',  // Storm v2
 'blackberry9800',  // Torch
 'webOS',           // Palm Pre Experimental
 'incognito',       // Other iPhone browser
 'webmate'          // Other iPhone browser
 );
 $pattern = '/'.implode('|', $useragents).'/i';
 return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

/*
* スクリプトを読み込み
*/
// JS・CSSファイルを読み込む
function link_files() {
    if( !is_admin() ){
	// WordPress提供のjquery.jsを読み込まない
	wp_deregister_script('jquery');
	// jQueryの読み込み
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', "", "0.1", false );
    }
	// サイト共通JS
	wp_enqueue_script( 'script_common', get_template_directory_uri() . '/js/common.js', array( 'jquery' ), '0.1', true );
    // サイト共通のCSSの読み込み
    wp_enqueue_style( 'style_reset', get_template_directory_uri().'/css/reset.css', array(), '0.1' );
    wp_enqueue_style( 'style_common', get_template_directory_uri().'/css/common.css', array(), '0.1' );
    wp_enqueue_style( 'style_common', get_template_directory_uri().'https://fonts.googleapis.com/css?family=Ubuntu:300&display=swap', array(), '0.1' );
    wp_enqueue_style( 'style_common', get_template_directory_uri().'https://fonts.googleapis.com/css?family=Sawarabi+Mincho', array(), '0.1' );
    if( is_front_page() || is_home() ){
        wp_enqueue_script( 'script_toppage', get_template_directory_uri() . '/js/toppage.js', array( 'jquery' ), '0.2', true );
        wp_enqueue_script( 'script_mainvisual_slider', get_template_directory_uri() . '/js/vegas.min.js', array( 'jquery' ), '0.1', true );
        wp_enqueue_style( 'style_toppage', get_template_directory_uri().'/css/toppage.css', array(), '0.1' );
        wp_enqueue_style( 'style_mainvisual_slider', get_template_directory_uri().'/css/vegas.min.css', array(), '0.1' );
    }
    if( is_single() || is_page() || is_archive() || is_404() ){
        wp_enqueue_script( 'script_subpage', get_template_directory_uri() . '/js/subpage.js', array( 'jquery' ), '0.1', true );
        wp_enqueue_style( 'style_subpage', get_template_directory_uri().'/css/subpage.css', array(), '0.1' );
    }
}

add_action('wp_enqueue_scripts', 'link_files');

//月別アーカイブに矢印とクラス追加、投稿件数をaタグ内に表示
function my_archives_link($link_html){
$link_html = preg_replace('@<li>@i', '<li><div class="news_archive_arrow"></div>', $link_html);
return $link_html;
}
function my_archives_link_postcount( $output ) {
  $output = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/',' ($2)</a>',$output);
  return $output;
}

add_filter('get_archives_link', 'my_archives_link');

add_filter( 'get_archives_link', 'my_archives_link_postcount' );

//記事の表示件数をページ毎に変更
  function myPreGetPosts( $query ) {
      if ( is_admin() || ! $query->is_main_query() ){
          return;
      }
      if ( $query->is_front_page() ) {
         $query->set('posts_per_page', 4);
      }
      if ( $query->is_archive() ) {
         $query->set('posts_per_page', 4);
      }
      if ( $query->is_date() ) {
         $query->set('posts_per_page', 4);
      }
      if ( $query->is_post_type_archive('menu') || $query->is_tax('bread_type')) {
         if( is_mobile() ){
         $query->set('posts_per_page', 6);
         }else{
         $query->set('posts_per_page', 9);
         }
      }
   }
   add_action('pre_get_posts','myPreGetPosts');

// カスタム投稿タイプの追加
function create_post_type() {
    register_post_type( 'menu', [ // 投稿タイプ名の定義
        'labels' => [
            'name'          => '商品一覧', // 管理画面上で表示する投稿タイプ名
            'singular_name' => 'menu',    // カスタム投稿の識別名
        ],
        'public'        => true,  // 投稿タイプをpublicにするか
        'has_archive'   => true, // アーカイブ機能ON/OFF
        'menu_position' => 5,     // 管理画面上での配置場所
        'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
        'supports'      => array(
                                'title',
                                'editor',
                                'thumbnail',
                                'custom-fields',
                                ),
         'show_ui' => true,
         'show_in_rest' => true
    ]);
}

add_action( 'init', 'create_post_type' );

// カスタムタクソノミーの追加
function create_taxonomy() {
    register_taxonomy(
        'bread_type',
        'menu',
        array(
        'hierachical' => true,
        'label' => '商品の分類',
        'query_var' => true,
        'rewite' => true,
        'singular_label' => '商品の分類',
        'show_ui' => true,
        'show_in_rest' => true,
        )
    );
}

add_action( 'init', 'create_taxonomy' );

// 記事の自動整形を無効化
remove_filter('the_content', 'wpautop');
// 抜粋の自動整形を無効化
remove_filter('the_excerpt', 'wpautop');

//固定ページの画像を相対パスで
function imagepassshort($arg) {
$content = str_replace('"img/', '"' . get_stylesheet_directory_uri() . '/img/', $arg);
return $content;
}
add_action('the_content', 'imagepassshort');

//問い合わせフォーム、メール生成
function my_mail( $Mail, $values, $Data ) {
    $automail_text_start = '※このメールはシステムからの自動返信です。'."\n\n".'Etoile Bakeryへのお問い合わせありがとうございました。'."\n\n".'以下の内容でお問い合わせを受け付けいたしました。'."\n".'1〜3営業日以内に、担当者よりご連絡いたしますので、今しばらくお待ちくださいませ。'."\n\n".'━━━━━━□■□　お問い合わせ内容　□■□━━━━━━'."\n\n";
    $automail_name = 'お名前：'.$Data->get( 'user_name' )."\n\n";
    $automail_mail = 'E-Mail：'.$Data->get( 'user_mail' )."\n\n";
    $automail_phone_number = '電話番号：'.$Data->get( 'user_phone_number' )."\n\n";
    $automail_postal_code ='';
    $automail_prefectures ='';
    $automail_address ='';
    $automail_contact_type ='';
    $automail_form_content ='お問い合わせ内容：'.$Data->get( 'user_form_content' )."\n\n";
    if($Data->get( 'user_postal_code' )){
    $automail_postal_code ='郵便番号：'.$Data->get( 'user_postal_code' )."\n\n";
    }
    if($Data->get( 'user_prefectures' )){
    $automail_prefectures ='都道府県：'.$Data->get( 'user_prefectures' )."\n\n";
    }
    if($Data->get( 'user_address' )){
    $automail_address ='ご住所：'.$Data->get( 'user_address' )."\n\n";
    }
    if($Data->get( 'user_contact_type' )){
    $automail_contact_type ='お問い合わせ種別：'.$Data->get( 'user_contact_type' )."\n\n";
    }
    $automail_text_end = '※本メールを受信された日より、3営業日を過ぎても担当より連絡がない場合は、大変お手数ではございますが、'."\n\n".'下記記載の連絡先へ直接ご連絡くださいますようお願い申し上げます。'."\n\n".'※このメールにお心あたりのない場合は、誠に恐れ入りますが、'."\n\n".'下記お問い合わせ先へご連絡いただけますようお願いいたします。'."\n\n".'———————————————————————'."\n".'Etoile Bakery'."\n".'TEL：042-649-1103（受付時間：平日8時〜18時）'."\n"."メール：amadatarou.hachiouji@gmail.com"."\n".'———————————————————————';
    $Mail->body = $automail_text_start.$automail_name.$automail_mail.$automail_phone_number.$automail_postal_code.$automail_prefectures.$automail_address.$automail_contact_type.$automail_form_content.$automail_text_end;
    return $Mail;
}
add_filter( 'mwform_auto_mail_mw-wp-form-109', 'my_mail', 10, 3 );

?>