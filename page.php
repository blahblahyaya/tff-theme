<?php get_header(); ?>

    <div class="container">
        <div class="row">
      <?php if(!is_user_logged_in()):?><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/inner-banner-2.jpg"/><?php endif ?>

            <?php mad_main_before(); ?>
                <?php get_template_part('templates/content', 'page'); ?>
            <?php mad_main_after(); ?>

        </div>
        <!--/.row-->
    </div>
    <!--/.container-->

<?php get_footer(); ?>