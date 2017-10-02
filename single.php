<?php get_header(); ?>

    <div class="container">
        <div class="row">

            <?php get_sidebar(); ?>

            <?php mad_main_before(); ?>
                <?php get_template_part('templates/content', 'single'); ?>
            <?php mad_main_after(); ?>

        </div>
        <!--/.row-->
    </div>
    <!--/.container-->

<?php get_footer(); ?>