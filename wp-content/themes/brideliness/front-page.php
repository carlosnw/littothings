<?php /* Template Name: Front Page */

get_header(); ?>

    <main id="content" class="site-content <?php brideliness_main_content_class(); ?>" itemscope="itemscope" itemprop="mainContentOfPage">

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="entry-content">

                    <?php the_content(); ?>

                </div><!-- .entry-content -->
            <?php endwhile; ?>
        <?php endif; ?>

    </main><!--.site-content-->

<?php get_footer(); ?>