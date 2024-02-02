<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>


	<?php if ( have_posts() ) : ?>	
              
									
<style>
.showed {display:block;}
.hidden {display:none !important;}
    </style>
                                       
<!-- Blog Section Start -->
         
<div class="product-section section pt-100 pt-lg-70 pt-md-65 pt-sm-60 pt-xs-45 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
                <div class="container">
    
                    <div class="row">
                        <div class="col">
                            <div class="product-tab-menu mb-40 mb-xs-20 text-center">
                                <ul class="nav d-inline-flex filter">
                                    <li><a  id="all" class="filter-trigger"> ALL</a></li>
                                    <?php
                                        foreach((get_categories(array(
                                            'orderby' => 'term_order',
                                            'order'   => 'ASC',
                                            'hide_empty' => 1,
                                            'exclude' => '6'
                                        ))) as $category) { 
                                            $category_link = get_category_link($category->cat_ID);
                                            echo '<li id="'.$category->slug.'" class="filter-trigger">'.$category->name.'</li>';
                                        } 
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                           
                                        <div class="row">

                                        <?php
                                                $counter = 0;
                                                // Start the Loop.
                                                while ( have_posts() ) :
                                                    the_post(); 
                                                    				
                                        ?>
                                                <!-- Single Blog Start -->
                                                <div class="blog col-lg-6 col-md-6 col-sm-6 all <?php $hasComma = false; foreach((get_the_category()) as $category) { if ($hasComma){ echo " "; } echo ''.$category->slug.'';$hasComma = true;} ?> ">
                                                    <div class="blog-inner mb-20">
                                                    <?php $feat_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-archive-image' ); ?>
                                                        <div class="media"><a href="<?php echo get_the_permalink();?>" class="image"><?php //the_post_thumbnail( 'post-archive-image' ); ?> <img src="<?php echo $feat_image[0];?>" > </a></div>
                                                        <div class="content">
                                                        <h3 class="title"><a href="<?php echo get_the_permalink();?>"><?php echo get_the_title(); ?></a></h3>
                                                        <span class="post-date pb-2 pt-2" style="text-transform:uppercase;font-size:13px;display:block;"><?php $hasComma = false; foreach((get_the_category()) as $category) { $category_link = get_category_link($category->cat_ID); if ($hasComma){ echo ", "; }echo '<a href="'.esc_url( $category_link ).'" title="'.esc_attr($category->name).'">'.$category->name.'</a>';$hasComma = true;} ?></span>
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
                                               
                                                <?php if ( $counter == 4 ){ ?>
                                                <div class="single-deal-product mb-60">
                                                        <div class="row align-items-center">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="deal-product-img">
                                                                    
                                                                        <img src="<?php echo get_field('newsletter_image', 'options');?>" alt="">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="deal-product-title text-md-left text-sm-center pr-md-75 p-sm-20">
                                                                    <h3><?php echo get_field('newsletter_title', 'options');?></h3>
                                                                    <div class="single-input text-md-left text-sm-center">      
                                                                            <input name="subscriber-email" id="content-subscriber-email" class="content-subscriber-email" type="text" placeholder="Enter your email"><button class="l2-center-white bg-dark-grey group-hover:l2-center-black group-hover:bg-white group-hover:border lg:w-16 w-20 border-t border-r border-b border-white border-r-0 lg:border-r content-subscribe-email-submit" data-v-1e526806=""></button>
                                                                            <div id="on-the-list-content" class="success-message sm-cfsize" data-v-5b446622=""> You're on the list! </div>
                                                                            <div id="content-valid-email" class="error-message" style="margin-top: 10px;" >Please enter valid email address</div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            	<?php } ?>

                                            <?php
                                                $counter++;
                                                endwhile; // End of the loop.
                                                
                                            ?>       

                                        </div>
                
                            </div>
                        </div>
                    </div>
                </div>
        </div>
            <!-- Blog Section End -->
                                        
                              
				
		<?php endif; ?>

        <script>
            jQuery(document).ready(function() {
              $('.filter-trigger').on("click", function() {
                $('.filter').find('li').removeClass("active");
                $(this).addClass("active");
                var theId = $(this).attr('id');
                var newElement = document.getElementsByClassName("blog");
                $(newElement).each(function(index, item) {
                  $(this).addClass("hidden").fadeIn(800);
                });
                lookFor(theId);
                function lookFor (id) {
                  var x = document.getElementsByClassName(id);
                  for (var i=0; i<=x.length; i++) {
                    $(x[i]).removeClass("hidden").addClass("showed").fadeIn(800);
                  }
                 }
              });
            });
          </script>       
<?php
get_footer();
