<aside id="explore" role="complementary">
  <div class="content">
    <ul class="cat-list" role="navigation">
      <?php wp_list_categories('number=8&orderby=count&order=desc&hierarchical=0&depth=1&title_li='); ?>
    </ul>

    <?php $categories = get_categories('number=8&orderby=count&order=desc&hierarchical=0'); ?>

    <div class="categories">
    <?php foreach( $categories as $category ) : ?>
      <div class="category">
        <h4 class="category-title"><a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name) ?></a></h4>
        <?php
          $posts = new WP_Query('cat='.$category->term_id.'&showposts=5');
          if( $posts->have_posts() ): ?>
          <ul class="category-posts">
          <?php while( $posts->have_posts() ) : $posts->the_post(); ?>
            <li class="category-post">
              <?php get_template_part( 'views/post-mini' ); ?>
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
