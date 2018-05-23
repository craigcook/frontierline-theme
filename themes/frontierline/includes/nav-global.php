<?php
/**
 * Global navigation bar.
 */
?>

<nav id="nav-global" class="nav-global can-stick">
  <div class="content">
    <div class="logo"><a href="https://www.mozilla.org/?utm_source=<?php echo frontierline_blog_domain(); ?>&amp;utm_medium=referral&amp;utm_campaign=blog-nav" rel="external" title="<?php _e('Visit mozilla.org', 'frontierline'); ?>">Mozilla</a></div>

    <div class="nav-mozilla">
      <span class="toggle" role="button" aria-controls="nav-mozilla-menu" aria-expanded="false" tabindex="0"><?php _e('Menu', 'frontierline'); ?></span>
      <ul class="nav-mozilla-menu" id="nav-mozilla-menu">
        <li class="nav-global-health"><a href="https://www.mozilla.org/internet-health/?utm_source=<?php echo frontierline_blog_domain(); ?>&amp;utm_medium=referral&amp;utm_campaign=blog-nav" rel="external"><?php _e('Internet Health', 'frontierline'); ?></a></li>
        <li class="nav-global-tech"><a href="https://www.mozilla.org/technology/?utm_source=<?php echo frontierline_blog_domain(); ?>&amp;utm_medium=referral&amp;utm_campaign=blog-nav" rel="external"><?php _e('Technology', 'frontierline'); ?></a></li>
        <li class="nav-global-donate"><a href="https://donate.mozilla.org/?presets=50,30,20,10&amp;amount=30&amp;currency=usd&amp;utm_source=<?php echo frontierline_blog_domain(); ?>&amp;utm_medium=referral&amp;utm_campaign=blog-nav" rel="external"><?php _e('Give', 'frontierline'); ?></a></li>
      <?php if (get_theme_mod('frontierline_firefox_button') != '1') : ?>
        <li class="nav-global-firefox"><a href="https://www.mozilla.org/firefox/?utm_source=<?php echo frontierline_blog_domain(); ?>&amp;utm_medium=referral&amp;utm_campaign=blog-nav" rel="external"><?php _e('Discover Firefox', 'frontierline'); ?></a></li>
      <?php endif; ?>
      </ul>

    <?php if (get_theme_mod('frontierline_firefox_button') === '1') : ?>
      <aside class="nav-global-fxdownload"><a href="https://www.mozilla.org/firefox/new/?utm_source=<?php echo frontierline_blog_domain(); ?>&amp;utm_medium=referral&amp;utm_campaign=blog-nav" rel="external" class="button button-green"><?php _e('Download Firefox', 'frontierline'); ?></a></aside>
    <?php endif; ?>
    </div>
  </div>
</nav>
