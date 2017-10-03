<?php get_header(); ?>
<?php 
if ( !is_user_logged_in() ) {
   wp_redirect('/my-account/'.'?redirect_to=' . get_permalink() . '&reauth=1');
   //auth_redirect();
   exit;
}
?>
    <div class="container" ng-app="fabfitApp">
        <div class="row"><?php global $current_user;
wp_get_current_user();
echo '<h3>Welcome back ' . $current_user->user_firstname . "!</h3> \n";
?>
            <div class="container" ui-view=""></div>
        </div>
        <!--/.row-->
        
    </div>
    <!--/.container-->
<?php get_footer(); ?>