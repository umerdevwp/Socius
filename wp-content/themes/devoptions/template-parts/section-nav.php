<?php
$home_dir = get_home_url();
$theme_dir = get_template_directory_uri();

$phone = get_field('main_phone', 'general-options');

if(is_front_page()) {
    $class = 'home-header' ? 'home-header' : '';
} else {
    $class = 'internal-header' ? 'internal-header' : '';
}
?>
<header class="masthead site-header <?php echo $class; ?> d-block w-100">
	<div class="header-container d-flex">
        <div class="site-branding">
    		<a class="logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
    			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
    		</a>
    	</div>

    	<nav class="site-navigation">
    	    <div class="top-nav">
                <?php wp_nav_menu( array( 'theme_location' => 'top', 'container_class'   => 'topNav d-none d-lg-flex', 'menu_class' => 'menu' ) ); ?>
                <a class="phone" href="tel:<?php echo strip_phone_number(''.$phone.''); ?>"><i class="fas fa-phone-volume"></i> <span><?php echo $phone; ?></span></a>
        		<a class="menu-toggle d-lg-none mburger mburger--tornado" href="#mmenu"><b></b><b></b><b></b></a>
            </div>
    		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class'   => 'main-nav d-none d-lg-flex', 'menu_class' => 'menu' ) ); ?>
    	</nav>
	</div>
</header><!-- #masthead -->
