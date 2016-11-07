<?php
/**
 * A template for when there is no content to display.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content no-results not-found'); ?>>
  <header class="entry-header">
    <h2 class="entry-title"><?php _e('Nothing Found', 'frontierline'); ?></h2>
  </header>

  <div class="entry-content">
    <?php if (is_search()) : ?>

      <p><?php printf(__('Sorry, we didn’t find anything for “%s”. Try another search?', 'frontierline'), esc_html(get_search_query())); ?></p>

      <?php get_search_form(); ?>

    <?php else : ?>

      <p><?php _e('Sorry, we looked everywhere, but we couldn’t find the page or file you were looking for. A few possible explanations:', 'frontierline'); ?></p>
      <ul>
        <li><?php _e('You may have followed an out-dated link or bookmark.', 'frontierline'); ?></li>
        <li><?php _e('If you entered the address by hand, you may have mistyped it.', 'frontierline'); ?></li>
        <li><?php _e('You might have just discovered an error. Congratulations!', 'frontierline'); ?></li>
      </ul>

      <h3><?php _e('So what do we do now?', 'frontierline'); ?></h3>
      <ul>
        <li><?php printf(__('Go to the <a href="%s">front page</a>.', 'frontierline'), esc_url(home_url('/'))); ?></li>
        <li><?php printf(__('Visit <a href="%s">mozilla.org</a>.', 'frontierline'), 'https://www.mozilla.org'); ?></li>
        <li><?php _e('Try searching this blog.', 'frontierline'); ?></li>
      </ul>

      <?php get_search_form(); ?>

    <?php endif; ?>
  </div>
</article>

