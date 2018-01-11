<?php
/**
 * Display a post with just the thumbnail, title, and date.
 */
?>

<div class="post-mini">
  <a class="entry-link" href="<?php the_permalink(); ?>">
  <?php if (has_post_thumbnail()) :
    $thumb_id = get_post_thumbnail_id();
    $thumb_url = wp_get_attachment_image_src($thumb_id, 'post-thumbnail', true);
  ?>
    <img class="post-image" width="300" height="165" alt="" src="<?php echo get_template_directory_uri(); ?>/img/place-thumb.png" data-src="<?php echo $thumb_url[0]; ?>">
  <?php else : ?>
    <img class="post-image image-fallback color-<?php echo frontierline_fallback_image_num(get_the_ID()); ?>" width="300" height="165" alt="" src="<?php echo get_template_directory_uri(); ?>/img/place-thumb.png" data-src="<?php echo get_template_directory_uri(); ?>/img/fallbacks/pattern-<?php echo frontierline_fallback_image_num(get_the_ID()); ?>.png">
  <?php endif; ?>
    <h5 class="entry-title"><?php the_title(); ?></h5>
  </a>
  <time class="date" datetime="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php echo get_the_date(); ?></time>
</div>
