<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
                    
                    the_posts_pagination( 
                        array( 
                            'screen_reader_text' => ' ',
                            'mid_size'  => 2,
                            'prev_text' => __( 'Previous', 'textdomain' ),
                            'next_text' => __( 'Next', 'textdomain' ),
                        ) 
                    );
                    
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