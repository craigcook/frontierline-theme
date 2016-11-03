<?php
/**
 * The brand masthead, with a custom header image.
 */
?>
<header id="masthead" class="section" style="background-image: url('<?php header_image(); ?>');">
  <div class="site-id">
    <div class="site-title-wrap">
    <?php if (is_front_page() && (! is_paged())) : ?>
      <h1 id="site-title"><?php echo esc_attr( get_bloginfo('name', 'display' )); ?></h1>
      <?php if (get_bloginfo('description','display')) : ?>
      <p id="site-description"><?php echo esc_attr( get_bloginfo('description', 'display') ); ?></p>
      <?php endif; ?>
    <?php else : ?>
      <a href="<?php echo esc_url( home_url('/') ); ?>" rel="home" title="<?php _e('Go to the front page', 'onemozilla'); ?>">
        <h1 id="site-title"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></h1>
        <?php if (get_bloginfo('description','display')) : ?>
        <p id="site-description"><?php echo esc_attr( get_bloginfo('description', 'display') ); ?></p>
        <?php endif; ?>
      </a>
    <?php endif; ?>
    </div>
  </div>
</header>
