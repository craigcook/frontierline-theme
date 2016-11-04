<?php
// Don't allow direct access to the theme
if(!defined('DB_NAME')) {
  exit('Direct template access is not allowed');
}

// Count search results
global $wp_query;
$total_results = $wp_query->found_posts;

get_header();
?>

  <?php if (have_posts()) : ?>

    <h2 class="page-title content">
    <?php if (is_category()) : ?><?php printf( __('Articles in “%s”', 'frontierline'), single_cat_title('',false) ); ?>
    <?php elseif (is_tag()) : ?><?php printf( __('Articles tagged with “%s”','frontierline'), single_tag_title('',false) ); ?>
    <?php elseif (is_day()) : ?><?php printf( __('Articles from %s', 'frontierline'), get_the_date() ); ?>
    <?php elseif (is_month()) : ?><?php printf( __('Articles from %s', 'frontierline'), get_the_date('F, Y') ); ?>
    <?php elseif (is_year()) : ?><?php printf( __('Articles from %s', 'frontierline'), get_the_date('Y') ); ?>
    <?php elseif (is_author()) : ?><?php printf( __('Articles by %s','frontierline'), esc_html(get_userdata(intval($author))->display_name) ); ?>
    <?php else : ?><?php _e('Archives', 'frontierline'); ?>
    <?php endif; ?>
    </h1>

    <?php /* Start the Loop */ ?>
    <div class="content posts-wrap hfeed">
    <?php while (have_posts()) : the_post(); ?>

      <?php get_template_part('views/content', 'summary'); ?>

    <?php endwhile; ?>
    </div>

    <?php if (paginate_links()) : get_template_part('includes/nav-pagination'); endif; ?>

  <?php else : ?>

    <article id="post-0" class="post no-results not-found">
      <header class="entry-header">
        <h1 class="entry-title"><?php _e('Nothing Found', 'frontierline'); ?></h1>
      </header><!-- .entry-header -->

      <div class="entry-content">
        <p><?php _e('Sorry, we couldn&#8217;t find any results for the requested archive. Perhaps try searching?', 'frontierline'); ?></p>
        <?php get_search_form(); ?>
      </div><!-- .entry-content -->
    </article><!-- #post-0 -->

  <?php endif; ?>

<?php get_footer(); ?>
