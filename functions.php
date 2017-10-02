<?php

require_once get_stylesheet_directory() . '/inc/config.php';             // theme configuration
require_once get_stylesheet_directory() . '/inc/woocommerce-custom.php';   // custom woocommerce functions
require_once get_stylesheet_directory() . '/inc/custom.php';             // custom functions
require_once get_stylesheet_directory() . '/inc/enqueue.php';            // scripts and styles enqueue
require_once get_stylesheet_directory() . '/inc/fabfitapp.php'; 

// Function to change email address

function wpb_sender_email( $original_email_address ) {
    return 'findmyjeans@thefabfit.com';
}

// Function to change sender name
function wpb_sender_name( $original_email_from ) {
	return 'The fabFit';
}

// Hooking up our functions to WordPress filters 
add_filter( 'wp_mail_from', 'wpb_sender_email' );
add_filter( 'wp_mail_from_name', 'wpb_sender_name' );
//add shortcode to gravity forms
add_filter( 'gform_get_form_filter', 'shortcode_unautop', 11 );
add_filter( 'gform_get_form_filter', 'do_shortcode', 11 );


