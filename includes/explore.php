<?php
/**
 * Explore posts in top categories.
 *
 * Lists the top 8 categories (by number of posts), and lists the five most recent posts in each category.
 */

  $categories = get_categories('number=8&orderby=count&order=desc&hierarchical=0&depth=1');
?>

<aside id="explore" role="complementary">
  <div class="content">

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
          $posts = new WP_Query('cat='.$category->term_id.'&showposts=5');
          if ($posts->have_posts()) : ?>
          <ul class="category-posts">
          <?php while ($posts->have_posts()) : $posts->the_post(); ?>
            <li class="category-post">
              <?php get_template_part('views/content', 'mini'); ?>
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
