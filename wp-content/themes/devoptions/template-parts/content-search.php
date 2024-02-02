<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package socius_custom
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row entry-content">
		<?php $thumbnail = get_the_post_thumbnail_url( get_the_ID(), 'medium', array( 'class' => 'img-responsive' ) ); ?>

		<?php if ( !empty($thumbnail )): ?>
			<div class="col-md-5 blog-featured-img-container"><div class="blog-featured-img" style="background-image: url(<?php echo $thumbnail; ?>);"></div></div>
			<div class="col-md-5"></div>
			<div class="col-md-7">
		<?php elseif(!empty(first_image_in_post())): ?>	
			<div class="col-md-5 blog-featured-img-container"><div class="blog-featured-img" style="background-image: url(<?php echo first_image_in_post(); ?>);"></div></div>
			<div class="col-md-5"></div>
			<div class="col-md-7">
		<?php else: ?>
			<div class="col-md-12">
		<?php endif; ?>
	
			<header class="entry-header">
				<h2 class="entry-title nomargin-top"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<span><?php echo get_the_date('M d, Y'); ?></span>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>" class="btn btn-default">Read More</a>
			</div><!-- .entry-content -->

			<div class="entry-meta">
				<?php // get_template_part( 'partials/entry-footer', get_post_type() ); ?>
			</div><!-- .entry-meta -->
		</div>
	</div><!-- .row -->
</article><!-- #post-## -->