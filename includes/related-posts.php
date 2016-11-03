<?php
/**
 * Related and popular posts.
 *
 * Shows 5 most recent posts in the same category as the current post (first category, in cases of multiples).
 * Shows 5 most popular posts in the last 30 days.
 * Uses WordPress Popular Posts plugin. If the plugin is absent, falls back to 5 most recent posts across all categories.
 */
?>
<aside id="related-posts" class="section">
  <div class="content">
    <div class="in-category">
    <?php
      global $post;
      $categories = get_the_category();
      $category = $categories[0];
      $cat_ID = $category->cat_ID;

      $catposts = get_posts('showposts=5&cat='.$cat_ID.'&exclude='.$post->ID);
    ?>
      <h4 class="module-title"><?php printf( __('More articles in “%s”', 'frontierline'), esc_html($category->name)); ?></h4>
    <?php if ($catposts) : ?>
      <ul class="cat-posts">
      <?php foreach($catposts as $post) : ?>
        <li>
          <h5 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
          <time class="date" datetime="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php echo get_the_date(); ?></time>
        </li>
      <?php endforeach; ?>
      </ul>
    <?php else : ?>
      <p><?php _e('There are no other articles in this category.', 'frontierline'); ?></p>
    <?php endif; ?>
      <?php wp_reset_query(); ?>
    </div>

    <div class="popular">
      <?php if (function_exists('wpp_get_mostpopular')) : ?>
      <h4 class="module-title"><?php _e('Popular articles', 'frontierline'); ?></h4>
      <?php
        $args = array(
          'limit' => '5',
          'range' => 'monthly',
          'post_type' => 'post',
          'stats_views' => 0,
          'stats_date' => 1,
          'post_html' => '<li><h5 class="entry-title"><a href="{url}">{text_title}</a></h5><span class="date">{date}</span></li>'
        );
        wpp_get_mostpopular($args); ?>

      <?php else : ?>
      <h4 class="module-title"><?php _e('Recent articles', 'frontierline'); ?></h4>
      <ul class="recent-posts">
        <li>recent posts</li>
      </ul>
      <?php endif; ?>
    </div>
  </div>
</aside>
