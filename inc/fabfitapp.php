<?php

/**
* Start angular app
*/
function bootstrap_angular_app(){
    if(is_page('fabfit')):
    global $woocommerce;
    
        wp_enqueue_script('angular-core', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js', array( 'jquery' ), '1.0', true);
         wp_enqueue_script('angular-sanitize', 'https://cdnjs.cloudflare.com/ajax/libs/angular-sanitize/1.6.4/angular-sanitize.min.js', array( 'angular-core' ), '1.0', true);
        wp_enqueue_script('angular-ui-router', 'https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/1.0.3/angular-ui-router.min.js', array( 'angular-core' ), '1.0', true);
        wp_enqueue_script('angular-ui-multiselect', get_stylesheet_directory_uri() . '/libs/angular-bootstrap-multiselect.min.js', array( 'angular-ui-router' ), '1.0', true);
        wp_enqueue_script('angular-app-main', get_stylesheet_directory_uri() . '/app/app.js', array( 'angular-ui-multiselect' ), '1.0', true);
        wp_enqueue_script('angular-app-service-cart', get_stylesheet_directory_uri() . '/app/services/Cart.js', array( 'angular-app-main' ), '1.0', true);
        wp_enqueue_script('angular-app-service-fabfitbox', get_stylesheet_directory_uri() . '/app/services/FabfitBox.js', array( 'angular-app-main' ), '1.0', true);
        wp_enqueue_script('angular-app-controller-main', get_stylesheet_directory_uri() . '/app/controllers/main.js', array( 'angular-app-main' ), '1.0', true);
        wp_enqueue_script('angular-app-controller-myfabfit', get_stylesheet_directory_uri() . '/app/controllers/myfabfit.js', array( 'angular-app-main' ), '1.0', true);
        wp_enqueue_script('angular-app-controller-box', get_stylesheet_directory_uri() . '/app/controllers/box.js', array( 'angular-app-main' ), '1.0', true);
        wp_enqueue_script('angular-app-filter', get_stylesheet_directory_uri() . '/app/filters/to_trusted.js', array( 'angular-app-main' ), '1.0', true);
        wp_enqueue_style('angular-app-css', get_stylesheet_directory_uri() . '/assets/css/app.css', array(), '1.0', 'all' );
        wp_localize_script( 'angular-app-main', 'appInfo',
            array(
                'siteUrl'           => get_site_url(),
                'fabfitboxUrl'      => '/wp-json/wp/v2/fabfitbox?box-status=34&customer=',
                'fabfitImageUrl'    => '/wp-json/fabfit-api/v1/products?ids=',
                'addToCartUrl'      => '/wp-json/fabfit-api/v1/cart/',
                'imgUrl'            => get_stylesheet_directory_uri() . '/assets/img/',
                'customerId'        => get_current_user_id(),
                'templateUrl'       => get_stylesheet_directory_uri() . '/views/',
                'completeBoxUrl'    => '/wp-json/fabfit-api/v1/completed/',
                'nonce'             => wp_create_nonce( 'wp_rest' ),
                'feedbackUrl'       => '/wp-json/fabfit-api/v1/feedback/',
                'is_empty'          => $woocommerce->cart->is_empty(),
            )
         );

    endif;

    if( is_page('checkout') or is_page('cart') ):
        wp_enqueue_style('angular-app-checkout', get_stylesheet_directory_uri() . '/assets/css/checkout.css', array(), '1.0', 'all' );
    endif;
}
add_action( 'wp_enqueue_scripts',  'bootstrap_angular_app');