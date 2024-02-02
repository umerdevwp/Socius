<?php
/**
*
* Simple component which spans the entire width of the page and allows for a WYSIWYG field.
*
*
**/

?>

     <!-- Start Trust Logos -->
     <section id="logos " class="logos padding-100 ">
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12 ">

                    <?php 
                        $images = get_sub_field('logo_gallery');
                        if( $images ): 
                    ?>

                        <div class="logos-slider background-fullwidth">

                                <?php foreach( $images as $image ): ?>

                                    <div class="item ">
                                        <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid mx-auto" alt="<?php echo esc_attr($image['alt']); ?>">
                                    </div>

                                <?php endforeach; ?>

                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
    <!-- End Trust Logos  -->



     <!-- Start  Git in touch -->
     <section id="git_in_touch " class="git-in-touch padding-150 ">
        <div class="container ">
            <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-12 px-0">
                
                <?php echo get_sub_field('map_iframe');?>
            
                </div>

                <?php 
                    $reviews = get_sub_field('reviews');
                    if( $reviews ): 
                ?>
                <div class="col-lg-6 col-md-6 col-sm-12 px-0">
                        <div class="reviews-slider">
                            <?php foreach( $reviews as $review ): ?>
                                <div class="item">
                                    <h4><?php echo get_the_title( $review->ID ); ?></h4>
                                    <p><?php echo get_field('review_content', $review->ID); ?></p>
                                    <span class="by">- <?php echo get_field('review_by', $review->ID); ?></span>
                                    <a href="# " class="button ">View All Reviews</a>
                                </div>
                            <?php endforeach; ?>   
                        </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- End  Git in touch  -->


