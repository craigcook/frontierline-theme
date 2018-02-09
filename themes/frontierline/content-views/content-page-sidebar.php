<?php
/**
 * Display a full post with full size image.
 */
?>

<?php if (get_theme_mod('frontierline_no_post_thumbnail') !== '1') : ?>
  <?php if (has_post_thumbnail()) : ?>
    <?php if (get_post_meta(get_the_ID(), '_frontierline_display_hero', true) == 1) : ?>
      <div class="post-image post-image-featured">
        <?php the_post_thumbnail('post-full-size'); ?>
      </div>
     <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>

<header class="entry-header">

  <h1 class="entry-title">
    <?php the_title(); ?>
  </h1>

  <div class="entry-info">
  <?php edit_post_link(__('Edit', 'frontierline' ), '<p class="edit">', '</p>'); ?>
  </div>
</header>

<article id="post-<?php the_ID(); ?>" <?php post_class('page page--sidebar'); ?>>

  <div class="entry-content">
    <?php the_content(__('Continue reading…', 'frontierline')); ?>
    <?php wp_link_pages(array('before' => '<p class="pages" role="navigation"><span>' . __('Pages:', 'frontierline') . '</span>', 'after' => '</p>')); ?>
  </div>

</article><!-- #post -->
