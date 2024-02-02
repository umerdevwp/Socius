<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>


	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title text-center pt-60">
					<?php _e( 'Search results for:', 'eighteenB' ); ?> &nbsp; <?php echo get_search_query(); ?>
				</h1>
				
			</header><!-- .page-header -->
			<div class="product-section section pt-100 pt-lg-70 pt-md-65 pt-sm-60 pt-xs-45 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
                <div class="container">
    
                    
				<div class="row">
					<div class="col-12">
						
						<div class="row">
										<?php
										// Start the Loop.
										while ( have_posts() ) :
											the_post();

											?>

                                                <!-- Single Blog Start -->
                                                <div class="blog col-lg-6 col-md-6 col-sm-6 all <?php $hasComma = false; foreach((get_the_category()) as $category) { if ($hasComma){ echo " "; } echo ''.$category->slug.'';$hasComma = true;} ?> ">
                                                    <div class="blog-inner mb-20">
                                                        <div class="media"><a href="<?php echo get_the_permalink();?>" class="image"><?php the_post_thumbnail( 'post-archive-image' ); ?></a></div>
                                                        <div class="content">
															<span class="post-date pb-2" style="text-transform:uppercase;font-size:13px;"><?php $hasComma = false; foreach((get_the_category()) as $category) { if ($hasComma){ echo ", "; } echo ''.$category->name.'';$hasComma = true;} ?></span>
                                                            
                                                            <h3 class="title"><a href="<?php echo get_the_permalink();?>"><?php echo get_the_title(); ?></a></h3>
                                                            <span class="post-date"><?php echo get_the_date('M j, Y');?></span>
                                                            <p>
                                                                <?php 
                                                                    $excerpt = get_the_excerpt();
                                                                    echo wp_trim_words( $excerpt , '45' ); 
                                                                ?>
                                                            </p>
                                                            <!-- <a class="readmore" href="blog-details.html">Read more</a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Single Blog End -->



											<?php

											// End the loop.
										endwhile;

										// If no content, include the "No posts found" template.
									else :
									?>

												<div class="blog col-lg-12 col-md-12 col-sm-12 text-center">
                                                    <div class="blog-inner mb-60 pt-60">
                                                        <div class="content">
                                                            <h3 class="title">No result match your search !</h3>
                                                            <p>
                                                                
                                                            </p>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
									<?php
									endif;
									?>

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
