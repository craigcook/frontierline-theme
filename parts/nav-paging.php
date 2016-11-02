<?php
/**
 * Links to next and previous posts.
 */
  $date_format = get_option('date_format');
?>

<nav class="section nav-paging">
  <div class="content">
    <?php $previous_post = get_previous_post();
      if (! empty($previous_post)) : ?>
      <p class="nav-paging-prev" role="navigation">
        <a href="<?php echo get_permalink( $previous_post->ID ); ?>">
          <span class="label"><?php _e('Previous article', 'rebrand'); ?></span>
          <strong class="entry-title"><?php echo $previous_post->post_title; ?></strong>
          <time class="date" datetime="<?php echo get_the_date('Y-m-d\TH:i:sP', $previous_post->ID); ?>"><?php echo get_the_date($date_format, $previous_post->ID); ?></time>
          <?php get_template_part('img/inline', 'arrow-left.svg'); ?>
        </a>
      </p>
    <?php endif; ?>

    <?php $next_post = get_next_post();
      if (! empty($next_post)) : ?>
      <p class="nav-paging-next" role="navigation">
        <a href="<?php echo get_permalink( $next_post->ID ); ?>">
          <span class="label"><?php _e('Next article', 'rebrand'); ?></span>
          <strong class="entry-title"><?php echo $next_post->post_title; ?></strong>
          <time class="date" datetime="<?php echo get_the_date('Y-m-d\TH:i:sP', $next_post->ID); ?>"><?php echo get_the_date($date_format, $next_post->ID); ?></time>
          <?php get_template_part('img/inline', 'arrow-right.svg'); ?>
        </a>
      </p>
    <?php endif; ?>
  </div>
</nav>
