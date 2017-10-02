<?php

/**
 * Theme Styles
 */

function mad_register_styles(){
    if(!is_user_logged_in()){
        wp_register_style(
            'mad-main', // handle
            get_template_directory_uri().'/assets/css/main.min.css', // source
            null, // no dependencies
            null // version
        );
        wp_register_style(
            'mad-custom', // handle
            get_stylesheet_directory_uri().'/assets/css/custom.css', // source
            'mad-main', // no dependencies
            null // version
        );
    }
    
}
add_action('init', 'mad_register_styles');

if (!is_admin()):
    function mad_enqueue_styles(){
        wp_enqueue_style('mad-main');
        wp_enqueue_style('mad-custom');
    }
    add_action('wp_enqueue_scripts', 'mad_enqueue_styles', 100);
endif;

/**
 * Custom WordPress Login CSS
 */

if(LOGIN_CSS) {
function mad_login_css() {
        wp_enqueue_style( 'login_css', get_template_directory_uri() . '/assets/css/login.css' );
    }
    add_action('login_head', 'mad_login_css');
}

/**
 * Custom WordPress Admin CSS
 */

if(ADMIN_CSS) {
function mad_admin_css() {
        wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/assets/css/admin.css' );
    }
    add_action('admin_print_styles', 'mad_admin_css' );
}

/**
 * jQuery
 */

if(WP_JQUERY) {
    if (!is_admin()):
        function mad_enqueue_jquery() {
            wp_enqueue_script("jquery");
        }
        add_action('wp_enqueue_scripts', 'mad_enqueue_jquery');
    endif;
}

/**
 * Theme Scripts
 */

function mad_register_scripts() {
    wp_register_script(
        'mad-main-js', //handle
        get_template_directory_uri().'/assets/js/main.min.js', //source
        null, //dependencies
        null, //version
        true //run in footer
    );
    /*wp_register_script(
        'mad-plugins-js', //handle
        get_template_directory_uri().'/assets/js/plugins.js', //source
        'mad-main-js', //dependencies
        null, //version
        true //run in footer
    );*/
    wp_register_script(
        'mad-custom-js', //handle
        get_stylesheet_directory_uri().'/assets/js/custom.js', //source
        'mad-plugins.js', //dependencies
        null, //version
        true //run in footer
    );

}
add_action('init', 'mad_register_scripts');
function mad_enqueue_scripts(){
    if (!is_admin()):
        wp_enqueue_script('mad-main-js');
        //wp_enqueue_script('mad-plugins-js');
        wp_enqueue_script('mad-custom-js');
    endif;
}
add_action('wp_enqueue_scripts', 'mad_enqueue_scripts', 100);

/**
 * Enable threaded comments
 */

function mad_enable_threaded_comments(){
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
            wp_enqueue_script('comment-reply');
        }
}
add_action('get_header', 'mad_enable_threaded_comments');