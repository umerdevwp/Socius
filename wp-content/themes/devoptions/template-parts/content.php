<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package socius_custom
 */

?>

<?php if(is_singular()): ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
				<header class="entry-header">
					<h1 class="entry-title nomargin-top"><?php the_title(); ?></h1>
					<span><?php echo get_the_date('M d, Y'); ?></span>
				</header><!-- .entry-header -->

				<div class="entry-content-single">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
		</div>
	</article><!-- #post-->

<?php else: ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="row entry-content">
			<?php $thumbnail = get_the_post_thumbnail_url( get_the_ID(), 'large', array( 'class' => 'img-responsive' ) ); ?>

			<?php if ( !empty($thumbnail )): ?>
				<div class="col-md-4 blog-featured-img-container"><a href="<?php the_permalink(); ?>" class="blog-featured-img" style="background-image: url(<?php echo $thumbnail; ?>);"></a></div>
				<div class="col-md-4"></div>
				<div class="col-md-8">
			<?php elseif(!empty(first_image_in_post())): ?>
				<div class="col-md-4 blog-featured-img-container"><a href="<?php the_permalink(); ?>" class="blog-featured-img" style="background-image: url(<?php echo first_image_in_post(); ?>);"></a></div>
				<div class="col-md-4"></div>
				<div class="col-md-8">
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
			</div>
		</div><!-- .row -->
	</article><!-- #post-## -->

<?php endif; ?>