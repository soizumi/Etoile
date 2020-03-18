    <?php get_header(); ?>
    
    <div class="content_wrapper">
        <div class="content_shadow"></div>
           
            <?php get_template_part('breadcrumbs'); ?>
            
        <div id="subpage_news_inner" class="content_inner">
        <div id="subpage_news_wrapper" class="subpage_content_wrapper">
           <?php while ( have_posts() ) : the_post(); ?>
               <div class="single_content_conteiner post-<?php the_ID(); ?>">
                   <h2><?php the_title(); ?></h2>
                   <div class="single_content">
                       <div class="single_content_date">
                           <?php the_time('Y.m.d'); ?>
                       </div>
                       <?php if( has_post_thumbnail() ): ?>
                           <div class="single_content_img">
                                <?php the_post_thumbnail('post-thumbnails' , array('alt' => the_title_attribute('echo=0'), 'title' => the_title_attribute('echo=0'))); ?>
                           </div>
                       <?php endif; ?>
                       <p class="single_content_text">
                           <?php the_content(); ?>
                       </p>
                   </div>
                   <div class="single_pager_wrapper">
                       <?php if(get_next_post()): ?>
                       <div class="single_pager_next">
                           <div>
                               <?php next_post_link('%link', '<span class="single_pager_next_arrow"></span>'); ?>
                               <span class="single_pager_title"><?php next_post_link('%link', '%title'); ?></span>
                           </div>
                       </div>
                       <?php else: ?>
                           <div class="single_pager_none"></div>
                       <?php endif; ?>
                       
                       <?php if(get_previous_post()): ?>
                       <div class="single_pager_prev">
                           <div>
                               <span class="single_pager_title"><?php previous_post_link('%link', '%title'); ?></span>
                               <?php previous_post_link('%link', '<span class="single_pager_prev_arrow"></span>'); ?>
                           </div>
                       </div>
                       <?php else: ?>
                           <div class="single_pager_none"></div>
                       <?php endif; ?>
                       
                   </div>
               </div>
           <?php endwhile; ?>
           <div class="subpage_news_archive">
               <ul class="subpage_news_archive_list">
                   <?php wp_get_archives( 'type=monthly&limit=4&show_post_count=1' ); ?>
                   <li>
                           <div class="news_archive_arrow"></div>
                           <a href="<?php echo esc_url( home_url( '/news' ) ); ?>">記事一覧</a>
                   </li>
               </ul>
           </div>
        </div>
        <div class="scroll_top"><a href="#"></a></div>
        </div>
    </div>
    
    <?php get_footer(); ?>