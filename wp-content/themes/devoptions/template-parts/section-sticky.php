<?php
$home_dir = get_home_url();
$theme_dir = get_template_directory_uri();

$rows = get_field('info_location_info', 'general-options');

$phone = $rows[0]['phone'] ? $rows[0]['phone'] :'';
$phone_label = $rows[0]['name'] ? $rows[0]['name'] :'';
$phone2 = $rows[1]['phone'] ? $rows[1]['phone'] :'';
$phone_label2 = $rows[1]['name'] ? $rows[1]['name'] :'';
$btn_text = get_field('mobile_quote_btn_text', 'general-options') ? get_field('mobile_quote_btn_text', 'general-options') :'';
$btn_select = get_field('mobile_quote_btn_select', 'general-options') ? get_field('mobile_quote_btn_select', 'general-options') :'';

if($btn_select = 'text') {
    $btn_link = get_field('mobile_quote_btn_text_link', 'general-options');
} else {
    $btn_link = get_field('mobile_quote_btn_link', 'general-options');
}

$form_title = get_field('sticky_form_title', 'general-options') ? get_field('sticky_form_title', 'general-options') :'';
?>
<div class="sticky-nav d-block w-100">
	<div class="masthead site-header w-100">
    	<div class="header-container d-flex">
            <div class="site-branding">
        		<a class="logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
        			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
        		</a>
        	</div>
            
            <div class="sticky-form-container d-flex align-items-center bg-red white">
                <div class="quote-button upper bold d-lg-none"><a href="<?php echo $btn_link; ?>"><?php echo $btn_text; ?></a></div>
                <div class="sticky-form d-none d-lg-flex">
                    <div class="form-title bold upper"><?php echo $form_title; ?></div>
                    <?php echo display_stickyform(); ?>
                </div>
            </div>
            
        	<nav class="site-navigation bg-blue-2 white">
        	    <div class="top-nav">
                    <a class="phone d-block d-md-none" href="tel:<?php echo strip_phone_number(''.$phone.''); ?>"><i class="fal fa-phone-volume"></i></a>
                    <div class="phone-box d-none d-md-flex">
                        <a class="phone upper" href="tel:<?php echo strip_phone_number(''.$phone.''); ?>"><?php echo $phone_label; ?><span><?php echo $phone; ?></span></a>
                        <a class="phone upper" href="tel:<?php echo strip_phone_number(''.$phone.''); ?>"><?php echo $phone_label2; ?><span><?php echo $phone2; ?></span></a>
                    </div>
            		<a class="menu-toggle mburger mburger--tornado" data-toggle="modal" href=".sticky-menu-lightbox"><b></b><b></b><b></b></a>
                </div>
        	</nav>
    	</div>
    </div><!-- #masthead -->
</div>
