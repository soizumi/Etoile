<div class="breadcrumbs">
            <span class="breadcrumbs_other"><a href="<?php echo esc_url( home_url() ); ?>">HOME</a></span>
            <span class="breadcrumbs_arrow"></span>
            <?php if ( is_page() ) : ?>
            <span class="breadcrumbs_current">
                <?php
                $slug_name = basename( get_permalink() );
                if( $slug_name == "contact-confirm" || $slug_name == "contact-error" || $slug_name == "contact-complete" ){
                    $slug_name = "contact";
                }
                echo( strtoupper( $slug_name ) );
                ?>
            </span>
            <?php elseif( is_post_type_archive('menu') ) : ?>
                <span class="breadcrumbs_current">MENU</span>
            <?php elseif( is_tax('bread_type') ): ?>
                <span class="breadcrumbs_other">
                    <a href="<?php echo esc_url( get_post_type_archive_link( 'menu' ) ); ?>">MENU</a>
                </span>
                <span class="breadcrumbs_arrow"></span>
                <span class="breadcrumbs_current"><?php echo( single_tag_title() ); ?></span>
            <?php elseif( is_category() ) : ?>
                <span class="breadcrumbs_current">NEWS</span>
            <?php elseif( is_date() ) : ?>
                <span class="breadcrumbs_other">
                    <a href="<?php $cat_news = get_category_by_slug('news'); echo get_category_link( $cat_news->cat_ID); ?>">NEWS</a>
                </span>
                <span class="breadcrumbs_arrow"></span>
                <span class="breadcrumbs_current">
                    <?php echo get_post_time( 'Y年m月' ); ?>
                </span>
            <?php elseif( is_single() ) : ?>
                <span class="breadcrumbs_other">
                    <a href="<?php $cat_news = get_category_by_slug('news'); echo get_category_link( $cat_news->cat_ID); ?>">NEWS</a>
                </span>
                <span class="breadcrumbs_arrow"></span>
                <span class="breadcrumbs_current">
                    <?php
                        if( is_mobile() ){
                            if(mb_strlen($post->post_title)>8) {
                            $title= mb_substr($post->post_title,0,8) ;
                            echo $title . '...';
                            }
                        }
                        elseif(mb_strlen($post->post_title)>15) {
                            $title= mb_substr($post->post_title,0,15) ;
                            echo $title . '...';
                        } else {
                          echo $post->post_title;
                        }
                    ?>
                </span>
            <?php elseif( is_404() ) : ?>
                <span class="breadcrumbs_current">404 NOT FOUND</span>
            <?php endif; ?>
</div>