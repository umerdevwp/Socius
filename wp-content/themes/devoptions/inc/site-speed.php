<?php

// Remove script versioning
function _remove_script_version( $src ){
    if ( strpos( $src, 'ver=' ) ) {
                    $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


// Remove type tag from script calls for W3C Validation
function javascript_hide_type($src) { 
	return str_replace("type='text/javascript'", '', $src); 
} 
add_filter('script_loader_tag', 'javascript_hide_type');


// Remove jQuery Migrate Script from header and Load jQuery from Google API
function crunchify_stop_loading_wp_embed_and_jquery() {
	if (!is_admin()) {
		wp_deregister_script('wp-embed');
		wp_deregister_script('wp-emoji-release');
	}
}
add_action('init', 'crunchify_stop_loading_wp_embed_and_jquery');


// Remove Emoji loading
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );