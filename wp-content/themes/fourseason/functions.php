<?php
/**
 * Four Season Home Products functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Best_Made
 * @since 1.0.0
 */

/**
 * Twenty Nineteen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'fshp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fshp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change 'twentynineteen' to the name of your theme in all the template files.
		 */
		//load_theme_textdomain( 'twentynineteen', get_template_directory() . '/languages' );

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
		//set_post_thumbnail_size( 1920, 1200 );


		add_image_size( 'post-featured-image', 1920, 590, true );
		//add_image_size( 'post-list-image', 230, 250, true );
		//add_image_size( 'post-archive-image', 600, 400, true  );
		//add_image_size( 'block-item-image', 510, 310 );
		//add_image_size( 'more-item-image', 410, 310 );
		

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'fshp_setup' );



/**
 * Enqueue scripts and styles.
 */
function fshp_css_styles() {

	wp_enqueue_style( 'fshp-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' , array(), wp_get_theme()->get( 'Version' ), 'all' );
	wp_enqueue_style( 'fshp-slick', get_template_directory_uri() . '/assets/css/slick.css' , array(), wp_get_theme()->get( 'Version' ), 'all' );
	wp_enqueue_style( 'fshp-slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css' , array(), wp_get_theme()->get( 'Version' ), 'all' );
	//wp_enqueue_style( 'fshp-helper-styles', get_template_directory_uri() . '/assets/css/helper.css' , array(), wp_get_theme()->get( 'Version' ), 'all' );
	wp_enqueue_style( 'fshp-fontawesome', get_template_directory_uri() . '/assets/css/fontawesome-all.min.css' , array(), wp_get_theme()->get( 'Version' ), 'all' );
	wp_enqueue_style( 'fshp-fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css' , array(), wp_get_theme()->get( 'Version' ), 'all' );
	wp_enqueue_style( 'fshp-custom-portfolio', get_template_directory_uri() . '/assets/css/custom-portfolio.min.css' , array(), wp_get_theme()->get( 'Version' ), 'all' );

	wp_enqueue_style( 'fshp-styles', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	
}
add_action( 'wp_enqueue_scripts', 'fshp_css_styles' );



function fshp_js_scripts() {

	wp_enqueue_script( 'fshp-vendor-jquery',  'https://code.jquery.com/jquery-3.4.1.slim.min.js', array( 'jquery' ), '3.4.1', true);
	wp_enqueue_script( 'fshp-pooper-script',  get_template_directory_uri()  . '/assets/js/popper.min.js', array( 'jquery' ), '1.0', true);
	wp_enqueue_script( 'fshp-bootstrap-script',  get_template_directory_uri()  . '/assets/js/bootstrap.min.js', array( 'jquery' ), '1.0', true);
	wp_enqueue_script( 'fshp-slick-script',  get_template_directory_uri()  . '/assets/js/slick.min.js', array( 'jquery' ), '1.0', true);
	wp_enqueue_script( 'fshp-customportfolio-script',  get_template_directory_uri()  . '/assets/js/jquery.customportfolio.min.js', array( 'jquery' ), '1.0', true);
	wp_enqueue_script( 'fshp-fancybox-script',  get_template_directory_uri()  . '/assets/js/jquery.fancybox.min.js', array( 'jquery' ), '1.0', true);

	wp_enqueue_script( 'fshp-main-script',  get_template_directory_uri()  . '/assets/js/main.js', array( 'jquery' ), '1.0', true);

}

add_action('wp_enqueue_scripts', 'fshp_js_scripts', 999);

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
	  array_pop($excerpt);
	  $excerpt = implode(" ",$excerpt).'...';
	} else {
	  $excerpt = implode(" ",$excerpt);
	}	
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
  }


