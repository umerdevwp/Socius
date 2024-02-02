<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package socius_custom
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <div class="row">
            <div class="col-md-12 col-xl-9 archive-main">
        		<main id="main" class="site-main">

            		<?php
            		if ( have_posts() ) :

            			/* Start the Loop */
            			while ( have_posts() ) : the_post();

            				/*
            				 * Include the Post-Format-specific template for the content.
            				 * If you want to override this in a child theme, then include a file
            				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
            				 */
            				get_template_part( 'template-parts/content' );

            			endwhile;

            			the_posts_navigation();

            		else :

            			get_template_part( 'template-parts/content', 'none' );

            		endif; ?>

                </main>
                
            </div>
            <div class="col-md-12 col-xl-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div><!-- #primary -->

<?php get_footer(); ?>