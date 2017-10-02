<?php get_header(); ?>

    <?php
        if ( 'page' === get_option('show_on_front') ) {
            get_template_part('templates/content', 'home-page');
        } else {
    ?>
        <div class="container">
            <div class="row">
                <?php mad_main_before(); ?>
                    <?php get_template_part('templates/content', 'archive'); ?>
                <?php mad_main_after(); ?>
                <?php get_sidebar(); ?>
            </div><!--/.row-->
        </div><!--/.container-->
    <?php } ?>

<?php get_footer(); ?>