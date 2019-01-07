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
        <li class="nav-global-twitter"><a href="https://twitter.com/FirefoxNightly" rel="external"><?php _e('Twitter', 'frontierline'); ?></a></li>
        <li class="nav-global-join"><a href="https://wiki.mozilla.org/Nightly" rel="external"><?php _e('Get Involved', 'frontierline'); ?></a></li>
      </ul>

      <aside class="nav-global-fxdownload">
        <a href="https://www.mozilla.org/firefox/channel/desktop/?utm_source=<?php echo frontierline_blog_domain(); ?>&amp;utm_medium=referral&amp;utm_campaign=blog-nav#nightly" rel="external" class="button button-product"><?php _e('Download Firefox Nightly', 'frontierline'); ?></a>
      </aside>
    </div>

  </div>
</nav>
