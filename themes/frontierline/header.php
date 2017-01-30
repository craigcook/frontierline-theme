<!DOCTYPE html>
<html <?php language_attributes('html'); ?> dir="<?php bloginfo('text_direction'); ?>" class="no-js">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="title" content="<?php if (is_singular()) : single_post_title(); else : bloginfo('name'); endif; ?>">
  <meta name="description" content="<?php frontierline_meta_desc(); ?>">

  <!-- Metadata for Facebook -->
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  <meta property="og:url" content="<?php if (is_singular()) : the_permalink(); else : bloginfo('url'); endif; ?>">
  <meta property="og:title" content="<?php if (is_singular()) : single_post_title(); else : bloginfo('name'); endif; ?>">
  <meta property="og:description" content="<?php frontierline_meta_desc(); ?>">
<?php if (is_singular() && has_post_thumbnail()) : ?>
  <?php $post_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'post-large', true); ?>
  <meta property="og:image" content="<?php echo $post_image_url['0']; ?>">
<?php endif; ?>

  <!-- Metadata for Twitter -->
  <meta property="twitter:title" content="<?php if (is_singular()) : single_post_title(); else : bloginfo('name'); endif; ?>">
  <meta property="twitter:description" content="<?php frontierline_meta_desc(); ?>">
<?php if (is_singular() && has_post_thumbnail()) : ?>
  <meta name="twitter:card" content="summary_large_image">
  <?php $post_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'post-large', true); ?>
  <meta property="twitter:image" content="<?php echo $post_image_url['0']; ?>">
<?php else : ?>
  <meta name="twitter:card" content="summary">
  <?php if (get_header_image()) : ?>
  <meta property="twitter:image" content="<?php header_image(); ?>">
  <?php endif; ?>
<?php endif; ?>
<?php if (get_option('frontierline_twitter_username')) : ?>
  <meta name="twitter:site" content="@<?php echo sanitize_text_field(get_option('frontierline_twitter_username')); ?>">
<?php endif; ?>

  <link rel="copyright" href="#license">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png">
  <link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); echo '?v=' . filemtime(get_stylesheet_directory() . '/style.css'); ?>">

  <!--[if IE]>
  <meta name="MSSmartTagsPreventParsing" content="true">
  <meta http-equiv="imagetoolbar" content="no">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <![endif]-->

  <!--[if lte IE 8]>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/oldIE.css">
  <![endif]-->

  <?php if (get_header_image()) : ?>
  <style type="text/css">
  @media screen and (min-width: 480px) {
    #masthead {
      background-image: url('<?php header_image(); ?>');
    }
  }
  </style>
  <?php endif; ?>

  <link rel="alternate" type="application/rss+xml" title="<?php printf(__('%s – RSS Feed', 'frontierline'), bloginfo('name')) ; ?>" href="<?php bloginfo('rss2_url'); ?>">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <title><?php
    if ( is_single() ) { single_post_title(); echo ' | '; bloginfo('name'); }
    elseif ( is_home() || is_front_page() ) { bloginfo('name'); if (get_bloginfo('description', 'display')) { echo ' | '. get_bloginfo('description', 'display'); } frontierline_page_number(); }
    elseif ( is_page() ) { single_post_title(''); echo ' | '; bloginfo('name'); }
    elseif ( is_search() ) { printf(__('Search results for “%s”', 'frontierline'), esc_html($s)); frontierline_page_number(); echo ' | '; bloginfo('name'); }
    elseif ( is_day() ) { $post = $posts[0]; printf(__('Posts from %s', 'frontierline'), get_the_date()); echo ' | '; bloginfo('name'); frontierline_page_number(); }
    elseif ( is_month() ) { $post = $posts[0]; printf(__('Posts from %s', 'frontierline'), get_the_date('F, Y')); echo ' | '; bloginfo('name'); frontierline_page_number(); }
    elseif ( is_year() ) { $post = $posts[0]; printf(__('Posts from %s', 'frontierline'), get_the_date('Y')); echo ' | '; bloginfo('name'); frontierline_page_number(); }
    elseif ( is_404() ) { _e('Not Found', 'frontierline'); echo ' | '; bloginfo('name'); }
    else { wp_title(''); echo ' | '; bloginfo('name'); frontierline_page_number(); }
  ?></title>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-blogname="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
  <?php
    get_template_part('includes/nav-global');
    get_template_part('includes/masthead');
  ?>

  <div class="site-wrap">

    <?php get_template_part('includes/nav-util'); ?>

    <main id="content" role="main">
