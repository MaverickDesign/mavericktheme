<?php
/*
 * @package mavericktheme
 */
?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            if (!is_front_page()) {
                wp_title('');
                echo(' - ');
                bloginfo( 'name' );
            } else {
                bloginfo( 'name' );
            }
        ?>
    </title>
    <?php
    /*
     * Google Analytics
     */
    $mavSavedValue = esc_attr( get_option('mav_setting_google_analytics_id') );
    if (!empty($mavSavedValue)) : ?>
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', '<?php echo $mavSavedValue ?>', 'auto');
        ga('send', 'pageview');
        </script>
    <?php endif; ?>

    <?php
    /*
     * Wordpress Heads
     */
    wp_head();
    ?>
</head>
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=115651558903215&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <header id="mavid-page-header" class="mav-pg-header">
        <section class="mav-site-search-wrapper">
            <div class="mav-site-search-ctn">
                <form id="mavid-site-search" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
                    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Nhập từ khóa cần tìm...', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Tìm theo từ khóa', 'label' ) ?>" class="mav-search-input"/>
                    <button type="submit" title="Tìm kiếm" class="mav-btn-solid"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </section>
        <section id="mavid-sec-header-logo" class="mav-header-logo-ctn">
            <button id="mavid-mobile-menu-icon" class="mav-mobile-menu-icon fas fa-bars"></button>
            <div id="mavid-site-logo">
                <a href="<?php  bloginfo( 'url' );?>" title="Về trang chủ">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/maverick-logo-svg.php?back=193,49,34,1&mark=255,255,255,1&typo=255,255,255,0" alt="">
                </a>
            </div>
            <div class="mav-flex-row">
                <div id="mavid-header-socials" class="mav-header-socials-ctn">
                    <div class="mav-header-socials-wrapper">
                        <?php mavf_social_links(); ?>
                    </div>
                </div>
                <button class="mav-site-search-icon fas fa-search" title="Tìm kiếm nội dung"></button>
            </div>
        </section>
    </header>
    <?php
    /*
    * Header Menu
    **/
    if (current_theme_supports('menus')): ?>
        <section id="mavid-sec-header-menu" class="mav-sec-header-menu">
            <div class="mav-site-width mav-sticky-logo-wrapper">
                <div id="mavid-site-logo" class="mav-sticky-logo-ctn mav-margin-left mav-hide-on-mobile">
                    <a href="<?php  bloginfo( 'url' );?>" title="Về trang chủ" class="mav-sticky-logo">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/maverick-logo-svg.php?back=193,49,34,0&mark=255,255,255,1&typo=255,255,255,0" alt="">
                    </a>
                </div>
            </div>
            <div class="mav-header-menu-ctn mav-hide-on-mobile">
                <nav id="mavid-header-menu" class="mav-header-menu">
                    <?php
                    $mavMenuArgs = array(
                        'theme_location' => 'primary_menu',
                        'menu' => '',
                        'container' => false,
                        'container_class' => '',
                        'container_id' => '',
                        'menu_class' => '',
                        'menu_id' => '',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul>%3$s</u>',
                        'depth' => 0,
                        'walker' => ''
                    );
                    wp_nav_menu( $mavMenuArgs ); ?>
                </nav>
            </div>
        </section>
    <?php endif; ?>
    <?php
		/*
		 * Breadcrumb Section
		 * Only show up when the device is not phone
		 */
        if (!is_front_page() && !is_home() && !is_attachment()): ?>
            <section id="mavid-site-breadcrumbs" class="mav-site-breadcrumbs-ctn mav-hide-on-mobile">
                <?php mavf_breadcrumbs(); ?>
            </section>
        <?php endif;
    ?>