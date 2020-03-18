<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!--    <meta charset="<?php bloginfo('charset'); ?>">-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#3e120c">
    <link rel="icon" type="image/x-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icon_smartphone.png">
    <title>
       
        <?php if ( is_page('about') ) : ?>
        Etoileについて
        <?php elseif( is_post_type_archive('menu') ) : ?>
        商品一覧
        <?php elseif( is_tax('bread_type') ): ?>
            <?php echo( single_tag_title() ); ?>
        <?php elseif( is_page('access') ) : ?>
        アクセス
        <?php elseif( is_category() ) : ?>
        お知らせ
        <?php elseif( is_date() ) : ?>
            <?php echo get_post_time( 'Y年m月' ); ?>のお知らせ
        <?php elseif( is_page('contact') || is_page('contact-confirm') || is_page('contact-error') || is_page('contact-complete') ) : ?>
            お問い合わせ
        <?php elseif( is_404() ) : ?>
        お探しのページは見つかりません
        <?php elseif( is_single() ) : ?>
        <?php the_title(); ?>
        <?php endif; ?>
        
        <?php if( is_front_page() || is_home() ): ?>
        <?php else : ?>
         - 
        <?php endif; ?>
        八王子発、焼きたてパンのお店　Etoile(エトワール)
        
    </title>

    <?php wp_head(); ?>
</head>

