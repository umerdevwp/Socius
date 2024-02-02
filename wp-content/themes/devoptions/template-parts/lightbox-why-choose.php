<?php
$home_dir = get_home_url();
$theme_dir = get_template_directory_uri();

// Theme Options => Mobile Area
$title1 = get_field('sticky_menu_title_1', 'general-options') ? get_field('sticky_menu_title_1', 'general-options') :'';
$title2 = get_field('sticky_menu_title_2', 'general-options') ? get_field('sticky_menu_title_2', 'general-options') :'';

?>

<div class="lightbox-why-choose">
    <div class="lightbox-inner w-100">
        <button type="button" class="close upper" data-dismiss="modal" aria-label="Close">
          <span class="" aria-hidden="true">Close Menu <i class="fas fa-times"></i></span>
        </button>
        <div class="d-flex flex-row flex-wrap justify-content-center">
            <div class="cta-lightbox-container col-10 col-md-12">
                <?php if( have_rows('why_choose', 'cta-options') ): ?>
                <div class="cta-slider">
                <?php $i=1; while( have_rows('why_choose', 'cta-options') ): the_row();
                    $select = get_sub_field('why_link_select_lightbox');
                    $page_link = get_sub_field('why_link_lightbox') ? get_sub_field('why_link_lightbox') : '';
                    $text_link = get_sub_field('why_text_link_lightbox') ? get_sub_field('why_text_link_lightbox') : '';
                    $title = get_sub_field('why_title') ? get_sub_field('why_title') : '';
                    $text = get_sub_field('why_text') ? get_sub_field('why_text') : '';
                    $btn_text = get_sub_field('why_btn_text_lightbox') ? get_sub_field('why_btn_text_lightbox') : '';
                    $image = get_sub_field('why_img');
                    $img = isset($image['sizes']['large']) ? $image['sizes']['large'] : '';
                    
                    if($select == 'page') {
                        $btn_link = $page_link;
                    } else {
                        $btn_link = $text_link;
                    }
                    ?>
                    <div class="cta-box bg-red d-flex flex-column flex-md-row align-content-center justify-content-md-between">
                        <div class="cta-img-box lazyload" data-bg="<?php echo $img; ?>"></div>
                        <div class="cta-text-box">
                            <div class="cta-title semi-bold white"><?php echo $title; ?></div>
                            <div class="cta-text light white"><?php echo $text; ?></div>
                            <div class="btnbox"><a class="btn btn-dark" href="<?php echo $btn_link; ?>"><?php echo $btn_text; ?></a></div>
                        </div>
                    </div>
                <?php $i++; endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
