<?php
  $yoast_title_options = null;
  $yoast_home_metadesc = null;
  $yoast_title = null;
  $yoast_metadesc = null;

  // If Yoast SEO is active, fetch its metadata
  if (class_exists('WPSEO_Frontend') && class_exists('WPSEO_Replace_Vars')) {
    $yoast_title_options = get_option('wpseo_titles');
    $yoast_home_metadesc = sanitize_text_field(wpseo_replace_vars($yoast_title_options['metadesc-home-wpseo'], ''));

    if (is_singular()) {
      $yoast_title = sanitize_text_field(wpseo_replace_vars(get_post_meta($post->ID, '_yoast_wpseo_title', true), ''));
      $yoast_metadesc = sanitize_text_field(wpseo_replace_vars(get_post_meta($post->ID, '_yoast_wpseo_metadesc', true), ''));
    }
  }
?>

<?php // If Yoast is disabled or enabled but there is no title, show the standard title.
  if (is_singular() && !$yoast_title) : ?>
  <meta name="title" content="<?php frontierline_meta_page_title(); ?>">
<?php elseif (is_home()) : ?>
  <meta name="title" content="<?php bloginfo('name'); ?>">
<?php endif; ?>
<?php // If Yoast is disabled or enabled but there is no metadesc, show the standard metadesc.
  if ((is_singular() && !$yoast_metadesc) || (is_home() && !method_exists('WPSEO_Frontend', 'metadesc'))) : ?>
  <meta name="description" content="<?php frontierline_meta_desc(); ?>">
<?php endif; ?>

<?php
  $post_image_urls = new ArrayObject();
  if (is_singular() && has_post_thumbnail()) {
      $post_image_urls->append(wp_get_attachment_image_src(get_post_thumbnail_id(), 'post-full-size', true)['0']);
  } elseif (is_singular()) {
    if ($post_images = get_attached_media('image')) {
      foreach ($post_images as $post_image) {
        $post_image_urls->append(wp_get_attachment_image_src($post_image->ID, 'post-full-size', true)['0']);
      }
    }
  }
  $post_image_urls = $post_image_urls->getArrayCopy();
?>

  <?php /* Metadata for Facebook */ ?>
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  <meta property="og:url" content="<?php frontierline_current_url(); ?>">
  <meta property="og:title" content="<?php if (is_home()) : bloginfo('name'); elseif (is_singular() && $yoast_title) : echo $yoast_title; else : frontierline_meta_page_title(); endif; ?>">
  <meta property="og:description" content="<?php if (is_singular() && $yoast_metadesc) : echo $yoast_metadesc; elseif (is_home() && $yoast_home_metadesc) : echo $yoast_home_metadesc; else : frontierline_meta_desc(); endif; ?>">
  <?php foreach ($post_image_urls as $post_image_url) : ?>
  <meta property="og:image" content="<?php echo $post_image_url; ?>">
  <?php endforeach; ?>

  <?php /* Metadata for Twitter */ ?>
  <meta property="twitter:title" content="<?php if (is_home()) : bloginfo('name'); elseif (is_singular() && $yoast_title) : echo $yoast_title; else : frontierline_meta_page_title(); endif; ?>">
  <meta property="twitter:description" content="<?php if (is_singular() && $yoast_metadesc) : echo $yoast_metadesc; elseif (is_home() && $yoast_home_metadesc) : echo $yoast_home_metadesc; else : frontierline_meta_desc(); endif; ?>">
<?php if (!empty($post_image_urls)) : ?>
  <meta name="twitter:card" content="summary_large_image">
  <?php foreach ($post_image_urls as $post_image_url) : ?>
  <meta property="twitter:image" content="<?php echo $post_image_url; ?>">
  <?php endforeach; ?>
<?php else : ?>
  <meta name="twitter:card" content="summary">
  <?php if (get_header_image()) : ?>
  <meta property="twitter:image" content="<?php header_image(); ?>">
  <?php endif; ?>
<?php endif; ?>
<?php if (get_option('frontierline_twitter_username')) : ?>
  <meta name="twitter:site" content="@<?php echo sanitize_text_field(get_option('frontierline_twitter_username')); ?>">
<?php endif; ?>
