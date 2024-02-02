<?php
$home_dir = get_home_url();
$theme_dir = get_template_directory_uri();

// Product Selector on page
$page_product_type = get_field('page_product_selector');

if(is_front_page()){
    $title = get_field('gallery_home_title', 'general-options');
} else {
    $title = get_field('gallery_internal_title', 'general-options');
}

if(is_front_page()){
    $custom_img = get_field('gallery_bg', 'general-options');
    $bgimg = isset($custom_img['sizes']['extra_large']) ? $custom_img['sizes']['extra_large'] : '';
}
?>

<?php if ( !'hide' == get_field('hide_gallery') ): ?>
    
<div class="section section-gallery with-image lazyload" data-bg="<?php echo $bgimg; ?>">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12 nopadding">
                <div class="section-content center-all to-animate fadeInUp">
                    <div class="section-header">
                        <?php if(is_front_page()): ?>
                        <img class="heading-icon blue-icon lazyload" data-src="<?php echo $theme_dir; ?>/images/roof-icon-blue.svg" src="<?php echo $theme_dir; ?>/images/dummy.png" alt="">
                        <?php endif; ?>
                        <div class="section-title black upper"><?php echo $title; ?></div>
                    </div>
                </div>
            </div>
            <div class="gallery-container w-100 d-flex justify-content-center" data-name="<?php echo $page_product_type; ?>">
                
                <?php if( have_rows('galleries','product-options') ): ?>
            	<ul class="nav nav-tabs main-tabs upper to-animate fadeInUp delay-200ms" role="tablist">
            	<?php $count = 0; $i = 1; while( have_rows('galleries','product-options') ): the_row();
                    $type = get_sub_field_object('gallery_product_type');
                    $value = $type['value'];
                    $label = $type['choices'][ $value ];
                    // var_dump($label);
                    
                    if(!empty($page_product_type)) {
                        if($page_product_type == $value) {
                            $active = 'active show';
                        } else {
                            $active = '';
                        }
                    } else {
                        if(!$count) {
                            $active = 'active show';
                        } else {
                            $active = '';
                        }
                    }
            		?>
                    
                    <li><a class="gallery-item <?php echo $active ?>" href="#<?php echo $value; ?>-gallery" role="tab" data-toggle="tab" aria-selected="false"><?php echo $label; ?></a> </li>
            	<?php $count++; $i++; endwhile; ?>
            	</ul>
                <?php endif; ?>
                
                <?php if( have_rows('galleries','product-options') ): ?>
                <div class="tab-content">
                    <?php $count = 0; while( have_rows('galleries','product-options') ): the_row();
            		$type = get_sub_field_object('gallery_product_type');
                    $value = $type['value'];
                    $label = $type['choices'][ $value ];
            		$images = get_sub_field('gallery') ? get_sub_field('gallery') :'';
                
                    if(!empty($page_product_type)) {
                        if($page_product_type == $value) {
                            $active = 'active show';
                        } else {
                            $active = '';
                        }
                    } else {
                        if(!$count) {
                            $active = 'active show';
                        } else {
                            $active = '';
                        }
                    }
            		?>
                    <div id="<?php echo $value; ?>-gallery" class="tab-pane <?php echo $active ?> to-animate fadeInUp">
                        <div class="tab-inner">
                            <?php $i=1; foreach( $images as $image ): ?>
                            <a class="gallery-image gallery-image-<?php echo $i; ?> custom-lightbox" data-fancybox="gallery-<?php echo $value; ?>" href="<?php echo $image['sizes']['extra_large']; ?>"><div class="gall-bg lazyload" data-bg="<?php echo $image['sizes']['medium_large']; ?>"></div></a>
                            <?php $i++; endforeach; ?>
                        </div>
                    </div>
                    <?php $count++; endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>
