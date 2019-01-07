<?php
/**
 * Display a full post with optional full sized image.
 */

$yoast_title_options = null;
$yoast_disable_author = null;

// If Yoast SEO is active, get the status of author archives
if (class_exists('WPSEO_Frontend') && class_exists('WPSEO_Replace_Vars')) {
  $yoast_title_options = get_option('wpseo_titles');
  $yoast_disable_author = $yoast_title_options['disable-author'];
}
?>

<?php if (get_theme_mod('frontierline_no_post_image') !== '1') : ?>
  <?php if (has_post_thumbnail()) : ?>
    <?php if (get_post_meta(get_the_ID(), '_frontierline_hide_hero', true) !== '1') : ?>
      <div class="post-image post-image-featured">
        <?php the_post_thumbnail('post-full-size'); ?>
      </div>
    <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
  <header class="entry-header">
    <div class="entry-tools">
    <?php if (has_category()) : ?>
      <div class="categories">
        <b><?php _e('Categories:', 'frontierline'); ?></b>
        <?php the_category(' ') ?>
      </div>
    <?php endif; ?>

    <?php if ((is_single() && get_option('frontierline_share_posts') == 1) || (is_page() && get_option('frontierline_share_pages') == 1)) :
        get_template_part('includes/social-share');
       endif; ?>
    </div>

    <h1 class="entry-title">
    <?php if (!is_singular()) : ?>
      <a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permanent link to “%s”', 'frontierline'), the_title_attribute('echo=0')); ?>" rel="bookmark">
        <?php the_title(); ?>
      </a>
    <?php else : ?>
      <?php the_title(); ?>
    <?php endif; ?>
    </h1>

    <div class="entry-info">
    <?php if ($post->post_type === 'post') : ?>
      <?php if (get_theme_mod('frontierline_no_byline') !== '1') : ?>
      <address class="vcard">
        <?php if ($yoast_disable_author === true) :
          if (function_exists('coauthors_posts_links')) :
            coauthors();
          else :
            the_author();
          endif;
        else :
          if (function_exists('coauthors_posts_links')) :
            coauthors_posts_links();
          else :
            the_author_posts_link();
          endif;
        endif; ?>
      </address>
      <?php endif; ?>
      <time class="date published" datetime="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php the_date(); ?></time>
    <?php endif; ?>
    <?php if (comments_open() || get_comments_number()) : ?>
      <p class="entry-comments">
        <?php comments_popup_link(__('No responses yet', 'frontierline'), __('1 response', 'frontierline'), __('% responses', 'frontierline')); ?>
      </p>
    <?php endif; ?>
    <?php edit_post_link(__('Edit', 'frontierline' ), '<p class="edit">', '</p>'); ?>
    </div>
  </header>

  <div class="entry-content">
    <?php the_content(__('Continue reading…', 'frontierline')); ?>
    <?php wp_link_pages(array('before' => '<p class="pages" role="navigation"><span>' . __('Pages:', 'frontierline') . '</span>', 'after' => '</p>')); ?>
  </div>

  <?php if (has_tag()) : ?>
    <footer class="entry-tags">
      <p><b><?php _e('Tags:', 'frontierline'); ?></b> <?php $tags_list = the_tags('',', ',''); ?></p>
    </footer>
  <?php endif; ?>

  <footer class="fx-footer">
    <h4><?php _e('Browse fast. Browse free.', 'frontierline'); ?></h4>
    <p><a href="https://www.mozilla.org/firefox/new/?utm_source=<?php echo frontierline_blog_domain(); ?>&utm_campaign=firefox_frontier&utm_medium=referral" rel="external" class="button button-product"><?php _e('Download Firefox', 'frontierline'); ?></a></p>
  </footer>

</article><!-- #post -->
