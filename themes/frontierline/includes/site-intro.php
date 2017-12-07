<?php
/**
 * An optional site intro.
 */
?>

<?php if (is_front_page() && !is_paged() && (get_theme_mod('frontierline_site_intro') === '1') && (get_theme_mod('frontierline_site_intro_text', '') !== '')) : ?>
  <section id="site-intro" class="section site-intro">
    <div class="content">
      <?php echo frontierline_filter_site_intro_text(); ?>
    </div>
  </section>
<?php endif; ?>
