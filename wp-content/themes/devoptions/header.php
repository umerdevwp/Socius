<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package socius_custom
 */

$page_service_type = get_field('page_product_selector') && get_field('page_product_selector') !== '' ? get_field('page_product_selector') : '';
 
?><!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebPage">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="icon" href="<?php bloginfo('url'); ?>/favicon.ico" type="image/x-icon">

<?php wp_head(); ?>

<?php if(get_field('additional_css','code-options')) :
	echo '<style>'.get_field('additional_css','code-options').'</style>';
endif; ?>
<?php if(get_field('google_head','code-options')) { the_field('google_head','code-options'); } ?>
</head>

<body <?php body_class(); ?> data-interest="<?php echo $page_service_type; ?>">
<?php if(get_field('google_body','code-options')) { the_field('google_body','code-options'); } ?>
<div id="page" class="site d-block w-100">
	<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'socius_custom' ); ?></a>
	<!--[if lte IE 9]>
	<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	
	<?php get_template_part( 'template-parts/section-nav' ); ?>

	<?php if(is_front_page()){
		get_template_part( 'template-parts/section-hero' );
	} else {
		get_template_part( 'template-parts/section-internal-hero' );
	} ?>
        
    <?php if(is_front_page()){
        get_template_part( 'template-parts/section-about-callout' );
        get_template_part( 'template-parts/section-why-choose' );
        get_template_part( 'template-parts/section-product-selector' );
    } ?>

	<div id="content" class="site-content d-block w-100">
