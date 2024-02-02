<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package socius_custom
 */
$hide = get_field('hide_sidebar');

if(is_front_page()) {
    $class = 'home-hentry' ? 'home-hentry' : '';
} elseif ( $hide && in_array('hide',$hide) ) {
    $class = 'internal-hentry col-11 col-md-10 col-lg-10' ? 'internal-hentry col-11 col-md-10 col-lg-10' : '';
} else {
    $class = 'internal-hentry col-11 col-md-10 col-lg-7' ? 'internal-hentry col-11 col-md-10 col-lg-7' : '';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
    
    <?php if(!is_front_page()): ?>
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'socius_custom' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
    <?php endif; ?>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'socius_custom' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
