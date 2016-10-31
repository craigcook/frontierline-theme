<?php
/**
 * Display a full post with full size image.
 */
?>

<?php if ( has_post_thumbnail() ) : ?>
  <div class="post-image content">
    <?php the_post_thumbnail( 'post-full-size' ); ?>
  </div>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <div class="entry-tools">
      <div class="categories">
        <b><?php _e('Categories:','onemozilla'); ?></b>
        <?php the_category(' ') ?>
      </div>

      <div class="share">
        <b>Share:</b>
        <ul>
          <li><a href="#" class="twitter">Twitter</a></li>
          <li><a href="#" class="facebook">Facebook</a></li>
        </ul>
      </div>
    </div>

    <h2 class="entry-title">
    <?php if (!is_singular()) : ?>
      <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permanent link to “%s”', 'onemozilla' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
        <?php the_title(); ?>
      </a>
    <?php else : ?>
      <?php the_title(); ?>
    <?php endif; ?>
    </h2>

  <?php if ( (get_option('onemozilla_hide_authors') != 1) || comments_open() || get_comments_number() ) : ?>
    <div class="entry-info">
    <?php if ( get_option('onemozilla_hide_authors') != 1 ) : ?>
      <address class="vcard">
      <?php if (function_exists(coauthors_posts_links)) : coauthors_posts_links(); else : the_author_posts_link(); endif; ?>
      </address>
    <?php endif; ?>

      <time class="date" title="<?php the_time('Y-m-d\TH:i:sP'); ?>" datetime="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php echo get_the_date(); ?></time>

    <?php if ( comments_open() || get_comments_number() ) : ?>
      <p class="entry-comments">
        <?php comments_popup_link( __( 'No responses yet', 'onemozilla' ), __( '1 response', 'onemozilla' ), __( '% responses', 'onemozilla' ) ); ?>
      </p>
    <?php endif; ?>
  </div>
  <?php endif; ?>
  <?php edit_post_link( __( 'Edit Post', 'onemozilla' ), '<p class="edit">', '</p>' ); ?>
  </header>

  <div class="entry-content">
    <?php the_content( __( 'Continue reading &hellip;', 'onemozilla' ) ); ?>
    <?php wp_link_pages( array( 'before' => '<p class="pages" role="navigation"><span>' . __( 'Pages:', 'onemozilla' ) . '</span>', 'after' => '</p>' ) ); ?>
  </div><!-- .entry-content -->

  <?php if ( has_tag() ) : // No need for a footer if there's nothing to show ?>
    <footer class="entry-meta">
      <p class="meta"><b><?php _e('Tags','onemozilla'); ?>:</b> <?php $tags_list = the_tags('',', ',''); ?></p>
    </footer>
  <?php endif; ?>

</article><!-- #post -->
