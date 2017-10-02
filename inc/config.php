<?php

mad_define_constants(array(
    'WP_JQUERY'             => true,
    'FULLWIDTH_CLASS'       => 'col-sm-12',
    'MAIN_CLASS'            => 'col-md-9 col-lg-10',
    'SIDEBAR_CLASS'         => 'col-md-3 col-lg-2 hidden-xs hidden-sm',
    'CART_MAIN_CLASS'       => 'col-sm-12',
    'CART_SIDEBAR_CLASS'    => 'col-sm-2',
    'POST_EXCERPT_LENGTH'   => 55,
    'SEARCH_EXCERPT_LENGTH' => 55,
    'ARCHIVE_NAV_LEFT'      => '&laquo;',
    'ARCHIVE_NAV_RIGHT'     => '&raquo;',
    'DISABLE_COMMENTS'      => true,
    'LOGIN_CSS'             => true,
    'ADMIN_CSS'             => false,
    'LOGIN_LOGO_URL'        => 'https://www.thefabfit.com',
    'NAV_SPLIT_DROPDOWNS'   => true, // false is hover which is not ideal, split is recommended
    'ERROR_DISPLAY'         => false // Boolean = Turn PHP error display on then the switch //Errors
));

/* Define Constants: */
function mad_define_constants($constants){
    foreach($constants as $key => $value){
        if(!defined($key)) define($key,$value);
    }
}

if(ERROR_DISPLAY){ error_reporting(E_ALL ^ E_NOTICE); ini_set('display_errors','1'); }

/*
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! isset( $content_width ) )
    $content_width = 1170; /* pixels */

/**
 * Show or hide sidebar
 */

function mad_display_sidebar() {
    if (
        is_404() ||
        is_front_page() && 'page' == get_option('show_on_front') ||
        is_product() ||
        is_checkout()
    ) {
        return false;
    } else {
        return true;
    }
}

/**
 * Class for #main
 */

if(!function_exists('mad_main_class')):
function mad_main_class(){
    if (
        is_404() ||
        is_front_page() && 'page' == get_option('show_on_front') ||
        is_page_template('page-templates/page-full.php') ||
        is_product() ||
        is_checkout()
    ) {
        return FULLWIDTH_CLASS;
    } elseif (
        is_cart()
    ) {
        return CART_MAIN_CLASS;
    } else {
        return MAIN_CLASS;
    }
}
endif;

/**
 * Change Password Protected Form
 * @link wp.tutsplus.com/tutorials/customizing-and-styling-the-password-protected-form/
 */

add_filter( 'the_password_form', 'mad_password_form' );
function mad_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<p>This post is password protected. To view it please enter your password below:</p><form class="protected-post-form row form-group" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post"><label class="pass-label sr-only" for="' . $label . '">' . __( "Password:", "mad" ) . '" </label><div class="col-xs-8"><input class="form-control" id="' . $label . '"  name="post_password" type="password" placeholder="Password"></div><div class="col-xs-4"><input class="btn btn-primary" type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '"></div></form>';
    return $o;
}

/**
 * body tag schema.org attributes
 */

function mad_body_tag_schema_attribs() {
    echo ' itemscope itemtype="http://schema.org/WebPage"';
}
add_action('mad_body_tag_attributes', 'mad_body_tag_schema_attribs');

/**
 * Main content wrapper with schema.org microdata
 */

function mad_main_opening() {
    echo "<main class=\"site-main-content " . mad_main_class() . "\" id=\"site-main-content\" role=\"main\" itemprop=\"mainContentOfPage\">\n";
}
add_action('mad_main_before', 'mad_main_opening');

function mad_main_closing() {
    echo "</main>";
}
add_action('mad_main_after', 'mad_main_closing');