if ( ! function_exists('custom_post_type') ) {

	// Register Custom Post Type
	function custom_post_type() {
	
		$labels = array(
			'name'                  => _x( 'Products', 'Post Type General Name', 'fshp' ),
			'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'fshp' ),
			'menu_name'             => __( 'Products', 'fshp' ),
			'name_admin_bar'        => __( 'Products', 'fshp' ),
			'archives'              => __( 'Products Archives', 'fshp' ),
			'attributes'            => __( 'Products Attributes', 'fshp' ),
			'parent_item_colon'     => __( 'Parent Product:', 'fshp' ),
			'all_items'             => __( 'All Products', 'fshp' ),
			'add_new_item'          => __( 'Add New Product', 'fshp' ),
			'add_new'               => __( 'Add New', 'fshp' ),
			'new_item'              => __( 'New Product', 'fshp' ),
			'edit_item'             => __( 'Edit Product', 'fshp' ),
			'update_item'           => __( 'Update Product', 'fshp' ),
			'view_item'             => __( 'View Product', 'fshp' ),
			'view_items'            => __( 'View Products', 'fshp' ),
			'search_items'          => __( 'Search Product', 'fshp' ),
			'not_found'             => __( 'Not found', 'fshp' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'fshp' ),
			'featured_image'        => __( 'Featured Image', 'fshp' ),
			'set_featured_image'    => __( 'Set featured image', 'fshp' ),
			'remove_featured_image' => __( 'Remove featured image', 'fshp' ),
			'use_featured_image'    => __( 'Use as featured image', 'fshp' ),
			'insert_into_item'      => __( 'Insert into product', 'fshp' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'fshp' ),
			'items_list'            => __( 'Products list', 'fshp' ),
			'items_list_navigation' => __( 'Products list navigation', 'fshp' ),
			'filter_items_list'     => __( 'Filter products list', 'fshp' ),
		);
		$args = array(
			'label'                 => __( 'Product', 'fshp' ),
			'description'           => __( 'Bestmade featured products list.', 'fshp' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'revisions' ),
			'taxonomies'            => array(  ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-tickets-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'product', $args );
	
	}
	add_action( 'init', 'custom_post_type', 0 );
	
	}


	if ( ! function_exists('reviews_custom_post_type') ) {

		// Register Custom Post Type
		function reviews_custom_post_type() {
		
			$labels = array(
				'name'                  => _x( 'Reviews', 'Post Type General Name', 'fshp' ),
				'singular_name'         => _x( 'Review', 'Post Type Singular Name', 'fshp' ),
				'menu_name'             => __( 'Reviews', 'fshp' ),
				'name_admin_bar'        => __( 'Reviews', 'fshp' ),
				'archives'              => __( 'Reviews Archives', 'fshp' ),
				'attributes'            => __( 'Reviews Attributes', 'fshp' ),
				'parent_item_colon'     => __( 'Parent Review:', 'fshp' ),
				'all_items'             => __( 'All Reviews', 'fshp' ),
				'add_new_item'          => __( 'Add New Review', 'fshp' ),
				'add_new'               => __( 'Add New', 'fshp' ),
				'new_item'              => __( 'New Review', 'fshp' ),
				'edit_item'             => __( 'Edit Review', 'fshp' ),
				'update_item'           => __( 'Update Review', 'fshp' ),
				'view_item'             => __( 'View Review', 'fshp' ),
				'view_items'            => __( 'View Reviews', 'fshp' ),
				'search_items'          => __( 'Search Review', 'fshp' ),
				'not_found'             => __( 'Not found', 'fshp' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'fshp' ),
				'featured_image'        => __( 'Featured Image', 'fshp' ),
				'set_featured_image'    => __( 'Set featured image', 'fshp' ),
				'remove_featured_image' => __( 'Remove featured image', 'fshp' ),
				'use_featured_image'    => __( 'Use as featured image', 'fshp' ),
				'insert_into_item'      => __( 'Insert into eview', 'fshp' ),
				'uploaded_to_this_item' => __( 'Uploaded to this item', 'fshp' ),
				'items_list'            => __( 'Reviews list', 'fshp' ),
				'items_list_navigation' => __( 'Reviews list navigation', 'fshp' ),
				'filter_items_list'     => __( 'Filter reviews list', 'fshp' ),
			);
			$args = array(
				'label'                 => __( 'Reviews', 'fshp' ),
				'description'           => __( 'Four Season Home Products reviews list.', 'fshp' ),
				'labels'                => $labels,
				'supports'              => array( 'title', 'revisions' ),
				'taxonomies'            => array(  ),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 6,
				'menu_icon'             => 'dashicons-excerpt-view',
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => false,
				'can_export'            => true,
				'has_archive'           => true,
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'post',
			);
			register_post_type( 'review', $args );
		
		}
		add_action( 'init', 'reviews_custom_post_type', 0 );
		
		}



if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Global Options',
		'menu_title'	=> 'Global Options',
		'menu_slug' 	=> 'theme-global-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	
	
}

function filter_plugin_updates( $value ) {
    unset( $value->response['advanced-custom-fields-pro/acf.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

remove_filter('term_description','wpautop');
