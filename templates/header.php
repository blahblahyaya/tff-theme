<?php global $woocommerce; ?>

<?php if(!is_user_logged_in()): ?>
    <div class="site-wrap">
        <header class="site-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
    </div>
    <div id="header-top" class="site-header-top visible-xs visible-sm">
        <!-- start mobile header top -->
        <div class="container">
            <div class="row">
                <div class="col-xs-3">
                    <button class="btn btn-link btn-mobile-nav toggle-mobile-nav"><i class="fa fa-bars"></i></button>
                </div>
                <div class="col-xs-9">
                    <div class="text-right">
                        <!--<a class="btn btn-link btn-mobile-cart" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
                            <i class="fa fa-shopping-cart"></i>
                            <?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>
                            (<?php echo $woocommerce->cart->get_cart_total(); ?>)
                        </a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-header-main">
        <div class="container">
            <div class="row">
                <div class="site-header-logo col-md-4">
                    <h1 class="logo">
                        <a href="<?php echo home_url(); ?>/" itemscope itemtype="http://schema.org/Brand">
                            <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png" alt="<?php bloginfo('name'); ?>" itemprop="logo">
                        </a>
                    </h1>
                </div>
                <div class="col-md-4 hidden-xs hidden-sm">
                    <nav class="site-header-nav hidden-xs hidden-sm" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
                        <?php /* Keep the following for accessibility */ ?>
                        <h2 class="sr-only"><?php _e( 'Primary Navigation', 'mad' ); ?></h2>
                        <a class="sr-only" href="#site-main-content" title="<?php _e('Go to main content', 'mad') ?>"><?php _e('Go to main content', 'mad') ?></a>
                        <div class="main-nav">

                            <?php wp_nav_menu(array(
                                'theme_location' => 'primary_navigation',
                                'container' => false,
                                'items_wrap' => '<ul>%3$s</ul>',
                                'depth' => 3,
                                'walker' => new Mad_Nav_Walker()
                            )); ?>

                        </div>
                    </nav>
                </div>
                <div class="col-md-2 hidden-xs hidden-sm top20">
                    <a class="btn btn-hollow btn-started" href="/login/">Login</a>
                </div>
                <div class="col-md-2 hidden-xs hidden-sm top20">
                    <a class="btn btn-hollow btn-started" href="/style-preferences/">Get Started</a>
                </div>
            </div>
        </div>
    </div>
    </header>
    <!-- /.site-header -->
    <div class="mobile-nav-wrap visible-xs visible-sm">
        <p class="text-right bottom"><a class="mobile-nav-close toggle-mobile-nav"><i class="fa fa-times"></i></a></p>
        <nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
           <!-- <h3>Categories</h3>-->
           <?php /*get_template_part('templates/woocommerce-list-categories'); */?>
            <h3>Site Information</h3>
           
            <?php wp_nav_menu(array(
                'theme_location' => 'primary_navigation',
                'container' => false,
                'items_wrap' => '<ul class="mobile-nav">%3$s</ul>',
                'depth' => 3,
                'walker' => new Mad_Nav_Walker()
            )); ?>
        </nav>
    </div>

    <!--Logged - In users header -->
    <?php else: ?>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/login-header-logo-2.png" height="27" style="height:27px">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-fabfit-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/fabfit/">Current Orders <span class="sr-only">(current)</span></a></li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php global $current_user;
                            wp_get_current_user(); 
                            echo $current_user->user_firstname.' '.$current_user->user_lastname;
                        ?>
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/my-account/">My Account</a></li>
                            <li><a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></li>
                        </ul>
                    </li>
                </ul>

                 <?php wp_nav_menu(array(
                'theme_location' => 'primary_navigation',
                'container' => false,
                'items_wrap' => '<ul class="nav navbar-nav navbar-right">%3$s</ul>',
                'depth' => 3,
                'walker' => new Mad_Nav_Walker()
            )); ?>
                <!--<ul class="nav navbar-nav navbar-right">
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Gift Cards</a></li>
                </ul>-->
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <?php endif ?>
    <div class="site-content">