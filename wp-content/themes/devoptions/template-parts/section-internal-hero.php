<?php
$home_dir = get_home_url();
$theme_dir = get_template_directory_uri();

// Default internal banner options => Theme Settings => Hero Options =>
$offer = get_field('hero_offer','general-options') ? get_field('hero_offer','general-options') : '';
$text = $offer['offer_text'] ? $offer['offer_text'] : '';
$btn_text = $offer['offer_btn_text'] ? $offer['offer_btn_text'] : '';
$btn_select = $offer['offer_btn_select'] ? $offer['offer_btn_select'] : '';
$btn_page_link = $offer['offer_btn_link'] ? $offer['offer_btn_link'] : '';
$btn_text_link = $offer['offer_btn_text_link'] ? $offer['offer_btn_text_link'] : '';
$title = get_the_title();

if($btn_select == 'text') {
    $btn_link = $btn_text_link;
} else {
    $btn_link = $btn_page_link;
}

// Internal Page fields
$hide_btn = get_field('hero_btn_hide');

$hero_select = get_field('hero_select');
if($hero_select[0] == 'add') {
    // var_dump($hero_select[0]);
    $hero_title = get_field('hero_title');
    $hero_text = get_field('hero_text');
    $hero_btn_select = get_field('hero_btn_select');
    $hero_btn_text = get_field('hero_btn_text');
    $hero_btn_link = get_field('hero_btn_link');
    $hero_btn_text_link = get_field('hero_btn_text_link');
    $custom_img = get_field('hero_img');
    $bgimg = isset($custom_img['sizes']['extra_large']) ? $custom_img['sizes']['extra_large'] : '';
    if($hero_title){
        $title = $hero_title;
    }
    if($hero_text){
        $text = $hero_text;
    }
    if($hero_btn_text){
        $btn_text = $hero_btn_text;
    }
    if($hero_btn_select == 'text' && $hero_btn_text_link) {
        $btn_link = $hero_btn_text_link;
    }
    if($hero_btn_select == 'page' && $hero_btn_link) {
        $btn_link = $hero_btn_link;
    }
}

if( !$bgimg ) {
	$random_hero_repeater = get_field('random_hero', 'general-options');
	if( $random_hero_repeater ) {
		shuffle($random_hero_repeater);
		$random_repeater_row = $random_hero_repeater[0];
		$bgimg = isset($random_repeater_row['random_img']['sizes']['extra_large']) ? $random_repeater_row['random_img']['sizes']['extra_large'] : '';
	}
}
?>
<div class="section section-hero internal-hero" style="background-image:url(<?php echo $bgimg; ?>);">
	<div class="container-fluid">
		<div class="hero-text-box">
            <div class="hero-text-wrap">
                <div class="section-title upper white to-animate fadeInUp"><?php echo $title; ?></div>
                <div class="section-text white to-animate fadeInUp delay-400ms"><?php echo $text; ?></div>
				<?php if(!'hide' == $hide_btn): ?>
                <div class="btnbox text-left to-animate fadeInUp delay-600ms">
					<a class="btn btn-primary" href="<?php echo $btn_link; ?>"><?php echo $btn_text; ?></a>
				</div>
                <?php endif; ?>
            </div>
        </div>
	</div>
</div>
