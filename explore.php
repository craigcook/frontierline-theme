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
            <li class="post-mini">
              <a href="<?php the_permalink(); ?>">
              <?php if ( has_post_thumbnail() ) :
                the_post_thumbnail( 'thumbnail' );
              else : ?>
                <img class="wp-post-image" width="150" height="150" src="<?php echo get_template_directory_uri(); ?>/img/fallback-thumb.png">
              <?php endif; ?>
                <h5 class="entry-title"><?php the_title(); ?></h5>
              </a>
              <time class="date" datetime="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php echo get_the_date(); ?></time>
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
