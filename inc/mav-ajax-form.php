<?php
/**
 * @package maverick-theme
 */

// For normal users
add_action('wp_ajax_nopriv_mavf_ajax_form', 'mavf_ajax_form');
// For login users
add_action('wp_ajax_mavf_ajax_form', 'mavf_ajax_form');

function mavf_ajax_form()
{
    if (isset($_POST['name']) && isset($_POST['email'])) {
        // Get sender name
        $mav_name    = wp_strip_all_tags($_POST['name']);
        // Get sender email
        $mav_email   = wp_strip_all_tags($_POST['email']);
        // Get sender phone
        $mav_phone   = isset($_POST['phone'])    ? wp_strip_all_tags($_POST['phone']) : '';
        // Form message
        $mav_message = isset($_POST['message'])  ? sanitize_textarea_field($_POST['message']) : 'This message has no content.';

        $mavFrom = $mav_email;
        $mavTo = 'minhdc@gmail.com';
        $mavSubject = __('Thông tin liên lạc từ ', 'maverick-theme').$mav_name;
        $mavHeaders = "From: $mav_email\n";
        $mavHeaders .= "MIME-Version: 1.0\n";
        $mavHeaders .= "Content-type: text/html; charset=utf-8\n";

        if (wp_mail($mavTo, $mavSubject, $mav_message, $mavHeaders)) {
            mavf_message_box(__('Thông tin liên hệ đã được gửi. Cám ơn bạn đã liên lạc với chung tôi.', 'maverick-theme'));
        } else {
            mavf_message_box(__('Xảy ra lỗi khi gửi thông tin liên hệ. Vui lòng thử lại.', 'maverick-theme'));
        }
    }
    die();
}