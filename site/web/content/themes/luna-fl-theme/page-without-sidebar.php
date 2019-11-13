<?php /* Template Name: Page Without Sidebar */ ?>

<?php get_header(); ?>

<div id="primary" class="site-content-fullwidth">
                <main id="main" class="site-main" role="main">
                                <?php
                                // Start the loop.
                                while ( have_posts() ) : the_post(); ?>

                                    <h1><?php the_title(); ?></h1>

                                    <?php
                                    the_content();
                                                // Include the page content template.
                                                get_template_part( 'template-parts/content', 'page' );

                                                // If comments are open or we have at least one comment, load up the comment template.
                                                if ( comments_open() || get_comments_number() ) {
                                                                comments_template();
                                                }

                                                // End of the loop.
                                endwhile;
                                ?>

                </main><!-- .site-main -->

                <?php //get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
