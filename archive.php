<?php get_header(); ?>

    <div class="container">
        <div class="row">

           <?php mad_main_before(); ?>
                <?php get_template_part('templates/content', 'archive'); ?>
            <?php mad_main_after(); ?>

        </div>
        <!--/.row-->
    </div>
    <!--/.container-->

<?php get_footer(); ?>