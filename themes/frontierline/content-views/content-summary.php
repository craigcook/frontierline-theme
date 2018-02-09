<?php
/**
 * Display a post with medium image (if enabled) and summary.
 */

$post_classes = array(
  'post-summary',
);

if (get_theme_mod('frontierline_no_post_thumbnail') === '1') {
  array_push($post_classes, 'post-thumb-disabled');
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?> >

  <header class="entry-header">
    <a href="<?php the_permalink(); ?>" class="entry-link" title="<?php printf(esc_attr__('Permanent link to “%s”', 'frontierline'), the_title_attribute('echo=0')); ?>" rel="bookmark">
      <?php if (get_theme_mod('frontierline_no_post_thumbnail') !== '1') : ?>
        <div class="post-image post-image-large">
        <?php if (has_post_thumbnail()) :
          the_post_thumbnail('post-large');
        else : ?>
          <img class="wp-post-image image-fallback color-<?php echo frontierline_fallback_image_num(get_the_ID()); ?>" width="600" height="330" src="<?php echo get_template_directory_uri(); ?>/img/fallbacks/pattern-<?php echo frontierline_fallback_image_num(get_the_ID()); ?>.png">
        <?php endif; ?>
        </div>
      <?php endif; ?>
      <h2 class="entry-title"><?php the_title(); ?></h2>
    </a>

  <?php if ($post->post_type !== 'page') : ?>
    <div class="entry-info">
      <address class="vcard">
      <?php if (function_exists('coauthors_posts_links')) :
        coauthors_posts_links();
      else :
        the_author_posts_link();
      endif; ?>
      </address>

      <time class="date published" datetime="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php echo get_the_date(); ?></time>
    </div>
  <?php endif; ?>
  </header>

  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>

</article>
