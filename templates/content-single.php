<article itemscope itemtype="http://schema.org/Blog">

    <?php /* Start loop */ ?>
    <?php while (have_posts()) : the_post(); ?>

        <article <?php post_class() ?> itemscope itemtype="http://schema.org/BlogPosting">

            <header class="post-header">
                <div class="page-title">
                    <h1 itemprop="headline"><?php the_title(); ?></h1>
                </div>
                <?php get_template_part('templates/post-meta'); ?>
            </header>

            <div class="post-body" itemprop="articleBody">
            <?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <img src="<?php echo $image[0]; ?>" style="max-width:100%;padding-bottom:20px">

  </div>
<?php endif; ?>
                <?php the_content(); ?>
            </div>

            <footer class="post-footer">
                <?php mad_single_pagination(); ?>
                <div class="post-meta">
                    <!-- <dl class="post-cats">
                        <dt><span class="fa fa-folder-open" aria-hidden="true"></span><span class="sr-only"><?php _e('Categories:', 'mad'); ?></span></dt>
                        <dd itemprop="articleSection">
                            <?php the_category(', '); ?>
                        </dd>
                    </dl> -->

                    <?php if ( has_tag() ) : ?>
                    <dl class="post-tags">
                        <dt><span class="fa fa-tags" aria-hidden="true"></span><span class="sr-only"><?php _e('Tags:', 'mad'); ?></span></dt>
                        <dd itemprop="articleSection">
                            <?php the_tags('', ', ', ''); ?>
                        </dd>
                    </dl>
                    <?php endif; ?>
                </div>
            </footer>

            <?php if ( DISABLE_COMMENTS !== true ) comments_template('/templates/comments.php'); ?>

        </article>

    <?php /* End loop */ ?>
    <?php endwhile; wp_reset_query(); ?>

</article>