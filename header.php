<!DOCTYPE html>
<html <?php language_attributes('html'); ?> dir="<?php bloginfo('text_direction'); ?>" class="no-js">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  <meta property="og:title" content="<?php if (is_singular()) : single_post_title(); else : bloginfo('name'); endif; ?>">
  <meta property="og:url" content="<?php if (is_singular()) : the_permalink(); else : bloginfo('url'); endif; ?>">
  <meta property="og:description" content="<?php fc_meta_desc(); ?>">
<?php if (is_singular()) : ?>
  <?php if ($thumbs = get_attached_media('image')) : ?>
    <?php foreach ($thumbs as $thumb) : ?>
      <?php $thumb = wp_get_attachment_image_src( $thumb->ID, 'medium' ); ?>
      <meta property="og:image" content="<?php echo $thumb['0']; ?>">
    <?php endforeach; ?>
  <?php endif; ?>
  <?php if (has_post_thumbnail()) : ?>
  <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); ?>
    <meta property="og:image" content="<?php echo $thumb['0']; ?>">
  <?php else : ?>
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/mozilla-wordmark.png">
  <?php endif; ?>
<?php elseif (get_header_image()) : ?>
  <meta property="og:image" content="<?php echo get_header_image(); ?>">
<?php endif; ?>
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/mozilla-wordmark.png">

  <meta name="title" content="<?php if (is_singular()) : single_post_title(); echo ' | '; endif; bloginfo('name'); ?>">
  <meta name="description" content="<?php fc_meta_desc(); ?>">

  <meta name="Rating" content="General">
  <!--[if IE]>
  <meta name="MSSmartTagsPreventParsing" content="true">
  <meta http-equiv="imagetoolbar" content="no">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <![endif]-->
  <!--[if lte IE 8]>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
  <![endif]-->

  <link rel="copyright" href="#license">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="shortcut icon" type="image/ico" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">

  <link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>">

  <!--[if lte IE 8]><link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/sass/base/oldIE.css"><![endif]-->

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <title><?php
    if ( is_single() ) { single_post_title(); echo ' | '; bloginfo('name'); }
    elseif ( is_home() || is_front_page() ) { bloginfo('name'); if (get_bloginfo('description','display')) { echo ' | '. get_bloginfo('description','display'); } moz_page_number(); }
    elseif ( is_page() ) { single_post_title(''); echo ' | '; bloginfo('name'); }
    elseif ( is_search() ) { printf( __('Search results for “%s”', 'onemozilla'), esc_html( $s ) ); moz_page_number(); echo ' | '; bloginfo('name'); }
    elseif ( is_day() ) { $post = $posts[0]; printf(__('Posts from %s', 'onemozilla'), get_the_date()); echo ' | '; bloginfo('name'); moz_page_number(); }
    elseif ( is_month() ) { $post = $posts[0]; printf(__('Posts from %s', 'onemozilla'), get_the_date('F, Y')); echo ' | '; bloginfo('name'); moz_page_number(); }
    elseif ( is_year() ) { $post = $posts[0]; printf(__('Posts from %s', 'onemozilla'), get_the_date('Y')); echo ' | '; bloginfo('name'); moz_page_number(); }
    elseif ( is_404() ) { _e('Not Found', 'onemozilla'); echo ' | '; bloginfo('name'); }
    else { wp_title(''); echo ' | '; bloginfo('name'); moz_page_number(); }
  ?></title>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php
    get_template_part('parts/nav-global');
    get_template_part('parts/masthead');
  ?>

  <div class="site-wrap">

    <?php get_template_part('parts/nav-util'); ?>

    <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => 'nav', 'container_id' => 'nav-primary', 'fallback_cb' => 'false',)); ?>

  <main id="content" role="main">
