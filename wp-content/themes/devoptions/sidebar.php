<?php
/**
* The sidebar containing the main widget area
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package socius_custom
*/

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
$home_dir = get_home_url();
$theme_dir = get_template_directory_uri();

// Form Title & Text
$form_title = get_field('sidebar_form_title', 'general-options') ? get_field('sidebar_form_title', 'general-options') :'';
$form_text = get_field('sidebar_form_text', 'general-options') ? get_field('sidebar_form_text', 'general-options') : '';

// Sidebar Offer Options
$offer = get_field('sidebar_offer', 'general-options');
$custom_img = $offer['sidebar_offer_img'];
$bgimg = isset($custom_img['sizes']['extra_large']) ? $custom_img['sizes']['extra_large'] : '';
$title = $offer['sidebar_offer_title'];
$text = $offer['sidebar_offer_text'];
$btn_text = $offer['sidebar_offer_btn_text'];
$btn_link = $offer['sidebar_offer_btn_link'];

$hide_form = get_field('hide_form');
if ( $hide_form && in_array('hide',$hide_form) ) {
    $hideform = 'no-form';
} else {
    $hideform = '';
}


?>

<?php if ( !'hide' == get_field('hide_sidebar') ): ?>

<aside class="section widget-area sidebar col-11 col-md-10 col-lg-4 col-xl-3 <?php echo $hideform; ?>">
    <div class="sidebar-inner">
        <div class="sidebar-sticky">
        
            <?php if ( !'hide' == get_field('hide_form') ): ?>
                
            <div class="sidebar-form d-none d-lg-flex">
                <div class="form">
                    <div class="form-text-wrap">
                        <div class="form-title section-title upper"><?php echo $form_title; ?></div>
                        <div class="form-text section-text white"><?php echo $form_text; ?></div>
                    </div>
                    <?php echo sidebar_form(); ?>
                </div>
            </div>
            
            <?php endif; ?>
            
            <?php if ( !'hide' == get_field('hide_cta') ): ?>
                
            <div class="sidebar-cta lazyload" data-bg="<?php echo $bgimg; ?>">
                <div class="cta">
                    <div class="cta-text-wrap">
                        <?php if($title){ echo '<div class="cta-title section-title upper">' . $title . '</div>'; } ?>
                        <?php if($text){ echo '<div class="cta-text section-text white">' . $text . '</div>'; } ?>
                        <?php if($btn_text): ?>
                        <div class="btnbox text-center">
        					<a class="btn btn-primary" href="<?php echo $btn_link; ?>"><?php echo $btn_text; ?></a>
        				</div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
            
            <?php endif; ?>
        </div>
    </div>
</aside><!-- #secondary -->

<?php endif; ?>
