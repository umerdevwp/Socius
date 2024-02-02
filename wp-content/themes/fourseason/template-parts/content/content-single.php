<?php
/**
 * Template part for displaying posts
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
                                        <!-- <span class="post-author"><span class="post-by"> by </span> <span style="text-transform:capitalize;"><?php //echo get_the_author();?></span>  </span> 
                                        <span class="post-separator">|</span>-->
                                        <span class="post-date"> <?php echo get_the_date( 'M j, Y' );?> </span>
                                        <span class="post-separator">|</span>
                                        <span class="post-author">
											<?php
												$hasComma = false;
												foreach((get_the_category()) as $category) { 
													$category_link = get_category_link($category->cat_ID);
													if ($hasComma){ 
														echo "&nbsp;,&nbsp;"; 
													}
													echo '<a href="'.esc_url( $category_link ).'" title="'.esc_attr($category->name).'">'.$category->name.'</a>';
													$hasComma = true;
												} 
											?>
										</span>
                                        <!-- <span class="post-separator">&nbsp;</span>
                                        <span class="post-author"><i class="fa fa-comment-o"></i> &nbsp; 237</span> -->
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
                    <div class="col-lg-4 order-xs-2 order-md-2 order-lg-1">
                      <!--Blog Post Social Sharing-->   
                            <div class="social-sharing">
                                <div class="widget widget_social sharing_widget">
                                    
                                    <ul class="blog-social-icons">
                                        <li>
                                            <a target="_blank" title="linkedin" target="popup" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>','popup','width=1000,height=600,scrollbars=no,resizable=yes'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>" class="linkedin social-icon">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="Facebook" target="popup" onclick="window.open('http://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>','popup','width=800,height=600,scrollbars=no,resizable=yes'); return false;" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" class="facebook social-icon">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="twitter" target="popup" onclick="window.open('http://twitter.com/intent/tweet/?text=<?php echo get_the_title(); ?>&url=<?php echo get_the_permalink(); ?>','popup','width=800,height=600,scrollbars=no,resizable=yes'); return false;" href="http://twitter.com/intent/tweet/?text=<?php echo get_the_title(); ?>&url=<?php echo get_the_permalink(); ?>" class="twitter social-icon">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="print" href="javascript:window.print()" class="print social-icon">
                                                <i class="fa fa-print"></i>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>

                        <!--Blog Post Newsletter Signup-->                        
                            <div class="deal-product-title text-md-center text-sm-center pt-40">
                                <h3 style="    font-size: 18px;padding: 0 5px;line-height:1.6;"><?php echo get_field('newsletter_title', 'options');?></h3>
                                <div class="single-input text-sm-center pt-20">      
                                        <input name="subscriber-email" id="content-subscriber-email" class="content-subscriber-email" type="text" placeholder="Enter your email" style="width:75%;"><button class="l2-center-white bg-dark-grey group-hover:l2-center-black group-hover:bg-white group-hover:border lg:w-16 w-20 border-t border-r border-b border-white border-r-0 lg:border-r content-subscribe-email-submit post-subscribe-email-submit"></button>
                                        <div id="on-the-list-content" class="on-the-list-content success-message sm-cfsize" style="font-size:10px;" data-v-5b446622=""> You are on the list!</div>
                                        <div id="content-valid-email" class="error-message" style="margin-top: 10px;" >Please enter valid email address</div>
                                </div>
                                
                            </div>

                         <!--Blog Post Quote-->

                         <div class="quote-box">
                                <div class="entry-summary blog-post-description">
                                <blockquote>
                                    <h4><?php echo get_field('quote_title');?></h4>
                                    <p><?php echo get_field('quote_content');?></p>
                                </blockquote>
                                </div>
                            </div>


                    </div>
                    <div class="col-lg-8 mb-sm-20 mb-xs-10 order-xs-1 order-md-1 order-lg-2">
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

                    
                    <div class="col-lg-12 mb-sm-20 mb-xs-10 order-xs-3 order-md-3 order-lg-3">
                        <div class="blog_area">     
                            
                        <?php 
                            $productStatus = get_field('show_products'); 
                            if($productStatus == "true"){
                        ?>
                                <!-- Blog Post Related Products -->
                                <div class="relatedposts pt-5 pt-lg-4 pt-md-3 pt-sm-2 pt-xs-1">
                                                <h3 class="d-block text-left">SHOP THIS STORY</h3>
                                                <div class="row">
												<?php

													$products_from_article = get_posts( array( 'post_type' => 'product', 'numberposts' => 3, 'post__in' => get_field('products_from_this_article') ) );
													if( $products_from_article ) foreach( $products_from_article as $post ) {
													setup_postdata($post); 

												?>
                                                    <div class="col-md-4 col-sm-6">
                                                        <div class="relatedthumb mb-xs-30 border-all">
                                                            <div class="image">
															
															<a href="<?php echo get_field('product_link'); ?>">
															<?php 

																$product_image = get_field('product_image');
																$size = 'post-list-image'; // (thumbnail, medium, large, full or custom size)

																if( $product_image ) {

																	$product_image = wp_get_attachment_image_src( $product_image, 'full' ); ?>
                                                                    <img src='<?php echo $product_image[0]; ?>' width="100%">
															<?php	}
															?>
															</a>
                                                            </div>
                                                            <h4 class="bw-500 pt-2 pb-4 px-4"><a href="<?php echo get_field('product_link'); ?>"><?php echo get_the_title(); ?></a></h4>
                                                            <a href="<?php echo get_field('product_link'); ?>" class="col-12 form-button">Shop Now</a>
                                                        </div>
													</div>
												<?php 
													}
													wp_reset_postdata(); 
												?>
                                                    
                                                </div>
                                            </div>
                                            <!-- Blog Post Related Products -->
                        <?php } ?>


                                            <!--Blog Post Tag-->
                                            <div class="single-post-tag">
                                                <strong>Tagged: </strong>
												<?php
													$post_tags = get_the_tags();
 
													if ( $post_tags ) {
														foreach( $post_tags as $tag ) {
														echo '<a href="' . get_tag_link($tag->term_id) . '" class="ml-1">'. $tag->name .'</a>'; 
														}
													}
												?>
                                            </div>
                                            
                             
                             
                                            <!--Comment Area Start-->
                            <div class="comments-area mt-10 mt-lg-25 mt-md-15 mt-md-15 mt-sm-10 mt-xs-0 mb-15 mb-lg-25 mb-md-15 mb-md-15 mb-sm-10 mb-xs-0">
                                <?php //comments_template(); ?>
                             </div>

                        <?php 
                            $articleStatus = get_field('show_more_articles'); 
                            if($articleStatus == "true"){
                        ?>

                            <div class="relatedposts mt-lg-25 mt-md-15 mt-md-15 mt-sm-10 mt-xs-0 mt-15 ">
                                <h3>More Articles from <?php $hasComma = false; foreach((get_the_category()) as $category) { $category_link = get_category_link($category->cat_ID); if ($hasComma){ echo ", "; }echo '<a href="'.esc_url( $category_link ).'" title="'.esc_attr($category->name).'">'.$category->name.'</a>';$hasComma = true;} ?></h3>
                                <div class="row">

									<?php

										$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
										if( $related ) foreach( $related as $post ) {
										setup_postdata($post); 
                                       // $post_image = wp_get_attachment_image_src( $post->ID, 'full' );
                                        
									?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="relatedthumb mb-xs-30">
                                            <div class="image">
                                                <a href="<?php echo get_the_permalink();?>"><?php the_post_thumbnail( 'more-item-image' ); ?></a>
                                            </div>
                                            <h4 class="pt-2 pb-2 px-1 pl-0" style="min-height:50px;"><a href="<?php echo get_the_permalink();?>"><?php echo get_the_title(); ?></a></h4>
                                            <span class="post-date"><?php echo get_the_date('M j, Y');?></span>
                                        </div>
									</div>
									<?php 
										}
										wp_reset_postdata(); 
									?>
                                    
                                </div>
                            </div>
                        
                        <?php
                            }
                        ?>
                        </div>
                    </div>                

                </div>
            </div>
        </div>
        <!-- Blog Section End -->

        <!--Brand section start-->
        <div class="brand-section section pt-90 pt-lg-70 pt-md-65 pt-sm-55 pt-xs-40 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>
        <!--Brand section end-->
	
                                    </div>

</article><!-- #post-<?php the_ID(); ?> -->
