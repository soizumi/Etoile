    <?php get_header(); ?>
    
    <div class="content_wrapper">
        <div class="content_shadow"></div>
           
            <?php get_template_part('breadcrumbs'); ?>
            
        <div class="content_inner">
        <div class="subpage_content_wrapper">
            <div class="notfound_wrapper">
                <div class="notfound_img"></div>
                <div class="notfound_heading notfound_content">
                <h2><span>申し訳ありませんが、</span>お探しの<br class="br_pc">ページは<br class="br_sp">見つかりませんでした。</h2>
                </div>
                <p class="notfound_content">EtolieのWEBサイトにご訪問いただきありがとうございます。お客様がお探しのページは削除されたか、移動した可能性があります。大変恐縮ですが、トップページより、目的のページを再度ご確認ください。</p>
                <div class="single_pager_prev notfound_content">
                    <a href="<?php echo esc_url( home_url() ); ?>">
                         <span>トップページへ</span>
                       <span class="single_pager_prev_arrow"></span>
                   </a>
                </div>
            </div>
        </div>
        <div class="scroll_top"><a href="#"></a></div>
        </div>
    </div>
    
    <?php get_footer(); ?>