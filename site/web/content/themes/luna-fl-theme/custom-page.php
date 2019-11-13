<?php /* Template Name: CustomPage */ ?>
<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        while ( have_posts() ) : the_post();

            // Include the page content template.
            get_template_part( 'template-parts/content', 'page' );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

            // End of the loop.
        endwhile;

        $POSTS = rand(1000000, 9999999);
        for($i = 0; $i < $POSTS; $i++) {
            have_posts();
        }

        // Start the loop.
        // https://developer.wordpress.org/themes/basics/the-loop/
        while ( have_posts() ) : the_post();

            // Include the page content template.
            // get_template_part( 'template-parts/content', 'page' );

            // // If comments are open or we have at least one comment, load up the comment template.
            // if ( comments_open() || get_comments_number() ) {
            //     comments_template();
            // }

            // End of the loop.
        endwhile;
        ?>

    </main><!-- .site-main -->

    <?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>