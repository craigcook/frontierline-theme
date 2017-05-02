<?php
/**
 * Display a post with medium image and summary.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-summary'); ?>>

  <header class="entry-header">
    <a href="<?php the_permalink(); ?>" class="entry-link" title="<?php printf(esc_attr__('Permanent link to “%s”', 'frontierline'), the_title_attribute('echo=0')); ?>" rel="bookmark">
      <div class="post-image post-image-large">
      <?php if (has_post_thumbnail()) :
        the_post_thumbnail('post-large');
      else : ?>
        <img class="wp-post-image image-fallback color-<?php echo rand(1, 6); ?>" width="600" height="330" src="<?php echo get_template_directory_uri(); ?>/img/fallbacks/pattern-<?php echo rand(1, 6); ?>.png">
      <?php endif; ?>
      </div>

      <h2 class="entry-title"><?php the_title(); ?></h2>
    </a>

  <?php if ($post->post_type !== 'page') : ?>
    <div class="entry-info">
      <time class="date published" datetime="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php echo get_the_date(); ?></time>
    </div>
  <?php endif; ?>
  </header>

  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>

</article>
