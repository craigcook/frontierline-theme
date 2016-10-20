<?php
/**
 * The template used for displaying posts in the featured post grid
 *
 * @package Baseline
 */
$image_class = has_post_thumbnail() ? 'with-featured-image' : 'without-featured-image';
?>

	<div id="post-<?php the_ID(); ?>" <?php post_class( $image_class .' post featured-post' ); ?>>
		<a class="grid-thumb-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<!-- Grab the image -->
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'baseline-mini-grid-thumb' );
			} else { ?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/fallback-thumb.png" />
			<?php } ?>
		</a>

		<!-- Post title and categories -->
		<div class="grid-text">
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

			<div class="grid-date">
				<span class="date"><?php echo get_the_date(); ?></span>
			</div>
		</div><!-- .grid-text -->
	</div><!-- .post -->
