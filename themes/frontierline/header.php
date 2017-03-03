<!DOCTYPE html>
<html <?php language_attributes('html'); ?> dir="<?php if (is_rtl()) : echo 'rtl'; else : echo 'ltr'; endif; ?>" class="no-js">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="title" content="<?php frontierline_meta_page_title(); ?>">
  <meta name="description" content="<?php frontierline_meta_desc(); ?>">

  <?php /* Metadata for Facebook */ ?>
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  <meta property="og:url" content="<?php frontierline_current_url(); ?>">
  <meta property="og:title" content="<?php if (is_singular()) : single_post_title(); else : frontierline_meta_page_title(); endif; ?>">
  <meta property="og:description" content="<?php frontierline_meta_desc(); ?>">
<?php if (is_singular() && has_post_thumbnail()) : ?>
  <?php $post_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'post-full-size', true); ?>
  <meta property="og:image" content="<?php echo $post_image_url['0']; ?>">
<?php endif; ?>

  <?php /* Metadata for Twitter */ ?>
  <meta property="twitter:title" content="<?php if (is_singular()) : single_post_title(); else : frontierline_meta_page_title(); endif; ?>">
  <meta property="twitter:description" content="<?php frontierline_meta_desc(); ?>">
<?php if (is_singular() && has_post_thumbnail()) : ?>
  <meta name="twitter:card" content="summary_large_image">
  <?php $post_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'post-full-size', true); ?>
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

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-blogname="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
  <?php
    get_template_part('includes/nav-global');
    get_template_part('includes/masthead');
  ?>

  <div class="site-wrap">

    <?php get_template_part('includes/nav-util'); ?>

    <?php wp_nav_menu(array('theme_location' => 'site_menu', 'container' => 'nav', 'container_id' => 'nav-local', 'container_class' => 'nav-local section', 'menu_class' => 'content', 'fallback_cb' => 'false',)); ?>

    <?php get_template_part('includes/site-intro'); ?>

    <main id="content" role="main">
