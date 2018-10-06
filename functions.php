<?php
/**
 * @package mavericktheme
*/

// Use for HTML sources
// Eg: http://localhost/maverick.vn/wp-content/themes/mavericktheme
define( "TEMPLATE_URI", get_template_directory_uri() );
// Use for PHP sources
// Eg: D:\_Projects\www\maverick.vn/wp-content/themes/mavericktheme
define( "TEMPLATE_DIR", get_template_directory() );

/* Remove Generator Meta Tag */
remove_action( 'wp_head', 'wp_generator' );

/**
 * Vendors
 */
if ( file_exists( TEMPLATE_DIR.'/vendor/Mobile_Detect.php' ) ) {

    include_once TEMPLATE_DIR.'/vendor/Mobile_Detect.php';

    function mavf_mobile_detect()
    {
        $mav_device_detect = new Mobile_Detect;
        $mav_device = 'desktop';

        if ( $mav_device_detect->isMobile() ) {
            $mav_device = 'mobile';
        }

        if ( $mav_device_detect->isTablet() ) {
            $mav_device = 'tablet';
        }

        return $mav_device;
    }
}

/**
 * Admin Functions
 */

require TEMPLATE_DIR. '/inc/admin/mav-admin-functions.php';
require TEMPLATE_DIR. '/inc/admin/mav-admin-theme-supports.php';

require TEMPLATE_DIR. '/inc/admin/mav-admin-enqueue-styles.php';
require TEMPLATE_DIR. '/inc/admin/mav-admin-enqueue-scripts.php';

// Social Accounts
require TEMPLATE_DIR.'/inc/mav-social-accounts.php';

// Custom post types
require TEMPLATE_DIR. '/inc/admin/mav-admin-cpt.php';

// Header Menu Walker
require TEMPLATE_DIR. '/inc/mav-walker-nav.php';

// BreadCrumbs
require TEMPLATE_DIR. '/inc/mav-breadcrumbs.php';

require TEMPLATE_DIR. '/inc/mav-ajax-load-posts.php';

// Post Query
require TEMPLATE_DIR. '/inc/mav-post-query.php';

// Google Map
require TEMPLATE_DIR. '/inc/mav-google-map.php';

// Sliders
if ( file_exists( TEMPLATE_DIR.'/inc/mav-slider.php' ) ) {
    include TEMPLATE_DIR.'/inc/mav-slider.php';
}

if ( file_exists( TEMPLATE_DIR.'/inc/mav-uni-slider.php' ) ) {
    include TEMPLATE_DIR.'/inc/mav-uni-slider.php';
}

// Carousel
require TEMPLATE_DIR.'/inc/mav-carousel.php';

// Post Grid
require TEMPLATE_DIR. '/inc/mav-post-grid.php';

// Featured Post
require TEMPLATE_DIR. '/inc/mav-post-feature.php';

require TEMPLATE_DIR. '/inc/mav-items-grid.php';

require TEMPLATE_DIR. '/inc/mav-ajax-form.php';

// Post Accordion
require TEMPLATE_DIR. '/inc/mav-post-accordion.php';

require TEMPLATE_DIR. '/inc/mav-post-modal.php';

require TEMPLATE_DIR. '/inc/mav-tab-view.php';

require TEMPLATE_DIR. '/inc/mav-content-modify.php';

require TEMPLATE_DIR. '/inc/mav-form.php';

require TEMPLATE_DIR. '/inc/mav-misc.php';

function mavf_post_categories( $mav_post_id )
{
    // Get post categories
    $cats = wp_get_post_categories( $mav_post_id );
    printf('<ul class="mav-category__list">');
        foreach ( $cats as $category ) {
            $current_cat = get_cat_name( $category );
            $cat_link = get_category_link( $category );
            printf('<li class="mav-category__item">');
                printf(
                    '<a href="%1$s" title="%3$s %2$s">%2$s</a>',
                    $cat_link, $current_cat, __( 'Xem các bài chuyên mục', 'mavericktheme' )
                );
            echo "</li>";
        }
    echo '</ul>';
}

function mavf_post_date()
{
    $archive_year  = get_the_time('Y');
    $archive_month = get_the_time('m');
    $archive_day   = get_the_time('d');
    $mav_date_link = get_day_link( $archive_year, $archive_month, $archive_day);
    printf(
        '<span class="mav-post__date" title="%2$s %1$s"><a href="%3$s">%1$s</a></span>',
        get_the_date(), __( 'Xem các bài đăng ngày', 'mavericktheme' ), $mav_date_link
        );
}