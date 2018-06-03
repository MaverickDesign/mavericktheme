<?php
/*
 * @package mavericktheme
 */
?>
<article id="mavid-post-<?php the_ID(); ?>" class="mav-post">
    <header id="mavid-post-header" class="mav-post-header">
        <?php
            if (has_post_thumbnail()): ?>
                <div id="mavid-post-feature-image" class="mav-post-feature-image" style="background-image: url(<?php echo(get_the_post_thumbnail_url(get_the_ID(),'full'));  ?>)">
                </div>
            <?php endif;
        ?>
        <?php if (!is_attachment()): ?>
            <div id="mavid-post-info" class="mav-post-info-wrapper">
                <div class="mav-pg-ctn mav-post-info-ctn">
                <?php
                    if (function_exists(mavf_single_category)):
                        printf(
                            sprintf('<span class="mav-post-info-category" title="%2$s %3$s">%1$s</span>',
                            mavf_single_category(),
                            __('Xem các bài viết chuyên mục','mavericktheme'),
                            mavf_get_single_category())
                        );
                        printf(sprintf('<span class="mav-post-info-date" title="%2$s">%1$s</span>', get_the_date(), __('Ngày đăng','mavericktheme')));
                        printf(sprintf('<span class="mav-post-info-author" title="%2$s">%1$s</span>', get_the_author(), __('Tác giả','mavericktheme')));
                    endif;
                ?>
                </div>
            </div>
        <?php endif; ?>
        <?php
            if (is_single() && !is_attachment()) {
                printf(sprintf('<div class="mav-pg-ctn"><h1 id="mavid-post-title">%1$s</h1><div>', get_the_title()));
            }
        ?>
    </header>
    <section id="mavid-post-content" class="mav-post-content-wrapper mav-margin-bottom">
        <div class="mav-pg-ctn mav-post-content-ctn mav-post-content">
            <?php the_content(); ?>
        </div>
    </section>
    <footer id="mavid-post-footer" class="mav-post-footer-wrapper mav-post-footer">
        <div class="mav-pg-ctn mav-post-footer-ctn">
            <?php if (has_tag()): ?>
                <div class="mav-post-tags-wrapper">
                    <div class="mav-post-tags-ctn">
                        <h4>Thẻ liên kết</h4>
                        <?php the_tags( '<ul id="mavid-post-tag-list" class="mav-post-tag-list"><li>', '</li><li>', '</li></ul>' ); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="mav-post-navigation-wrapper">
                <div class="mav-post-navigation-ctn">
                    <h4>Các bài viết khác</h4>
                    <nav class="mav-post-navigation">
                        <?php previous_post_link('%link', '%title'); ?>
                        <?php next_post_link('%link', '%title'); ?>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
</article>
<?php
/*
 * Related Articles
 */

$categories = get_the_category();

if ( !empty($categories) && $categories[0]->count > 2 ): ?>
    <section id="mavid-sec-related-posts" class="mav-related-posts-wrapper">
        <div class="mav-flex-center">
            <h2 class="mav-sec-title">Cùng chuyên mục
            <?php
                if (!empty($categories)) {
                    printf(sprintf('<a href="%1$s" title="%3$s %2$s"><strong class="mav-no-break">%2$s</strong></a>', esc_url(get_category_link($categories[0]->term_id)), esc_html($categories[0]->name),__('Xem tất cả bài trong chuyên mục','mavericktheme')));
                }
            ?>
            </h2>
        </div>
        <?php
            // Check if total post is greater than number of post to display
            $mavNumberOfPostsDisplay = 4 ? $categories[0]->count > 4 : $categories[0]->count;
            if (function_exists(mavf_carousel)){
                $mavArgs = array(
                    'number_of_posts'           => 6,
                    'number_of_posts_display'   => $mavNumberOfPostsDisplay,
                    'categories'                => array($categories[0]->term_id),
                );
                echo '<div class="mav-related-posts-ctn">';
                    mavf_carousel($mavArgs);
                echo '</div>';
            }
        ?>
        <div class="mav-site-width mav-flex-center">
            <?php
                printf(sprintf('<a href="%1$s" class="mav-btn-solid" title="Xem tất cả bài trong chuyên mục %2$s">Xem đầy đủ</a>',esc_url( get_category_link( $categories[0]->term_id ) ), esc_html( $categories[0]->name )));
            ?>
        </div>
    </section>
<?php endif;