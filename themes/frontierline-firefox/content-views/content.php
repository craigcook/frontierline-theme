<?php
/**
 * Display a full post, no featured image.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
  <header class="entry-header">
    <div class="entry-tools">
    <?php if (has_category()) : ?>
      <div class="categories">
        <b><?php _e('Categories:', 'frontierline'); ?></b>
        <?php the_category(' ') ?>
      </div>
    <?php endif; ?>

    <?php if ((is_single() && get_option('frontierline_share_posts') == 1) || (is_page() && get_option('frontierline_share_pages') == 1)) :
        get_template_part('includes/social-share');
       endif; ?>
    </div>

    <h1 class="entry-title">
    <?php if (!is_singular()) : ?>
      <a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permanent link to “%s”', 'frontierline'), the_title_attribute('echo=0')); ?>" rel="bookmark">
        <?php the_title(); ?>
      </a>
    <?php else : ?>
      <?php the_title(); ?>
    <?php endif; ?>
    </h1>

    <div class="entry-info">
    <?php if ($post->post_type === 'post') : ?>
      <time class="date published" datetime="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php the_date(); ?></time>
    <?php endif; ?>
    <?php if (comments_open() || get_comments_number()) : ?>
      <p class="entry-comments">
        <?php comments_popup_link(__('No responses yet', 'frontierline'), __('1 response', 'frontierline'), __('% responses', 'frontierline')); ?>
      </p>
    <?php endif; ?>
    <?php edit_post_link(__('Edit', 'frontierline' ), '<p class="edit">', '</p>'); ?>
    </div>
  </header>

  <div class="entry-content">
    <?php the_content(__('Continue reading…', 'frontierline')); ?>
    <?php wp_link_pages(array('before' => '<p class="pages" role="navigation"><span>' . __('Pages:', 'frontierline') . '</span>', 'after' => '</p>')); ?>
  </div>

  <?php if (has_tag()) : ?>
    <footer class="entry-tags">
      <p><b><?php _e('Tags:', 'frontierline'); ?></b> <?php $tags_list = the_tags('',', ',''); ?></p>
    </footer>
  <?php endif; ?>

  <footer class="fx-footer">
    <h4><?php _e('Browse fast. Browse free.', 'frontierline'); ?></h4>
    <p><a href="https://www.mozilla.org/firefox/new/?scene=2" rel="external" class="button button-green"><?php _e('Download Firefox', 'frontierline'); ?></a></p>
  </div>

</article><!-- #post -->
