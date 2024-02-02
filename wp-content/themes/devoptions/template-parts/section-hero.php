<?php
$home_dir = get_home_url();
$theme_dir = get_template_directory_uri();

// If the user has web personalization. Check to see if any sides have that interest match.
global $current_interest;
if( $current_interest ) {
    $hero_personalized_slides = get_field('hero_personalized_slides', 'general-options');
    if( $hero_personalized_slides ) {
        foreach( $hero_personalized_slides as $slide ) {
			$service_type = isset($slide['service_type']) ? $slide['service_type'] : 'general';
            if($current_interest == $service_type){
                $custom_img = $slide['personalized_hero_img'];
                $bgimg = isset($custom_img['sizes']['extra_large']) ? $custom_img['sizes']['extra_large'] : '';
            }
        }
    }
}



// If there is no personalization or there was no matching slide found, add all of the default slides to the $display_slides array.
if( !$current_interest ) {
    $custom_img = get_field('home_hero_img', 'general-options');
    $bgimg = isset($custom_img['sizes']['extra_large']) ? $custom_img['sizes']['extra_large'] : '';
}


$title = get_field('home_hero_form_title', 'general-options');
$text = get_field('home_hero_form_text', 'general-options');
$select = get_field('home_hero_btn_select', 'general-options');
$btn_text = get_field('home_hero_btn_text', 'general-options');

if($select == 'text') {
    $btn_link = get_field('home_hero_btn_text_link', 'general-options');
} else {
    $btn_link = get_field('home_hero_btn_link', 'general-options');
}
?>
<div class="section section-hero" style="background-image:url(<?php echo $bgimg; ?>);">
	<div class="container-fluid">
		<div class="header-form desk-form d-none d-lg-block to-animate fadeInUp">
            <div class="form">
                <div class="form-text-wrap">
                    <img class="heading-icon lazyload" data-src="<?php echo $theme_dir; ?>/images/roof-icon.svg" src="<?php echo $theme_dir; ?>/images/dummy.png" alt="">
                    <div class="form-title section-title upper"><?php echo $title; ?></div>
                    <div class="form-text section-text white"><?php echo $text; ?></div>
                </div>
                <?php echo display_quickform(); ?>
            </div>
        </div>
	</div>
</div>
<div class="section header-form mobile-form d-block d-lg-none">
    <div class="form">
        <div class="form-text-wrap">
            <img class="heading-icon lazyload" data-src="<?php echo $theme_dir; ?>/images/roof-icon.svg" src="<?php echo $theme_dir; ?>/images/dummy.png" alt="">
            <div class="form-title section-title upper"><?php echo $title; ?></div>
            <div class="form-text section-text white"><?php echo $text; ?></div>
        </div>
        <div class="btnbox modal-btn text-center"><a class="btn btn-primary" data-toggle="modal" href=".lightbox-form"><?php echo $btn_text; ?></a></div>
    </div>
</div>
