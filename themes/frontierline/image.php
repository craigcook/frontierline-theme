<?php
/**
 * Attachment page.
 */
?>

<?php get_header(); ?>

  <?php while (have_posts()) : the_post(); ?>
  <div class="content">

    <article id="post-<?php the_ID(); ?>" <?php post_class('image-attachment'); ?>>
      <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h2>
        <div class="entry-info">
          <?php
            $metadata = wp_get_attachment_metadata();
            printf(__('<time class="date published" title="%1$s" datetime="%1$s">%2$s</time>', 'frontierline'),
              esc_attr( get_the_time('Y-m-d\TH:i:sP') ),
              get_the_date(get_option('date_format'))
            );
          ?>
          <p class="meta">
            <?php printf(__('Original size: <a href="%1$s">%2$s &times; %3$s</a>', 'frontierline'),
              esc_url(wp_get_attachment_url()),
              $metadata['width'],
              $metadata['height']
            ); ?>
          </p>
          <?php edit_post_link( __( 'Edit', 'frontierline' ), '<p class="edit">', '</p>' ); ?>
        </div>
      </header>

      <div class="entry-content">
        <figure class="entry-attachment wp-caption aligncenter">
        <?php echo wp_get_attachment_image( get_the_ID(), 'extra-large' ); ?>

        <?php if (! empty($post->post_excerpt)) : ?>
          <figcaption class="wp-caption-text">
            <?php the_excerpt(); ?>
          </figcaption>
        <?php endif; ?>
        </figure>

        <?php the_content(); ?>
      </div>

    </article>

  </div>

  <?php if (is_singular()) : // Probably redundant because this is the single attachment template, but just to be safe... ?>
    <?php get_template_part('includes/newsletter-form'); ?>
  <?php endif; ?>

  <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
