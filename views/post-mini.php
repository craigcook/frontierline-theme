<?php
/**
 * Display a post with just the thumbnail, title, and date.
 */
?>

<div <?php post_class('post post-mini'); ?>>
  <a class="entry-link" href="<?php the_permalink(); ?>">
  <?php if ( has_post_thumbnail() ) :
    the_post_thumbnail('post-thumbnail');
  else : ?>
    <img class="wp-post-image" width="300" height="165" src="<?php echo get_template_directory_uri(); ?>/img/fallback-thumb.png">
  <?php endif; ?>
    <h5 class="entry-title"><?php the_title(); ?></h5>
  </a>
  <time class="date" datetime="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php echo get_the_date(); ?></time>
</div>
