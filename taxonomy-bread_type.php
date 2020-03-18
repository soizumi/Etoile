    <?php get_header(); ?>
    
    <div class="content_wrapper">
        <div class="content_shadow"></div>
                   
            <?php get_template_part('breadcrumbs'); ?>
            
        <div id="subpage_menu_inner" class="content_inner">
        <div id="subpage_menu_wrapper" class="subpage_content_wrapper">
           <div class="subpage_menu_item">
               <ul class="subpage_menu_item_list">
                   <?php if( have_posts() ): ?>
                       <?php while( have_posts() ):the_post(); ?>
                           <li id="post-<?php the_ID();  ?>">
                               <?php if( has_post_thumbnail() ): ?>
                                   <div class="menu_item_picture"><?php the_post_thumbnail('post-thumbnails' , array('alt' => the_title_attribute('echo=0'), 'title' => the_title_attribute('echo=0'))); ?></div>
                               <?php else : ?>
                                   <div class="menu_item_picture"></div>
                               <?php endif; ?>
                               <div class="menu_item_name"><?php the_title() ?></div>
                           </li>
                         <?php endwhile; ?>
                    <?php endif ?>
               </ul>
               <div class="subpage_pager">
                   <?php
                        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                        if( is_mobile() ){
                        $current_term = $term->slug;
                        $args = array(
                            'post_type' => get_post_type(),
                            'numberposts' => 6,
                            'posts_per_page' => 6,
                            'paged' => $paged,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'bread_type',
                                    'field' => 'slug',
                                    'terms' => $current_term,
                                )
                            ),
                        );
                        }else{
                        $current_term = $term->slug;
                        $args = array(
                            'post_type' => get_post_type(),
                            'numberposts' => 9,
                            'posts_per_page' => 9,
                            'paged' => $paged,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'bread_type',
                                    'field' => 'slug',
                                    'terms' => $current_term,
                                )
                            ),
                        );
                        }
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
           
           <?php get_template_part('subpage_menu_sidebar'); ?>
           
        </div>
        <div class="scroll_top"><a href="#"></a></div>
        </div>
    </div>
    
    <?php get_footer(); ?>