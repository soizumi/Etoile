<?php get_header(); ?>
    
    <div class="content_wrapper">
        <div class="content_shadow"></div>
            
            <?php get_template_part('breadcrumbs'); ?>
            
        <div id="subpage_news_inner" class="content_inner">
        <div id="subpage_news_wrapper" class="subpage_content_wrapper">
           <div class="subpage_news_article">
               <ul class="subpage_news_article_list">
                   <?php if( have_posts() ): ?>
                       <?php while( have_posts() ):the_post(); ?>
                       <li id="post-<?php the_ID();  ?>">
                           <a href="<?php the_permalink(); ?>">
                               <?php if( has_post_thumbnail() ): ?>
                               <div class="subpage_news_image"><?php the_post_thumbnail('post-thumbnails' , array('alt' => the_title_attribute('echo=0'), 'title' => the_title_attribute('echo=0'))); ?></div>
                               <?php else : ?>
                               <div class="subpage_news_noimage"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/news_noimage.png" alt=""></div>
                               <?php endif; ?>
                               <div class="subpage_news_contents">
                                    <div class="subpage_news_date"><?php the_time('Y.m.d'); ?></div>
                                    <div class="subpage_news_title">
                                        <?php
                                            if(mb_strlen($post->post_title)>12) {
                                                $title= mb_substr($post->post_title,0,12) ;
                                                echo $title . '<span class="omission">...</span>';
                                            } else {
                                              echo $post->post_title;
                                            }
                                        ?>
                                    </div>
                                    <div class="subpage_news_text">
                                        <p><?php the_content(); ?></p>
                                        <span class="subpage_news_text_data"><?php the_content(); ?></span>
                                    </div>
                                </div>
                            </a>
                       </li>
                       <?php endwhile; ?>
                   <?php endif;?>
               </ul>
               <div class="subpage_pager">
                   <?php
                        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                        $year = get_post_time('Y');
                        $month = get_post_time('m');
                        $args = array(
                            'post_type' => get_post_type(),
                            'numberposts' => 4,
                            'posts_per_page' => 4,
                            'paged' => $paged,
                            'category_name' => 'news',
                            'date_query' => array(
                             array(
                               'year'  => $year,
                               'month' => $month,
                             )
                             ),
                        );
                        $arc_query = new WP_Query($args);
                        if ( $posts ) :
                            foreach ( $posts as $post ) :
                                setup_postdata( $post );
                   ?>
                   <?php
                         endforeach;
                         endif;
                         global $wp_rewrite;
                        $paginate_base = get_pagenum_link(1);
                        if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
                            $paginate_format = '';
                            $paginate_base = add_query_arg('paged','%#%');
                        }
                        else{
                            $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') . user_trailingslashit('page/%#%/','paged');
                            $paginate_base .= '%_%';
                        }
                        // ページャを出力する
                        echo paginate_links(array(
                            'base' => $paginate_base,
                            'format' => $paginate_format,
                            'total' => $arc_query->max_num_pages, // トータルのページ数をセット
                            'mid_size' => 1,
                            'current' => ($paged ? $paged : 1), // 現在のページ数をセット
                            'type'    => 'list',
                            'prev_text' => '<span class="subpage_pager_prev"></span>',
                            'next_text' => '<span class="subpage_pager_next"></span>',
                            )
                        );
                    ?>
               </div>
                   
           </div>
           <div class="subpage_news_archive">
               <ul class="subpage_news_archive_list">
                   <?php wp_get_archives( 'type=monthly&limit=4&show_post_count=1' ); ?>
                   <li>
                           <div class="news_archive_arrow"></div>
                           <a href="<?php echo esc_url( get_category_link(8) ); ?>">記事一覧</a>
                   </li>
               </ul>
           </div>
        </div>
        <div class="scroll_top"><a href="#"></a></div>
        </div>
    </div>
    
    <?php get_footer(); ?>