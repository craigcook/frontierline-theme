<?php
/**
 * Explore posts in top categories.
 *
 * Lists the top 8 categories (by number of posts), and lists the five most recent posts in each category.
 */

  $categories = get_categories('number=8&orderby=count&order=desc&hierarchical=0&depth=1');
?>

<aside id="categories" class="can-stick">
  <div class="content">
    <h3 class="module-title"><?php _e('More articles', 'frontierline'); ?></h3>

    <ul class="cat-list" role="navigation">
    <?php foreach($categories as $category) : ?>
      <li><a href="#cat-<?php echo esc_html($category->slug); ?>"><?php echo esc_html($category->name) ?></a></li>
    <?php endforeach; ?>
    </ul>

    <div class="categories">
    <?php foreach($categories as $category) : ?>
      <div class="category" id="cat-<?php echo esc_html($category->slug); ?>">
        <h4 class="category-title"><?php echo esc_html($category->name); ?></h4>
        <?php
          $category_posts = new WP_Query('cat='.$category->term_id.'&showposts=5');
          if ($category_posts->have_posts()) : ?>
          <ul class="category-posts">
          <?php while ($category_posts->have_posts()) : $category_posts->the_post(); ?>
            <li class="category-post">
              <?php get_template_part('content-views/content', 'mini'); ?>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_query(); ?>
          </ul>
          <?php endif; ?>
        </div>
    <?php endforeach; ?>
    </div>

  </div>
</aside>
