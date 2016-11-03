<?php
/**
 * Display a full post with full size image.
 */
?>

<?php if ( has_post_thumbnail() ) : ?>
  <div class="post-image post-image-full">
    <?php the_post_thumbnail('post-full-size'); ?>
  </div>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
  <header class="entry-header">
    <div class="entry-tools">
      <div class="categories">
        <b><?php _e('Categories:', 'frontierline'); ?></b>
        <?php the_category(' ') ?>
      </div>

    <?php if ( get_option('frontierline_share_posts') == 1 ) : ?>
      <div class="share">
        <b><?php _e('Share:', 'frontierline'); ?></b>
        <ul>
          <li><a rel="external nofollow noopener" target="_blank" class="twitter" href="https://twitter.com/intent/tweet/?text=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>&amp;url=<?php echo urlencode(wp_get_shortlink()); ?><?php if (get_option('frontierline_twitter_username')) : ?>&amp;via=<?php echo sanitize_text_field(get_option('frontierline_twitter_username')); endif ?>">Twitter</a></li>
          <li><a rel="external nofollow noopener" target="_blank" class="facebook" href="https://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=<?php echo urlencode(wp_get_shortlink()); ?>&amp;p[title]=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>">Facebook</a></li>
        </ul>
      </div>
    <?php endif; ?>
    </div>

    <h2 class="entry-title">
    <?php if (!is_singular()) : ?>
      <a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permanent link to “%s”', 'frontierline'), the_title_attribute('echo=0')); ?>" rel="bookmark">
        <?php the_title(); ?>
      </a>
    <?php else : ?>
      <?php the_title(); ?>
    <?php endif; ?>
    </h2>

    <div class="entry-info">
      <address class="vcard">
      <?php if (function_exists(coauthors_posts_links)) : coauthors_posts_links(); else : the_author_posts_link(); endif; ?>
      </address>
      <time class="date" title="<?php the_time('Y-m-d\TH:i:sP'); ?>" datetime="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php echo get_the_date(); ?></time>
    <?php if ( comments_open() || get_comments_number() ) : ?>
      <p class="entry-comments">
        <?php comments_popup_link(__('No responses yet', 'frontierline'), __('1 response', 'frontierline'), __('% responses', 'frontierline')); ?>
      </p>
    <?php endif; ?>
    <?php edit_post_link(__('Edit post', 'frontierline' ), '<p class="edit">', '</p>'); ?>
    </div>
  </header>

  <div class="entry-content">
    <?php the_content(__('Continue reading &hellip;', 'frontierline')); ?>
    <?php wp_link_pages(array('before' => '<p class="pages" role="navigation"><span>' . __('Pages:', 'frontierline') . '</span>', 'after' => '</p>')); ?>
  </div><!-- .entry-content -->

  <?php if (has_tag()) : ?>
    <footer class="entry-tags">
      <p><b><?php _e('Tags:', 'frontierline'); ?></b> <?php $tags_list = the_tags('',', ',''); ?></p>
    </footer>
  <?php endif; ?>

</article><!-- #post -->
