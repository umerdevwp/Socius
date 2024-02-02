<?php
$home_dir = get_home_url();
$theme_dir = get_template_directory_uri();

$title_icon = get_field('ps_title_icon', 'product-options') ? get_field('ps_title_icon', 'product-options') : '';
$title = get_field('ps_title', 'product-options') ? get_field('ps_title', 'product-options') : '';

// Centennial HI - Product Selector Form
$num = 'form6092';
$action = 'https://sociusmarketing.wufoo.com/forms/wcbwcnk1vm3y2z/';
$idstamp = 'jMsrA4dgRorrbGTwJwIN0CxIUjFc990IbMk09KzLCvY=';
?>
<div class="section section-product-selector">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="section-content center-all">
                    <div class="section-header">
                        <img class="heading-icon blue-icon lazyload" data-src="<?php echo $title_icon['url']; ?>" src="<?php echo $theme_dir; ?>/images/dummy.png" alt="">
                        <div class="section-title black upper"><?php echo $title; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-selector w-100">
        <?php if (have_rows('products', 'product-options')) : ?>
        <ul class="selector-nav">
            <?php $count = 0;
                $i = 1;
                while (have_rows('products', 'product-options')) : the_row();
                    $icon = get_sub_field('main_product_icon') ? get_sub_field('main_product_icon') : '';
                    $name = get_sub_field('main_product_name') ? get_sub_field('main_product_name') : '';
                    ?>
            <li class="<?php if (!$count) { ?> active <?php } ?>" data-tab="<?php echo $i; ?>">
                <div class="nav-items">
                    <span class="nav-icon"><img class="icon-small lazyload" data-src="<?php echo $icon['url']; ?>" src="<?php echo $theme_dir; ?>/images/dummy.png" alt="<?php echo $icon['alt']; ?>"></span>
                    <span class="nav-text upper"><?php echo $name; ?></span>
                </div>
            </li>
            <?php $count++;
                    $i++;
                endwhile; ?>
        </ul>
        <?php endif; ?>

        <div class="tab-content clearfix">
            <div class="loader-container">
                <div class="loader">Loading...</div>
            </div>
            <?php if (have_rows('products', 'product-options')) :  $count = 0;
                $i = 1;
                while (have_rows('products', 'product-options')) : the_row();
                    $icon = get_sub_field('main_product_icon') ? get_sub_field('main_product_icon') : '';
                    $name = get_sub_field('main_product_name') ? get_sub_field('main_product_name') : '';
                    $form_title = get_sub_field('main_product_form_title') ? get_sub_field('main_product_form_title') : '';
                    $form_subtitle = get_sub_field('main_product_form_subtitle') ? get_sub_field('main_product_form_subtitle') : '';
                    $form_text = get_sub_field('main_product_form_text') ? get_sub_field('main_product_form_text') : '';
                    $custom_img = get_sub_field('main_product_img') ? get_sub_field('main_product_img') : '';
                    $image = isset($custom_img['sizes']['extra_large']) ? $custom_img['sizes']['extra_large'] : '';
                    ?>
            <div class="content-box tab-pane to-animate fadeIn <?php if (!$count) { ?> active <?php } ?>" id="tab-<?php echo $i; ?>">
                <div class="product-slider default-arrows">
                    <div class="section-background-image-wrap">
                        <div class="section-background-image lazyload" data-bg="<?php echo $image; ?>"></div>
                    </div>
                    <div class="selector-form">
                        <div class="form-container">
                            <div class="form">
                                <div class="form-text-wrap white">
                                    <img class="heading-icon img-fluid lazyload" data-src="<?php echo $icon['url']; ?>" src="<?php echo $theme_dir; ?>/images/dummy.png" alt="">
                                    <div class="form-title section-title upper"><?php echo $form_title; ?></div>
                                    <div class="form-subtitle section-subtitle upper"><?php echo $form_subtitle; ?></div>
                                    <div class="form-text section-text"><?php echo $form_text; ?></div>
                                </div>
                                <div class="form-fields d-none d-lg-block">
                                    <form name="<?php echo $num; ?>" class="wufoo" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="post" novalidate action="<?php echo $action; ?>">
                                        <div class="row form-row justify-content-center">
                                            <div class="form-group name col-12">
                                                <input name="Field1" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="Full Name" data-bvalidator-msg="Please enter your full name.">
                                            </div>
                                            <div class="form-group phone col-12 col-sm-6">
                                                <input name="Field2" class="form-control phone_us" data-mask="000/000/0000" data-bvalidator="minlength[14],required" type="tel" value="" placeholder="Phone" data-bvalidator-msg="Please enter your phone number." autocomplete="off" maxlength="14">
                                            </div>
                                            <div class="form-group email col-12 col-sm-6">
                                                <input name="Field3" class="form-control" data-bvalidator="email,required" type="email" value="" placeholder="Email" data-bvalidator-msg="Please enter your email address.">
                                            </div>
                                            <div class="form-group name street col-12">
                                                <input name="Field9" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="Street Address" data-bvalidator-msg="Please enter your street address.">
                                            </div>
                                            <div class="form-group phone state col-12 col-sm-6">
                                                <input name="Field10" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="State" data-bvalidator-msg="Please enter your state.">
                                            </div>
                                            <div class="form-group email zip col-12 col-sm-6">
                                                <input name="Field11" class="form-control zip_us" data-mask="00000" data-bvalidator="minlength[5],required" type="tel" value="" placeholder="ZIP Code" data-bvalidator-msg="Please enter your zip code." autocomplete="off" maxlength="5">
                                            </div>
                                            <div class="form-group select d-none">
                                                <select name="Field4" class="form-control">
                                                    <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
                                                </select>
                                            </div>
                                            <div class="form-group submit col-12"><button name="saveForm" class="btn btn-primary" type="submit" value="Submit">Get A Quote</button></div>

                                            <div class="d-none">
                                                <label>Do Not Fill This Out</label>
                                                <input type="hidden" name="idstamp" value="<?php echo $idstamp; ?>">
                                                <input class="ppc-source" type="text" name="Field5" maxlength="255" value="">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="btnbox modal-btn text-center d-lg-none"><a class="btn btn-primary" data-toggle="modal" href=".lightbox-product-form">Get A Quote</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $count++;
                    $i++;
                endwhile;
            endif; ?>
        </div>
    </div>
</div>