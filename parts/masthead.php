<?php
/**
 * The brand masthead, with a custom header image.
 */
?>
<header id="masthead" class="section">
  <div class="site-id" style="background-image: url(<?php header_image(); ?>);">

    <div class="site-title-wrap">
    <?php if ( (is_front_page()) && ($paged < 1) ) : ?>
      <h1 id="site-title"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></h1>
    <?php else : ?>
      <h1 id="site-title"><a href="<?php echo esc_url( home_url('/') ); ?>" rel="home" title="<?php _e('Go to the front page', 'onemozilla'); ?>"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></h1>
    <?php endif; ?>
    <?php if (get_bloginfo('description','display')) : ?>
      <p id="site-description"><?php echo esc_attr( get_bloginfo('description', 'display') ); ?></p>
    <?php endif; ?>
    </div>

  </div>
</header>
