    </div>

    <!-- /.site-content -->
    <?php if(!is_user_logged_in()): ?>
    <div class="container">
        <div class="section-padding text-center">
            <div class="row top50 bottom50">
                <div class="col-sm-4">
                    <p><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/cta-1.png" alt=""></a></p>
                    <p class="cta-heading bottom20"><a href="https://www.facebook.com/findmyjeans/" target="blank"><i class="fa fa-lg fa-facebook"></i></a></p>
                </div>
                <div class="col-sm-4">
                    <p><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/cta-2.png" alt=""></a></p>
                    <p class="cta-heading bottom20"><a href="https://www.instagram.com/fabfitjeans/" target="blank"><i class="fa fa-lg fa-instagram"></i></a></p>
                </div>
                <div class="col-sm-4">
                    <p><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/cta-3.png" alt=""></a></p>
                    <p class="cta-heading bottom20"><a href="https://plus.google.com/110662504732979857586" target="blank"><i class="fa fa-lg fa-google"></i></a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-newsletter hidden-xs text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <h4>Sign up to be added to our email list</h4>
                    <p>Get great deals sent directly to your inbox!</p>
                </div>
                <div class="col-sm-7">
                    <form class="form-inline text-center top10" action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                        <div class="form-group">
                            <label class="sr-only" for="mce-FNAME">First Name</label>
                            <input type="text" value="" name="FNAME" class="form-control" id="mce-FNAME" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="mce-EMAIL">Email address</label>
                            <input type="email" value="" name="EMAIL" class="form-control" id="mce-EMAIL" placeholder="Enter Email">
                        </div>
                        <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <footer class="site-footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
        <section class="container">
            <div class="row">
                <div class="col-xs-12">
                    <?php /* Keep the following for accessibility */ ?>
                    <h2 class="sr-only"><?php _e( 'Footer', 'mad' ); ?></h2>

                    <?php if( has_nav_menu('footer_navigation') ) : /* show only if menu has been assigned */ ?>

                    <nav class="footer-nav" itemscope itemtype="http://schema.org/SiteNavigationElement">

                        <?php /* Keep the following for accessibility */ ?>

                        <h3 class="sr-only"><?php _e( 'Footer Navigation', 'mad' ); ?></h3>

                        <?php wp_nav_menu(array(

                            'theme_location' => 'footer_navigation',

                            'container' => false,

                            'items_wrap' => '<ul class="nav">%3$s</ul>',

                            'depth' => 1,

                            'walker' => new Mad_Nav_Walker()

                        ));?>

                    </nav>

                    <?php endif; ?>



                    <?php get_template_part('templates/footer', 'widget-area'); ?>

                </div>
            </div>
        </section>
        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <p><small>&copy; <?php echo date('Y');?> <?php bloginfo('name'); ?>. Powered by <a href="http://www.ecommercemarketing360.com/" target="_blank">eCommerce Marketing 360&reg;</a></small></p>
                    </div>
                    <div class="col-sm-4">
                        <ul class="list-social list-inline text-right-sm">
                            <li><a href="#" target="blank"><i class="fa fa-lg fa-facebook"></i></a></li>
                            <li><a href="#" target="blank"><i class="fa fa-lg fa-twitter"></i></a></li>
                            <li><a href="#" target="blank"><i class="fa fa-lg fa-instagram"></i></a></li>
                            <li><a href="#" target="blank"><i class="fa fa-lg fa-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- /.site-footer -->

</div>
    <?php endif ?>
<!-- /.site-wrap -->

<?php wp_footer(); ?>