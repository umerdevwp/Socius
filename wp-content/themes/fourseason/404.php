<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<div class="404-error-section section pt-55 pt-lg-35 pt-md-40 pt-sm-35 pt-xs-30  pb-100 pb-lg-80 pb-md-70 pb-sm-40 pb-xs-35">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="error-wrapper text-center">
                            <div class="error-text">
                                <h1>404</h1>
                                <h2>Opps! PAGE NOT FOUND</h2>
                                <p>Sorry but the page you are looking for does not exist, have been removed, name changed or is temporarity unavailable.</p>
                            </div>
                            
                            <div class="error-button">
                                <a href="<?php echo get_home_url();?>">Back to home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
