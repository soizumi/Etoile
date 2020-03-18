
    <?php get_header(); ?>

    <div class="content_wrapper">
        <div class="content_shadow"></div>
                   
            <?php get_template_part('breadcrumbs'); ?>
            
        <div class="content_inner">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="subpage_content_wrapper post-<?php the_ID(); ?>">
               <?php the_content() ?>
            </div>
        <?php endwhile ?>
        <div class="scroll_top"><a href="#"></a></div>
        </div>
    </div>
    
    <?php get_footer(); ?>