           <div class="subpage_menu_category">
               <ul class="subpage_menu_category_list">
                   <li>
                      <a
                          href="<?php echo esc_url( get_term_link( 'french_bread', 'bread_type' ) ); ?>"
                          <?php
                            if( is_tax('bread_type', 'french_bread') ){
                            echo('id="menu_category_current"');
                          } ?>
                      >
                          <div class="menu_category_arrow"></div>
                          <span>フランスパン</span>
                      </a>
                   </li>
                   <li>
                      <a
                          href="<?php echo esc_url( get_term_link( 'bread', 'bread_type' ) ); ?>"
                          <?php
                            if( is_tax('bread_type', 'bread') ){
                            echo('id="menu_category_current"');
                          } ?>
                      >
                          <div class="menu_category_arrow"></div>
                          <span>食パン</span>
                      </a>
                   </li>
                   <li>
                      <a
                          href="<?php echo esc_url( get_term_link( 'sweet_ban', 'bread_type' ) ); ?>"
                          <?php
                            if( is_tax('bread_type', 'sweet_ban') ){
                            echo('id="menu_category_current"');
                          } ?>
                      >
                          <div class="menu_category_arrow"></div>
                          <span>菓子パン</span>
                      </a>
                   </li>
                   <li>
                      <a
                          href="<?php echo esc_url( get_term_link( 'deli_sandwiches', 'bread_type' ) ); ?>"
                          <?php
                            if( is_tax('bread_type', 'deli_sandwiches') ){
                            echo('id="menu_category_current"');
                          } ?>
                      >
                          <div class="menu_category_arrow"></div>
                          <span class="menu_category_longer">惣菜パン・サンドウィッチ</span>
                      </a>
                   </li>
                   <li>
                      <a
                          href="<?php echo esc_url( get_term_link( 'drink', 'bread_type' ) ); ?>"
                          <?php
                            if( is_tax('bread_type', 'drink') ){
                            echo('id="menu_category_current"');
                          } ?>
                      >
                          <div class="menu_category_arrow"></div>
                          <span>お飲み物</span>
                      </a>
                   </li>
                   <li>
                       <a href="<?php echo esc_url( get_post_type_archive_link( 'menu' ) ); ?>"
                          <?php
                            if( is_post_type_archive('menu') ){
                            echo('id="menu_category_current"');
                          } ?>
                       >
                           <div class="menu_category_arrow"></div>
                           <span>商品一覧</span>
                       </a>
                   </li>
               </ul>
           </div>