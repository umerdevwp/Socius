<?php
/**
 * socius_custom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package socius_custom
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function socius_custom_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on socius_custom, use a find and replace
	 * to change 'socius_custom' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'socius_custom', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'top' => esc_html__( 'Top', 'socius_custom' ),
		'primary' => esc_html__( 'Primary', 'socius_custom' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'socius_custom_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'socius_custom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! function_exists( 'socius_custom_content_width' ) ) :
	function socius_custom_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'socius_custom_content_width', 640 );
	}
endif;
add_action( 'after_setup_theme', 'socius_custom_content_width', 0 );


/**
* Remove Customizer from Admin
*/
function wpse200296_before_admin_bar_render() {
    global $wp_admin_bar;

    $wp_admin_bar->remove_menu('customize');
}
add_action( 'wp_before_admin_bar_render', 'wpse200296_before_admin_bar_render' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function socius_custom_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'socius_custom_pingback_header' );

/**
* Modify Editor role
*/
$role = get_role( 'editor' );
$role->add_cap( 'edit_theme_options' );
$role->add_cap( 'manage_options' );
	// Clean up the admin sidebar navigation 
	function remove_admin_menu_items() {
	    if( !(current_user_can( 'activate_plugins' )) ) {
	        $remove_menu_items = array(__('Links'),__('Media'), __('Comments'), __('Tools'), __('Settings'), __('CPT'));
	        global $menu;
	        end ($menu);
	        while (prev($menu)){
	                        $item = explode(' ',$menu[key($menu)][0]);
	                        if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
	                        unset($menu[key($menu)]);}
	        }
	        //remove_submenu_page( 'themes.php', 'widgets.php' );
	        remove_submenu_page( 'themes.php', 'themes.php');
	        unset($menu['themes.php'][5]); // Removes 'Themes'.
	    }
	}
add_action('admin_menu', 'remove_admin_menu_items');

/*
* Set Blank Version
*/
function blank_version() {
    return '';
} 
add_filter('the_generator','blank_version');

/*
* Modify login page logo to link to site homepage instead of WordPress.org
*/
function my_login_logo_url () {
    return home_url();
}
add_filter('login_headerurl', 'my_login_logo_url');