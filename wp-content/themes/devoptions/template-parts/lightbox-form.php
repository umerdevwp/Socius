<?php
$home_dir = get_home_url();
$theme_dir = get_template_directory_uri();
$title = get_field('home_hero_form_title', 'general-options');
$text = get_field('home_hero_form_text', 'general-options');
?>
<div class="lightbox-form gallery-form">
    <div class="header-form">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="form">
            <div class="form-text-wrap">
                <img class="heading-icon lazyload" data-src="<?php echo $theme_dir; ?>/images/roof-icon.svg" src="<?php echo $theme_dir; ?>/images/dummy.png" alt="">
                <div class="form-title section-title upper"><?php echo $title; ?></div>
                <div class="form-text section-text white"><?php echo $text; ?></div>
            </div>
            <?php echo lightbox_form(); ?>
        </div>
    </div>
</div>
