<?php
/**
 * @package mavericktheme
 */

get_header(); ?>
<!-- Page content starts here -->

<main id="mavid-page-main">
    <div class="mav-page__wrp">
        <div class="mav-page__ctn">
            <!-- Page Header -->
            <?php get_template_part( 'template-parts/mav-page__header' ); ?>

            <!-- Page Content -->
            <section class="mav-sec__wrp">
                <div class="mav-sec__ctn">

                    <div class="mav-post__content--wrp">
                        <div class="mav-post__content--ctn">
                            <div class="mav-post__content">
                                    <?php
                                        the_post();
                                        if ( function_exists( 'mavf_post_content_modifier' ) ) {
                                            $mav_json_file = TEMPLATE_DIR . '/template-parts/mav-patterns.json';
                                            if ( file_exists( $mav_json_file ) ) {
                                                mavf_post_content_modifier($mav_json_file);
                                            }
                                        }
                                        the_content();
                                    ?>
                                </div>
                            </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
</main>

<!-- Page content ends here -->
<?php get_footer(); ?>