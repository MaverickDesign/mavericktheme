<?php
/**
 * @package mavericktheme
 * Default Post List Style
 */

// Get post ID
$mav_id = get_the_ID();
// Get post type
$mav_post_type = get_post_type( $mav_id );
// Get post sticky class
$mav_sticky_class = is_sticky( $mav_id ) ? 'sticky' : '';
// Get post title
$mav_title = get_the_title();
// Get post permalink
$mav_permalink = get_the_permalink( $mav_id );

// Get display style option
$mav_display_style = ( get_option( 'mav_setting_blog_page_display_style' ) ) ? esc_attr( get_option( 'mav_setting_blog_page_display_style' ) ) : 'card';

// Get queried style from ajax load post function
$mav_queried_style = get_query_var('mav_card_style');
if ( ! empty( $mav_queried_style ) ) {
    $mav_display_style = $mav_queried_style;
}

// Set card style
$mav_style = 'data-style="'.$mav_display_style.'"';

// Brand Logo Background
$mav_background_logo = function_exists( 'mavf_brand_logo_background' ) ? mavf_brand_logo_background( true, '240,240,240,1', '0,0,0,0.05', '0,0,0,0' ) : '';

// Card wrapper
printf('<div class="mav-card__wrp" %1$s>', $mav_style );
    // Card container
    printf('<div class="mav-card__ctn" %1$s>', $mav_style );

        /**
         * The post
         * ========
         */

        // Post wrapper
        printf( '<div class="mav-card__content--wrp">' );
            // Post container
            printf( '<article id="mavid-%2$s-%3$s" %1$s data-post-type="%2$s" data-id="%3$s" class="mavjs-card__content--ctn mav-card__content--ctn %4$s">',
                $mav_style, $mav_post_type, $mav_id, $mav_sticky_class
                );

                /**
                 * Card Header
                 * ===========
                 */

                // Card header wrapper
                printf( '<header class="mav-card__header--wrp">' );
                    // Card header container
                    printf( '<div class="mav-card__header--ctn">');

                        // Featured image wrapper
                        printf('<div class="mav-card__post__thumbnail--wrp" %1$s>', $mav_background_logo);
                            // Featured image container
                            printf('<figure class="mav-card__post__thumbnail--ctn">');
                                // Featured image
                                if ( has_post_thumbnail() ) {
                                    printf(
                                        '<a href="%2$s" title="%3$s"><div class="mav-card__post__thumbnail" %1$s></div></a>',
                                        mavf_get_post_thumbnail_url( 'large' ), $mav_permalink, $mav_title
                                    );
                                }
                            echo '</figure>';
                        echo '</div>';

                    echo '</div>';
                echo '</header>';

                /**
                 * Card Body
                 * =========
                 */

                // Card body wrapper
                printf('<div class="mav-card__body--wrp">');
                    // Card body container
                    printf( '<div class="mav-card__body--ctn">' );

                        // Header wrapper
                        printf('<header class="mav-card__body__header--wrp">');
                            // Header container
                            printf( '<div class="mav-card__body__header--ctn">' );

                                // Post Date
                                printf('<div class="mav-card__post__date--wrp">');
                                    printf('<div class="mav-card__post__date--ctn mav-post-info" data-type="date">');
                                        mavf_post_date();
                                    echo '</div>';
                                echo '</div>';

                                // Post Categories
                                printf('<div class="mav-card__post__categories--wrp">');
                                    printf('<div class="mav-card__post__categories--ctn mav-post-info" data-type="category">');
                                        if ( function_exists('mavf_post_categories') ) {
                                            mavf_post_categories( $mav_id );
                                        }
                                    echo '</div>';
                                echo '</div>';

                            echo '</div>';
                        echo '</header>';

                        // Body
                        printf('<div class="mav-card__body__body--wrp">');
                            printf( '<div class="mav-card__body__body--ctn">' );

                                // Title
                                printf('<div class="mav-card__post__title--wrp">');
                                    printf('<div class="mav-card__post__title--ctn">');
                                        printf(
                                            '<h2 class="mav-card__post__title"><a href="%2$s" title="%3$s %1$s">%1$s</a></h2>',
                                            $mav_title, $mav_permalink, __( 'Xem bài', 'mavericktheme' )
                                        );
                                    echo '</div>';
                                echo '</div>';

                                // Excerpt
                                if ( has_excerpt() ):
                                    // Excerpt wrapper
                                    printf('<div class="mav-card__post__excerpt--wrp">');
                                        // Excerpt container
                                        printf('<div class="mav-card__post__excerpt--ctn">');
                                            printf('<p class="mav-card__post__excerpt">%1$s</p>', get_the_excerpt());
                                        echo '</div>';
                                    echo '</div>';
                                endif;

                                printf('<div>');
                                    printf('<div class="mav-margin-top-sm">');
                                        printf(
                                            '<a href="%1$s" class="mav-link__read_more" title="%2$s %3$s">%2$s<i class="fas fa-long-arrow-alt-right mav-padding-left-xs"></i></a>',
                                            $mav_permalink, __( 'Xem chi tiết', 'mavericktheme' ), $mav_title
                                        );
                                    echo '</div>';
                                echo '</div>';

                            echo '</div>';
                        echo '</div>';

                        // Footer
                        printf('<footer class="mav-card__body__footer--wrp">');
                            printf('<div class="mav-card__body__footer--ctn">');

                                // Tags
                                printf('<div class="mav-card__post__tags--wrp">');
                                    printf('<div class="mav-card__post__tags--ctn">');
                                        the_tags('<ul class="mav-tag-list"><li>', '</li><li>', '</li></ul>');
                                    echo '</div>';
                                echo '</div>';

                            echo '</div>';
                        echo '</footer>';

                    echo '</div>';
                echo '</div>';

                /**
                 * Card Footer
                 * ===========
                 */

                // Footer wrapper
                printf('<footer class="mav-card__footer--wrp">');
                    // Footer container
                    printf( '<div class="mav-card__footer--ctn">' );

                        printf('<ul class="mav-card__socials--ctn">' );
                            if ( ! empty( get_option( 'mav_setting_enable_facebook_app' ) ) ) :
                                echo '<li title="'.__( 'Chia sẻ Facebook', 'mavericktheme' ).'"><div class="fb-share-button" data-href="'.$mav_permalink.'" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.$mav_permalink.'%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div></li>';
                            endif;
                            printf(
                                '<li title="%1$s"><i class="mavjs-copy-link fas fa-link"></i><span data-hidden class="mavjs-copy-link-text"></span></li>',
                                __( 'Sao chép liên kết', 'mavericktheme' )
                            );
                        echo '</u>';

                    echo '</div>';
                echo '</footer>';

            // End of post container
            echo '</article>';
        // End of post wrapper
        echo '</div>';

    // End of card container
    echo '</div>';
// End of card wrapper
echo '</div>';