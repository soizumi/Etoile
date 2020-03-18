    <?php get_header(); ?>
    
    <div class="introduction_wrapper">
        <div class="top_about">
           <div class="top_about_inner">
                <h2><img class="ornament_l" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/heading_ornament_l.svg" alt="">ABOUT<img  class="ornament_r" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/heading_ornament_r.svg" alt=""></h2>
                <h3>お客様の日常に、活力と彩りを。<br class="br_pc">
                <span class="punctuation_start">「</span>Etoile」はそんな想いから、<br class="br_pc">
                生まれたパン屋です。</h3>
                <p><span class="punctuation_start">「</span>Etoile(エトワール)」は2009年に創業した八王子のパン屋です。体に優しい天然酵母と国産の小麦を使用した色とりどりのパンや、ゆったりとした時間を愉しめるカフェスペースとともに、皆様をお待ちしています。</p>
                <div class="button_red"><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'about' )->ID ) ) ; ?>"><span>Read more</span><svg viewBox="0 0 42.41 8.71" class="arrow"><defs></defs><polyline points="0 7.71 40 7.71 33 0.71"/></svg></a></div>
            </div>
        </div>
        <div class="introduction_shadow"></div>
    </div>
    
    <div class="video_top">
        <div class="video_wrapper">
            <video src="<?php echo esc_url( get_template_directory_uri() ); ?>/video/video_top.mp4" muted></video>
            <div class="video_button"></div>
        </div>
    </div>
    
    <div class="content_wrapper">
           <div class="content_highlight"></div>
           <div class="content_shadow"></div>
           <div class="content_inner">
                <h2><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/heading_ornament_l.svg" alt="" class="ornament_l" >MENU<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/heading_ornament_r.svg" alt="" class="ornament_r"></h2>
                <h3 class="subheading_center">フランスパンをはじめとした人気商品の数々です。</h3>
                <ul class="product_top">
                    <li>
                        <a href="<?php echo esc_url( get_term_link( 'french_bread', 'bread_type' ) ); ?>" id="product_image1">
                            <div class="product_individual_wrapper">
                                <div>French bread</div>
                                <div>フランスパン</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( get_term_link( 'bread', 'bread_type' ) ); ?>" id="product_image2">
                            <div class="product_individual_wrapper">
                                <div>Bread</div>
                                <div>食パン</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( get_term_link( 'sweet_ban', 'bread_type' ) ); ?>" id="product_image3">
                            <div class="product_individual_wrapper">
                                <div>Sweet ban</div>
                                <div>菓子パン</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( get_term_link( 'deli_sandwiches', 'bread_type' ) ); ?>" id="product_image4">
                           <div class="product_individual_wrapper">
                                <div id="product_longer">Deli & Sandwiches</div>
                                <div>惣菜パン・サンドウィッチ</div>
                           </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( get_term_link( 'drink', 'bread_type' ) ); ?>" id="product_image5">
                            <div class="product_individual_wrapper">
                                <div>Drink</div>
                                <div>お飲み物</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( get_post_type_archive_link( 'menu' ) ); ?>" class="button_product">
                            <div class="product_individual_wrapper">
                                <div>See All</div>
                                <svg viewBox="0 0 42.41 8.71" class="arrow"><defs></defs><polyline points="0 7.71 40 7.71 33 0.71"/></svg>
                            </div>
                        </a>
                    </li>
                </ul>
            <h2><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/heading_ornament_l.svg" alt="" class="ornament_l">NEWS<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/heading_ornament_r.svg" alt="" class="ornament_r"></h2>
            <ul class="news_article">
                <?php
                       if( have_posts() ): ?>
                       <?php while( have_posts() ):the_post(); ?>
                        <li id="post-<?php the_ID();  ?>">
                           <a href="<?php the_permalink(); ?>">
                               <?php if( has_post_thumbnail() ): ?>
                                   <div class="news_image"><?php the_post_thumbnail('post-thumbnails' , array('alt' => the_title_attribute('echo=0'), 'title' => the_title_attribute('echo=0'))); ?></div>
                                <?php else : ?>
                                   <div class="news_noimage"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/news_noimage.png" alt=""></div>
                                <?php endif; ?>
                                <div class="news_contents">
                                    <div class="news_date"><?php the_time('Y.m.d'); ?></div>
                                    <div class="news_title">
                                        <?php
                                            if(mb_strlen($post->post_title)>11) {
                                            $title= mb_substr($post->post_title,0,11) ;
                                              echo $title . '<span class="omission">...</span>';
                                            } else {
                                              echo $post->post_title;
                                            }
                                        ?>
                                    </div>
                                    <div class="news_text">
                                        <p><?php the_content(); ?></p>
                                        <span class="news_text_data"><?php the_content(); ?></span>
                                    </div>
                                </div>
                           </a>
                        </li>
                        <?php endwhile; ?>
                <?php endif;?>
            </ul>
            <div class="button_red button_news"><a href="<?php $cat_news = get_category_by_slug('news'); echo get_category_link( $cat_news->cat_ID); ?>"><span>View List</span><svg viewBox="0 0 42.41 8.71" class="arrow"><defs></defs><polyline points="0 7.71 40 7.71 33 0.71"/></svg></a></div>
            <div class="scroll_top"><a href="#"></a></div>
        </div>
    </div>
    
    <?php get_footer(); ?>