<body class="preload" <?php body_class(); ?>>
    <div class="loading_wrapper">
        <div class="loading_animation"></div>
    </div>
    <header>
        <div class="header_menu_wrapper">
            <div class="header_menu">
            <div class="logo_header"><a href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/main_logo.png" alt=""></a></div>
                <ul class="menu_pc">
                    <li><a href="<?php echo esc_url( home_url() ); ?>">
                            <?php if( is_front_page() || is_home() ): ?>
                                <div class="menu_header_current">HOME</div>
                                <div>トップページ</div>
                                <div class="menu_accent_current"></div>
                            <?php else: ?>
                            <div class="menu_header_other">HOME</div>
                                <div>トップページ</div>
                                <div class="menu_accent_destination"></div>
                            <?php endif; ?>
                        </a></li>
                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'about' )->ID ) ) ; ?>">
                            <?php if( is_page('about') ): ?>
                                <div class="menu_header_current">ABOUT</div>
                                <div>Etoileについて</div>
                                <div class="menu_accent_current"></div>
                            <?php else: ?>
                            <div class="menu_header_other">ABOUT</div>
                                <div>Etoileについて</div>
                                <div class="menu_accent_destination"></div>
                            <?php endif; ?>
                        </a></li>
                    <li><a href="<?php echo esc_url( get_post_type_archive_link( 'menu' ) ); ?>">
                        <?php if( is_post_type_archive('menu') || is_tax('bread_type') ): ?>
                                <div class="menu_header_current">MENU</div>
                                <div>商品紹介</div>
                                <div class="menu_accent_current"></div>
                            <?php else: ?>
                            <div class="menu_header_other">MENU</div>
                                <div>商品紹介</div>
                                <div class="menu_accent_destination"></div>
                            <?php endif; ?>
                        </a></li>
                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'access' )->ID ) ) ; ?>">
                            <?php if( is_page('access') ): ?>
                                <div class="menu_header_current">ACCESS</div>
                                <div>アクセス</div>
                                <div class="menu_accent_current"></div>
                            <?php else: ?>
                            <div class="menu_header_other">ACCESS</div>
                                <div>アクセス</div>
                                <div class="menu_accent_destination"></div>
                            <?php endif; ?>
                        </a></li>
                    <li><a href="<?php $cat_news = get_category_by_slug('news'); echo get_category_link( $cat_news->cat_ID); ?>">
                            <?php if( is_category() || is_date() || is_single() ): ?>
                                <div class="menu_header_current">NEWS</div>
                                <div>お知らせ</div>
                                <div class="menu_accent_current"></div>
                            <?php else: ?>
                            <div class="menu_header_other">NEWS</div>
                                <div>お知らせ</div>
                                <div class="menu_accent_destination"></div>
                            <?php endif; ?>
                        </a></li>
                    <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' )->ID ) ) ; ?>">
                            <?php if( is_page('contact') || is_page('contact-confirm') || is_page('contact-error') || is_page('contact-complete') ): ?>
                                <div class="menu_header_current">CONTACT</div>
                                <div>お問い合わせ</div>
                                <div class="menu_accent_current"></div>
                            <?php else: ?>
                            <div class="menu_header_other">CONTACT</div>
                                <div>お問い合わせ</div>
                                <div class="menu_accent_destination"></div>
                            <?php endif; ?>
                        </a></li>
                </ul>
            <div class="menu_sp_wrapper">
                <input type="checkbox" id="menu_sp_checkbox">
                <label for="menu_sp_checkbox" class="menu_sp_button">
                    <div class="menu_sp_button_line1">
                        <div class="line1_light"></div>
                    </div>
                    <div class="menu_sp_button_line2">
                        <div class="line2_light"></div>
                    </div>
                    <div class="menu_sp_button_line3">
                        <div class="line3_light"></div>
                    </div>
                        <div class="menu_sp_button_text">
                        <div class="menu_sp_button_text_open">OPEN</div>
                        <div class="menu_sp_button_text_close">CLOSE</div>
                    </div>
                </label>
                <div class="menu_sp_cover"></div>
                <div class="menu_sp">
                    <ul>
                        <li><a href="<?php echo esc_url( home_url() ); ?>" <?php if( is_front_page() || is_home() ): ?>class="menu_sp_current"<?php endif;?> >HOME</a></li>
                        <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'about' )->ID ) ) ; ?>" <?php if( is_page('about') ) : ?>class="menu_sp_current"<?php endif;?> >ABOUT</a></li>
                        <li><a href="<?php echo esc_url( get_post_type_archive_link( 'menu' ) ); ?>" <?php if( is_post_type_archive('menu') || is_tax('bread_type') ) : ?>class="menu_sp_current"<?php endif;?> >MENU</a></li>
                        <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'access' )->ID ) ) ; ?>" <?php if( is_page('access') ) : ?>class="menu_sp_current"<?php endif;?> >ACCESS</a></li>
                        <li><a href="<?php $cat_news = get_category_by_slug('news'); echo get_category_link( $cat_news->cat_ID); ?>" <?php if( is_category() || is_date() || is_single() ) : ?>class="menu_sp_current"<?php endif;?> >NEWS</a></li>
                        <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' )->ID ) ) ; ?>"<?php if( is_page('contact') || is_page('contact-confirm') || is_page('contact-error') || is_page('contact-complete') ) : ?>class="menu_sp_current"<?php endif;?>>CONTACT</a></li>
                        <li class="menu_sp_social">
                            <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social_twitter.svg" alt=""></a>
                            <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social_instagram.svg" alt=""></a>
                            <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social_facebook.svg" alt=""></a>
                        </li>
                    </ul>
                        <div class="menu_sp_copyright">copyright &copy; Etoile Bakery. all rights reserved.</div>
                </div>
            </div>
            </div>
        </div>
        <?php if( is_front_page() || is_home() ): ?>
        <div class="mainvisual">
            <div class="mainvisual_highlight"></div>
            <h1 class="maincopy">あなたの毎日に<span class="punctuation_end">、</span><br>ひときれのかがやきを<span class="punctuation_end">。</span></h1>
            <ul class="slide_pager">
                <li class="pager_button slide_pager_active" data-index="0"></li>
                <li class="pager_button" data-index="1"></li>
                <li class="pager_button" data-index="2"></li>
            </ul>
        </div>
        <?php else: ?>
        <div class="mainvisual_subpage">
            <div class="mainvisual_highlight"></div>
            <h1 class="subpage_title"><?php if ( is_page() ) : ?><?php $slug_name = basename( get_permalink() ); if( $slug_name == "contact-confirm" || $slug_name == "contact-error" || $slug_name == "contact-complete" ){ $slug_name = "contact"; } echo( strtoupper( $slug_name ) ); ?><?php elseif( is_post_type_archive('menu') ) : ?>MENU<?php elseif( is_tax('bread_type') ): ?>MENU<?php elseif( is_archive() ) : ?>NEWS<?php elseif( is_single() ) : ?>NEWS<?php elseif( is_404() ) : ?>404 Not Found<?php endif; ?></h1>
        </div>
        <?php endif; ?>
    </header>