<?php
$home_dir = get_home_url();
$theme_dir = get_template_directory_uri();

// Product Selector on page
$page_product_type = get_field('page_product_selector');

if(!empty($page_product_type)) {

    $ctas = get_field('product_ctas', 'cta-options');

    if($ctas) {
        foreach ($ctas as $cta) {
            $product_type = $cta['product_cta_type'];
            if($product_type == $page_product_type){
                $custom_img = $cta['product_cta_img'];
                $bgimg = isset($custom_img['sizes']['extra_large']) ? $custom_img['sizes']['extra_large'] : '';
                $title = $cta['product_cta_title'];
                $text = $cta['product_cta_text'];
                $btn_text = $cta['product_cta_btn_text'];
                $btn_select = $cta['product_cta_btn_select'];
                if($btn_select == 'off') {
                    $btn_link = $cta['product_cta_btn_link_off'];
                    $target = 'target="_blank"';
                } else {
                    $btn_link = $cta['product_cta_btn_link'];
                    $target = 'target="_self"';
                }
            }
        }
    }

} else {
    
    $cta = get_field('default_cta', 'cta-options');
        
    $custom_img = $cta['product_cta_img'];
    $bgimg = isset($custom_img['sizes']['extra_large']) ? $custom_img['sizes']['extra_large'] : '';
    $title = $cta['product_cta_title'];
    $text = $cta['product_cta_text'];
    $btn_text = $cta['product_cta_btn_text'];
    $btn_select = $cta['product_cta_btn_select'];
    if($btn_select == 'off') {
        $btn_link = $cta['product_cta_btn_link_off'];
        $target = 'target="_blank"';
    } else {
        $btn_link = $cta['product_cta_btn_link'];
        $target = 'target="_self"';
    }
    
}
?>
<?php if ( !'hide' == get_field('hide_full_cta') ): ?>
    
<div class="section section-full-cta lazyload" data-bg="<?php echo $bgimg; ?>">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-10">
                <div class="section-content center-all">
                    <div class="section-header to-animate fadeInUp">
                        <div class="section-title white upper"><?php echo $title; ?></div>
                    </div>
                    <div class="section-text white to-animate fadeInUp delay-400ms"><?php echo $text; ?></div>
                    <div class="btnbox text-center to-animate fadeInUp delay-600ms">
                        <a class="btn btn-primary" href="<?php echo $btn_link; ?>" <?php echo $target; ?>><?php echo $btn_text; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>
