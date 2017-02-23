<?php
/**
 * The brand masthead, usually with a custom header image.
 */
?>

<header id="masthead" class="section">
  <div class="site-id">
    <div class="site-title-wrap content">
    <?php if (is_front_page() && (! is_paged())) : ?>
      <h1 id="site-title"><span><?php echo esc_attr(get_bloginfo('name', 'display')); ?></span></h1>
      <?php if (get_bloginfo('description','display')) : ?>
      <p id="site-description"><span><?php echo esc_attr(get_bloginfo('description', 'display')); ?></span></p>
      <?php endif; ?>
    <?php else : ?>
      <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" title="<?php _e('Go to the front page', 'frontierline'); ?>">
        <h1 id="site-title"><span><?php echo esc_attr(get_bloginfo('name', 'display')); ?></span></h1>
        <?php if (get_bloginfo('description', 'display')) : ?>
        <p id="site-description"><span><?php echo esc_attr(get_bloginfo('description', 'display')); ?></span></p>
        <?php endif; ?>
      </a>
    <?php endif; ?>
    </div>
  </div>
</header>
