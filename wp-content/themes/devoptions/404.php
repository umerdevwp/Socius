<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package socius_custom
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container-fluid">
            <div class="row d-flex flex-row justify-content-center">
    			<article id="post-<?php the_ID(); ?>" <?php post_class('hentry internal-hentry col-11 col-md-10 col-lg-10'); ?>>
                    <section class="error-404 not-found">
        				<header class="page-header">
        					<h1 class="page-title"><?php esc_html_e( 'Our apologies. That page can&rsquo;t be found.', 'socius_custom' ); ?></h1>
        				</header><!-- .page-header -->

        				<div class="page-content">
        					<p><?php esc_html_e( 'It looks like the item you are looking for is missing. Please make a new navigation choice with the menu above.', 'socius_custom' ); ?></p>

        				</div><!-- .page-content -->
        			</section><!-- .error-404 -->
                </article><!-- #post-## -->
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
