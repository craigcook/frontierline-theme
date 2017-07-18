    </main>

  <?php get_sidebar(); ?>

  <?php if ('enabled' === get_theme_mod('frontierline_category_drawer', 'enabled')) : ?>
    <?php get_template_part('includes/categories'); ?>
  <?php endif; ?>

  <?php if (!is_singular()) : ?>
    <?php get_template_part('includes/newsletter-form'); ?>
  <?php endif; ?>

  </div><!-- /.site-wrap -->



<footer id="site-info" class="section">
  <div class="content">
    <nav class="primary">
      <div class="logo">
        <a href="https://www.mozilla.org" data-link-type="footer" data-link-name="Mozilla">Mozilla</a>
      </div>
      <section class="mozilla">
        <h5>Mozilla</h5>
        <ul class="mozilla-links">
          <li><a href="https://www.mozilla.org/about/" data-link-type="footer" data-link-name="About">About</a></li>
          <li><a href="https://www.mozilla.org/contact/" data-link-type="footer" data-link-name="Contact Us"><?php _e('Contact Us', 'frontierline'); ?></a></li>
          <li><a href="https://donate.mozilla.org/?presets=100,50,25,15&amp;amount=50&amp;currency=usd" class="donate" data-link-type="footer" data-link-name="Donate"><?php _e('Donate', 'frontierline'); ?></a></li>
          <li>
            <ul class="social-links">
              <li><a class="twitter" href="https://twitter.com/mozilla" data-link-type="footer" data-link-name="Twitter (@mozilla)">Twitter<span> (@mozilla)</span></a></li>
              <li><a class="facebook" href="https://www.facebook.com/mozilla" data-link-type="footer" data-link-name="Facebook (Mozilla)">Facebook<span> (Mozilla)</span></a></li>
              <li><a class="instagram" href="https://www.instagram.com/mozillagram/" data-link-type="footer" data-link-name="Instagram (@mozillagram)">Instagram<span> (@mozillagram)</span></a></li>
            </ul>
          </li>
        </ul>
      </section>
      <section class="firefox">
        <h5>Firefox</h5>
        <ul class="firefox-links">
          <li><a href="https://www.mozilla.org/firefox/" data-link-type="footer" data-link-name="Download Firefox now"><?php _e('Download Firefox Web Browser', 'frontierline'); ?></a></li>
          <li><a href="https://www.mozilla.org/firefox/desktop/" data-link-type="footer" data-link-name="Desktop Browser for Mac, Windows, Linux"><?php _e('Desktop Browser for Mac, Windows, Linux', 'frontierline'); ?></a></li>
          <li><a href="https://www.mozilla.org/firefox/android/" data-link-type="footer" data-link-name="Mobile Browser for Android"><?php _e('Mobile Browser for Android', 'frontierline'); ?></a></li>
          <li><a href="https://www.mozilla.org/firefox/ios/" data-link-type="footer" data-link-name="Mobile Browser for iOS"><?php _e('Mobile Browser for iOS', 'frontierline'); ?></a></li>
          <li>
            <ul class="social-links">
              <li><a class="twitter" href="https://twitter.com/firefox" data-link-type="footer" data-link-name="Twitter (@firefox)">Twitter<span> (@firefox)</span></a></li>
              <li><a class="facebook" href="https://www.facebook.com/Firefox" data-link-type="footer" data-link-name="Facebook (Firefox)">Facebook<span> (Firefox)</span></a></li>
              <li><a class="youtube" href="https://www.youtube.com/firefoxchannel" data-link-type="footer" data-link-name="YouTube (firefoxchannel)">YouTube<span> (firefoxchannel)</span></a></li>
            </ul>
          </li>
        </ul>
      </section>
    </nav>

    <nav class="secondary">
        <div class="small-links">
          <ul>
            <li><a rel="nofollow" href="https://www.mozilla.org/privacy/" data-link-type="footer" data-link-name="Privacy"><?php _e('Privacy', 'frontierline'); ?></a></li>
            <li><a rel="nofollow" href="https://www.mozilla.org/privacy/websites/#cookies" data-link-type="footer" data-link-name="Cookies"><?php _e('Cookies', 'frontierline'); ?></a></li>
            <li><a rel="nofollow" href="https://www.mozilla.org/about/legal/" data-link-type="footer" data-link-name="Legal"><?php _e('Legal', 'frontierline'); ?></a></li>
          </ul>
          <p class="license">
          <?php printf(__('Portions of this content are ©1998-%1s by individual contributors. Content available under a <a href="%2s" rel="external license">Creative Commons license</a>', 'frontierline'), date('Y'), esc_attr('https://www.mozilla.org/foundation/licensing/website-content/')); ?>
          </p>
        </div>
    </nav>
  </div>
</footer>

  <!--[if IE 9]>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/matchMedia.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/matchMedia.addListener.js"></scrip>
  <![endif]-->

  <?php wp_footer(); ?>
</body>
</html>
