<?php get_header(); ?>

  <?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'content', 'single' ); ?>

    <aside class="section">
      <div class="content">
        <?php $previous_post = get_previous_post();
          if (!empty( $previous_post )): ?>
          <p class="paging-prev">
            <b>Previous article</b>
            <a href="<?php echo get_permalink( $previous_post->ID ); ?>"><?php echo $previous_post->post_title; ?></a>
          </p>
        <?php endif; ?>

        <?php $next_post = get_next_post();
          if (!empty( $next_post )): ?>
          <p class="paging-next" role="navigation">
            <b>Next article</b>
            <a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo $next_post->post_title; ?></a>
          </p>
        <?php endif; ?>
      </div>
    </aside>

    <aside id="relpop" class="section">
      <div class="content">
        <div class="related">
        <?php
          global $post;
          $categories = get_the_category();
          $category = $categories[0];
          $cat_ID = $category->cat_ID;

          $catposts = get_posts('showposts=5&cat='.$cat_ID);
        ?>

          <h4>More posts in <?php echo $category->name; ?></h4>
          <ul class="cat-posts">
          <?php foreach($catposts as $post) : ?>
            <li class="post-mini">
              <h5 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
              <time class="date" datetime="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php echo get_the_date(); ?></time>
            </li>
          <?php endforeach; ?>
          <?php wp_reset_query(); ?>
          </ul>
        </div>

        <div class="popular">
          <h4>Popular posts</h4>
          <?php if ( function_exists('wpp_get_mostpopular') ) : ?>

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

          <?php endif; ?>
        </div>
      </div>
    </aside>

  <?php if (is_singular()) : ?>
    <aside id="newsletter-subscribe" class="section">

      <form class="content newsletter-form footer-newsletter-form" id="newsletter-form" action="#" method="post" data-spinner-color="#fff">
        <input id="id_newsletters" maxlength="100" name="newsletters" type="hidden" value="mozilla-foundation" />
        <input type="hidden" name="source_url" value="<?php the_permalink(); ?>">

        <div class="form-title">
          <h3>Love the Web?</h3>
          <h4>Get the Mozilla newsletter and help us keep it open and free.</h4>
        </div>

        <div class="form-contents">
          <div class="field field-email">
            <label fpr="id_email">Your e-mail address</label>
            <input id="id_email" name="email" placeholder="yourname@example.com" required="required" type="email">
          </div>
          <div class="form-submit">
            <button type="submit" id="email-submit" class="form-button hollow light">Sign Up Now</button>
            <p class="form-details">
              <small>We will only send you Mozilla-related information.</small>
            </p>
          </div>
        </div>
      </form>

    </aside>
  <?php endif; ?>

  <?php comments_template( '', true ); ?>

  <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
