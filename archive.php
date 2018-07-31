<?php
/**
 * @package maverick-theme
 */
?>
<?php get_header(); ?>

<!-- Page content starts here -->
<main id="mavid-page-main-content">
<?php

    // Get user setting to show sidebar in blog page
    $mavSidebar = esc_attr(get_option('mav_setting_blog_page_sidebar'));

    $mavSectionClass = $mavSidebar ? 'mav-has-sidebar' : 'mav-site-width';

    printf('<section class="%1$s">', $mavSectionClass);
        if (have_posts()) {
            printf('<section id="mavid-post-index" class="mav-post-index-wrapper">');
                printf('<div class="mav-post-index-ctn mav-grid-col-%1$s">', esc_attr(get_option('mav_setting_blog_page_columns')));
                    while (have_posts()) {
                        the_post();
                        // Get post template
                        get_template_part( 'template-parts/content', get_post_format() );
                    }
                echo '</div>';
                    /*
                    * Post paginate links
                    */
                echo '<div id="mavid-paginate-links" class="mav-paginate-links-wrapper">';
                    echo '<div class="mav-paginate-links-ctn">';
                            $mavArgs = array(
                                'prev_text'          => __('Trang trước','maverick-theme'),
                                'next_text'          => __('Trang sau','maverick-theme'),
                                'before_page_number' => '',
                                'after_page_number'  => ''
                            );
                            echo paginate_links($mavArgs);
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }

    /**
     * Sidebar widgets
     */
    if ($mavSidebar) {
        get_sidebar();
    }
    echo '</section>';
    ?>
</main>
<!-- Page content ends here -->

<?php get_footer(); ?>