<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	

		        <!-- Page Banner Section Start -->
				<div class="page-banner-section section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="page-banner text-center">
                            <h1 class="pb-20"><?php echo get_the_title(); ?></h1>
                                <div class="post-title-meta pb-3">
                                       
                                </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>

            <?php $feat_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="post-thumbnail img-full pt-5 pt-lg-4 pt-md-3 pt-sm-2 pt-xs-1">
                        <?php // echo $feat_image;//the_post_thumbnail( 'post-featured-image' ); ?>
                        <img src="<?php echo $feat_image[0];?>" width="100%">
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <!-- Page Banner Section End -->

        <!-- Blog Section Start -->
        <div class="blog-section section">
            <div class="container">
                <div class="row">
                  
                    <div class="col-lg-12 mb-sm-20 mb-xs-10">
                        <div class="blog_area">
                            <article class="blog_single blog-details">
                               
                                
                                <div class="postinfo-wrapper">
                                    <div class="post-info">
                                        <div class="entry-summary blog-post-description">
											<?php
												the_content(
													sprintf(
														wp_kses(
															/* translators: %s: Name of current post. Only visible to screen readers */
															__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'eighteenB' ),
															array(
																'span' => array(
																	'class' => array(),
																),
															)
														),
														get_the_title()
													)
												);
											?>
                                           
                                            
                                        </div>
                                    </div>
                                </div>
                            </article>
 
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Blog Section End -->

       
	
                                    </div>

</article><!-- #post-<?php the_ID(); ?> -->
