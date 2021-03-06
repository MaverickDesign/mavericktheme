<?php
/**
 * @package mavericktheme
 */

/**
 * Section: Theme Colors
 */
add_settings_section(
    'mavsec__theme_styles__theme_colors',
    __( 'Thiết lập màu sắc', 'mavericktheme' ),
    'mavf__theme_styles__theme_colors',
    'mav_admin__setting_section__theme_styles'
);

function mavf__theme_styles__theme_colors()
{
    printf( '<p>%1$s</p>', __( 'Thiết lập màu sắc cho website', 'mavericktheme' ) );
}

/* Primary Color */
register_setting(
    'mavog_theme_styles', 'mav_setting_color_primary'
);

add_settings_field(
    'mavid_theme_styles_color_primary',
    __( 'Màu chính', 'mavericktheme' ),
    'mavf_theme_styles_color_primary',
    'mav_admin__setting_section__theme_styles',
    'mavsec__theme_styles__theme_colors'
);

function mavf_theme_styles_color_primary()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_color_primary' ) );
    printf(
        '<input type="text" name="mav_setting_color_primary" value="%1$s" placeholder="%2$s" data-visual="short"/>',
        $mav_saved_value, __( 'Ví dụ: #'.random_color(), 'mavericktheme' )
    );
    mavf_color_preview_box( $mav_saved_value );
}

/* Accent Color */
register_setting(
    'mavog_theme_styles',
    'mav_setting_color_accent'
);

add_settings_field(
    'mavid_theme_styles_color_accent',
    __( 'Màu phụ', 'mavericktheme' ),
    'mavf_theme_styles_color_accent',
    'mav_admin__setting_section__theme_styles',
    'mavsec__theme_styles__theme_colors'
);

function mavf_theme_styles_color_accent()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_color_accent' ) );
    printf(
        '<input type="text" name="mav_setting_color_accent" value="%1$s" placeholder="%2$s" data-visual="short"/>',
        $mav_saved_value, __( 'Ví dụ: #'.random_color(), 'mavericktheme' )
    );
    mavf_color_preview_box( $mav_saved_value );
}

/* Site header color */
register_setting(
    'mavog_theme_styles',
    'mav_setting_color_site_header_background'
);

add_settings_field(
    'mavid_theme_styles_color_site_header_background',
    __( 'Site Header Background', 'mavericktheme' ),
    'mavf_theme_styles_color_site_header_background',
    'mav_admin__setting_section__theme_styles',
    'mavsec__theme_styles__theme_colors'
);

function mavf_theme_styles_color_site_header_background()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_color_site_header_background' ) );
    printf(
        '<input type="text" name="mav_setting_color_site_header_background" value="%1$s" placeholder="%2$s" data-visual="short"/>',
        $mav_saved_value, __( 'Ví dụ: #'.random_color(), 'mavericktheme' )
    );
    mavf_color_preview_box( $mav_saved_value );
}

/* Header menu text color */
register_setting(
    'mavog_theme_styles',
    'mav_setting_color_site_header_menu_text'
);

add_settings_field(
    'mavid_theme_styles_color_site_header_menu_text',
    __( 'Header menu text', 'mavericktheme' ),
    'mavf_theme_styles_color_site_header_menu_text',
    'mav_admin__setting_section__theme_styles',
    'mavsec__theme_styles__theme_colors'
);

function mavf_theme_styles_color_site_header_menu_text()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_color_site_header_menu_text' ) );
    printf(
        '<input type="text" name="mav_setting_color_site_header_menu_text" value="%1$s" placeholder="%2$s" data-visual="short"/>',
        $mav_saved_value, __( 'Ví dụ: #'.random_color(), 'mavericktheme' )
    );
    mavf_color_preview_box( $mav_saved_value );
}

/* Site header menu background */
register_setting(
    'mavog_theme_styles',
    'mav_setting_color_site_header_menu_background'
);

add_settings_field(
    'mavid_theme_styles_color_site_header_menu_background',
    __( 'Header menu background', 'mavericktheme' ),
    'mavf_theme_styles_color_site_header_menu_background',
    'mav_admin__setting_section__theme_styles',
    'mavsec__theme_styles__theme_colors'
);

function mavf_theme_styles_color_site_header_menu_background()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_color_site_header_menu_background' ) );
    printf(
        '<input type="text" name="mav_setting_color_site_header_menu_background" value="%1$s" placeholder="%2$s" data-visual="short"/>',
        $mav_saved_value, __( 'Ví dụ: #'.random_color(), 'mavericktheme' )
    );
    mavf_color_preview_box( $mav_saved_value );
}

/* Footer copyright text color */
register_setting(
    'mavog_theme_styles',
    'mav_setting_color_site_footer_copyright_text'
);

add_settings_field(
    'mavid_theme_styles_color_site_footer_copyright_text',
    __( 'Footer copyright text', 'mavericktheme' ),
    'mavf_theme_styles_color_site_footer_copyright_text',
    'mav_admin__setting_section__theme_styles',
    'mavsec__theme_styles__theme_colors'
);

function mavf_theme_styles_color_site_footer_copyright_text()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_color_site_footer_copyright_text' ) );
    printf(
        '<input type="text" name="mav_setting_color_site_footer_copyright_text" value="%1$s" placeholder="%2$s" data-visual="short"/>',
        $mav_saved_value, __( 'Ví dụ: #'.random_color(), 'mavericktheme' )
    );
    mavf_color_preview_box( $mav_saved_value );
}

/* Footer copyright section background */
register_setting(
    'mavog_theme_styles',
    'mav_setting_color_site_footer_copyright_background'
);

add_settings_field(
    'mavid_theme_styles_color_site_footer_copyright_background',
    __( 'Footer copyright background', 'mavericktheme' ),
    'mavf_theme_styles_color_site_footer_copyright_background',
    'mav_admin__setting_section__theme_styles',
    'mavsec__theme_styles__theme_colors'
);

function mavf_theme_styles_color_site_footer_copyright_background()
{
    $mav_saved_value = esc_attr( get_option( 'mav_setting_color_site_footer_copyright_background' ) );
    printf(
        '<input type="text" name="mav_setting_color_site_footer_copyright_background" value="%1$s" placeholder="%2$s" data-visual="short"/>',
        $mav_saved_value, __( 'Ví dụ: #'.random_color(), 'mavericktheme' )
    );
    mavf_color_preview_box( $mav_saved_value );
}

/* Color preview box */
function mavf_color_preview_box( $mav_saved_value )
{
    if ( ! empty( $mav_saved_value ) ) {
        printf(
            '<div class="mav-admin__color__preview__box" style="background:%1$s;"></div>',
            $mav_saved_value
        );
    }
}
