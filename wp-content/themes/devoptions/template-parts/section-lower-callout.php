<?php
$home_dir = get_home_url();
$theme_dir = get_template_directory_uri();

$custom_img = get_field('callout_two_bg_img', 'cta-options');
$bgimg = isset($custom_img['sizes']['extra_large']) ? $custom_img['sizes']['extra_large'] : '';
$title = get_field('callout_two_title', 'cta-options');
$subtitle = get_field('callout_two_subtitle', 'cta-options');
$text = get_field('callout_two_text', 'cta-options');
$btn_text = get_field('callout_two_btn_text', 'cta-options');
$btn_link = get_field('callout_two_btn_link', 'cta-options');
$btn_text2 = get_field('callout_two_btn_text_2', 'cta-options');
$btn_link2 = get_field('callout_two_btn_link_2', 'cta-options');
$callout_mobile = get_field('callout_two_mobile_img', 'cta-options');
$callout_img = isset($callout_mobile['sizes']['extra_large']) ? $callout_mobile['sizes']['extra_large'] : '';
$callout_desk = get_field('callout_two_desktop_img', 'cta-options');
$callout_png = isset($callout_desk['sizes']['extra_large']) ? $callout_desk['sizes']['extra_large'] : '';
?>
<div class="section section-callout section-lower-callout bg-white with-image lazyload" data-bg="<?php echo $bgimg; ?>">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-10">
                <div class="callout-content section-content center-all to-animate slideInLeft">
                    <div class="section-header">
                        <?php if($title): ?>
                        <img class="heading-icon blue-icon lazyload" data-src="<?php echo $theme_dir; ?>/images/roof-icon-blue.svg" src="<?php echo $theme_dir; ?>/images/dummy.png" alt="">
                        <div class="callout-title section-title black upper"><?php echo $title; ?></div>
                        <?php endif; ?>
                        <div class="callout-subtitle section-subtitle blue upper"><?php echo $subtitle; ?></div>
                    </div>
                    <div class="callout-text section-text black"><?php echo $text; ?></div>
                    <div class="btnbox text-center">
                        <a class="btn btn-primary" href="<?php echo $btn_link; ?>"><?php echo $btn_text; ?></a>
                        <a class="btn btn-secondary" href="<?php echo $btn_link2; ?>"><?php echo $btn_text2; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="callout-image d-md-none lazyload to-animate slideInRight" data-bg="<?php echo $callout_img; ?>"></div>
    <div class="callout-image d-none d-md-block lazyload to-animate slideInRight" data-bg="<?php echo $callout_png; ?>"></div>
</div>
