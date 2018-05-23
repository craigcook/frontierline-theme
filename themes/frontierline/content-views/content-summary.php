<?php
/**
 * Display a post with medium image (if enabled) and summary.
 */

$post_classes = array(
  'post-summary',
);

if (get_theme_mod('frontierline_no_summary_image') === '1') {
  array_push($post_classes, 'post-thumb-disabled');
}

$yoast_title_options = null;
$yoast_disable_author = null;

// If Yoast SEO is active, get the status of author archives
if (class_exists('WPSEO_Frontend') && class_exists('WPSEO_Replace_Vars')) {
  $yoast_title_options = get_option('wpseo_titles');
  $yoast_disable_author = $yoast_title_options['disable-author'];
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
  <header class="entry-header">
    <a href="<?php the_permalink(); ?>" class="entry-link" title="<?php printf(esc_attr__('Permanent link to “%s”', 'frontierline'), the_title_attribute('echo=0')); ?>" rel="bookmark">
      <?php if (get_theme_mod('frontierline_no_summary_image') !== '1') : ?>
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
      <?php if (get_theme_mod('frontierline_no_byline') !== '1') : ?>
        <address class="vcard">
        <?php if ($yoast_disable_author === true) :
          if (function_exists('coauthors_posts_links')) :
            coauthors();
          else :
            the_author();
          endif;
        else :
          if (function_exists('coauthors_posts_links')) :
            coauthors_posts_links();
          else :
            the_author_posts_link();
          endif;
        endif; ?>
        </address>
      <?php endif; ?>

      <time class="date published" datetime="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php echo get_the_date(); ?></time>
    </div>
  <?php endif; ?>
  </header>

  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
