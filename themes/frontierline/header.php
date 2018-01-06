<!DOCTYPE html>
<html <?php language_attributes('html'); ?> dir="<?php if (is_rtl()) : echo 'rtl'; else : echo 'ltr'; endif; ?>" class="no-js">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="copyright" href="#license">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="shortcut icon" type="image/png" href="<?php site_icon_url(128, get_template_directory_uri().'/img/favicon.png'); ?>">

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

  <?php get_template_part('includes/metadata'); ?>

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
