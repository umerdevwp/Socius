<?php
$home_dir = get_home_url();
$theme_dir = get_template_directory_uri();

// Product Selector on page
$page_product_type = get_field_object('page_product_selector');
$pvalue = $page_product_type['value'];

$title = get_field('reviews_title','general-options') ? get_field('reviews_title','general-options') :'';
$btn_text = get_field('reviews_btn_text','general-options') ? get_field('reviews_btn_text','general-options') :'';
$btn_link = get_field('reviews_btn_link','general-options') ? get_field('reviews_btn_link','general-options') :'';

$custom_img = get_field('reviews_bg_img','general-options') ? get_field('reviews_bg_img','general-options') :'';
$bgimg = isset($custom_img['sizes']['extra_large']) ? $custom_img['sizes']['extra_large'] : '';


?>

<?php if ( !'hide' == get_field('hide_reviews') ): ?>
    
<div class="section section-reviews">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-10 nopadding reviews-flex-lg">
                <div class="reviews-content section-content center-all" itemprop="review" itemscope="" itemtype="http://schema.org/Review">
                    <div class="section-header to-animate fadeInUp delay-200ms">
                        <img class="heading-icon blue-icon lazyload" data-src="<?php echo $theme_dir; ?>/images/roof-icon-blue.svg" src="<?php echo $theme_dir; ?>/images/dummy.png" alt="">
                        <div class="section-title black upper"><?php echo $title; ?></div>
                        <div class="btnbox text-center">
                            <a class="btn btn-primary" href="<?php echo $btn_link; ?>"><?php echo $btn_text; ?></a>
                        </div>
                    </div>
                    
                    <?php
                    
                    $review_cat = get_field_object('testimonial_type');
                    $cat = $review_cat['value'];
                    $label = $review_cat['choices'][ $cat ];
                    // var_dump($cat);
                    $args=array(
                        'post_type' => 'testimonial',
                        'orderby'=> 'rand',
                        'posts_per_page' => 1,
                        'meta_query'	=> array(
                    		'relation'		=> 'OR',
                    		array(
                    			'key'		=> 'testimonial_type',
                    			'value'		=> $pvalue,
                    			'compare'	=> 'LIKE'
                    		),
                    	),
                    );
                    
                    $wp_query = null;
                    $wp_query = new WP_Query($args);
                    if( $wp_query->have_posts() ) {
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                    $review_stars = get_field('testimonial_stars');
                    $review_title = get_field('testimonial_title');
                    $review_excerpt = get_field('testimonial_excerpt');
                    ?>
                    <div class="review-body-wrap text-center to-animate fadeInUp delay-400ms">
                        <?php if($review_title){ echo '<div class="review-title h1 upper">' . $review_title . '</div>'; } ?>
                        
                        <?php
                        if($review_excerpt) {
                            echo '<div class="review-text black" itemprop="reviewBody">'.$review_excerpt.'</div>';
                        } else {
                            $content = wp_trim_words( get_the_content(), 275, '...' );
                            $content = '<div class="review-text black" itemprop="reviewBody">'.$content.'</div>';
                            echo apply_filters('the_content', $content);
                        }
                        ?>
                        
                        <div class="review-author upper blue bold"><?php the_title(); ?></div>
                        <div class="review-stars yellow">
                            <?php if($review_stars) { for($i = 0; $i < $review_stars; ++$i){ echo '<img class="lazyload" data-src="'.$theme_dir.'/images/star.svg" src="'.$theme_dir.'/images/dummy.png" alt="review-star" />'; } }?>
                        </div>
                        <span class="average d-none" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
                            <meta itemprop="worstRating" content="1">
                            <meta itemprop="ratingValue" content="<?php echo $review_stars; ?>">
                            <meta itemprop="bestRating" content="5">
                            <meta itemscope="" itemprop="name" content="<?php bloginfo( 'name' ); ?>" itemtype="http://schema.org/Organization">
                        </span>
                    </div>
                    <?php
                      endwhile;
                      wp_reset_query();  // Restore global post data stomped by the_post().
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="reviews-image bg-img d-none d-lg-block lazyload to-animate fadeInUp" data-bg="<?php echo $bgimg; ?>">
        <div class="review-gradient"></div>
        <div class="review-gradient bottom"></div>
        <div class="review-gradient right"></div>
    </div>
</div>

<?php endif; ?>
