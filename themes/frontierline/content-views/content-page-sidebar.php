<?php
/**
 * Display a full post with full size image.
 */
?>

<?php if (has_post_thumbnail()) : ?>
  <div class="post-image post-image-full">
    <?php the_post_thumbnail('post-full-size'); ?>
  </div>
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
