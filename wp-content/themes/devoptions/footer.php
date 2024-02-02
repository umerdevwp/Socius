<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package socius_custom
 */
global $form_icons;
?>

	</div><!-- #content -->

	<?php if(is_front_page()){
        get_template_part( 'template-parts/section-gallery' );
        get_template_part( 'template-parts/section-lower-callout' );
    } ?>

	<?php if(!is_front_page()){
        get_template_part( 'template-parts/section-gallery' );
        get_template_part( 'template-parts/section-full-cta' );
    } ?>

	<?php
		get_template_part( 'template-parts/section-reviews' );
		get_template_part( 'template-parts/section-trust-logos' );
		get_template_part( 'template-parts/section-footer' );
        get_template_part( 'template-parts/section-sticky' );
        get_template_part( 'template-parts/mobile-app-nav' );
    ?>

</div><!-- #page -->

<div id="mmenu">
	<?php //Stitch together menus
		$topmenu = '';
		$redmenu = '';
		if ( has_nav_menu( 'top' ) ) { $topmenu = wp_nav_menu( array (  'echo' => false, 'theme_location' => 'top', 'items_wrap' => '%3$s' , 'container' => false)); }
		if ( has_nav_menu( 'primary' ) ) {$redmenu = wp_nav_menu( array (  'echo' => false, 'theme_location' => 'primary', 'items_wrap' => '%3$s' , 'container' => false)); }
		echo '<ul id="mobile-menu">'. $redmenu . $topmenu  . '</ul>';
	?>
</div>

<?php wp_footer(); ?>

<?php if(get_field('additional_js','code-options')) :
	echo '<script>'.get_field('additional_js','code-options').'</script>';
endif; ?>

<?php if(get_field('chat_js','code-options')) :
	the_field('chat_js','code-options');
endif; ?>

<!-- Custom PHP variables to be read by main.js -->
<script>
    var settings = {
        company: {
            name: '<?php echo get_bloginfo( 'name' ); ?>'
        }
    };
    
    var form_icons = <?php echo json_encode($form_icons); ?>;
</script>

<?php get_template_part( 'template-parts/lightbox-form' ); ?>
<?php get_template_part( 'template-parts/lightbox-product-form' ); ?>
<?php get_template_part( 'template-parts/lightbox-why-choose' ); ?>
<?php get_template_part( 'template-parts/sticky-menu-lightbox' ); ?>

<?php get_template_part( 'inc/ppc-scripts' ); ?>

</body>
</html>
