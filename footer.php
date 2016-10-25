
  </main>

  <?php get_sidebar(); ?>
  <?php get_template_part('explore'); ?>


  <?php if (!is_singular()) : ?>
    <aside id="newsletter-subscribe" class="section">

      <form class="content newsletter-form footer-newsletter-form" id="newsletter-form" action="#" method="post" data-spinner-color="#fff">
        <input id="id_newsletters" maxlength="100" name="newsletters" type="hidden" value="mozilla-foundation" />
        <input type="hidden" name="source_url" value="<?php the_permalink(); ?>">

        <div class="form-title">
          <h3>Love the Web?</h3>
          <h4>Get the Mozilla newsletter and help us keep it open and free.</h4>
        </div>

        <div class="form-contents">
          <div class="field field-email">
            <label fpr="id_email">Your e-mail address</label>
            <input id="id_email" name="email" placeholder="yourname@example.com" required="required" type="email">
          </div>
          <div class="form-submit">
            <button type="submit" id="footer_email_submit" class="form-button hollow light">Sign Up Now</button>
            <p class="form-details">
              <small>We will only send you Mozilla-related information.</small>
            </p>
          </div>
        </div>
      </form>

    </aside>
  <?php endif; ?>

</div><!-- /.site-wrap -->

  <footer id="site-info" class="section">
    <div class="content">

      <section class="col col-1">
        <div class="logo"><a href="https://www.mozilla.org">Mozilla</a></div>
        <p id="license" class="license">
        <?php printf(__('Portions of this content are ©1998-%1s by individual contributors. Content available under a <a href="%2s" rel="external license">Creative Commons license</a>', 'rebrand'), date('Y'), esc_attr('https://www.mozilla.org/foundation/licensing/website-content/') ); ?>
        </p>
      </section>

      <section class="col col-2">
        <ul class="links-join">
          <li><a href="https://www.mozilla.org/contact/"><?php _e('Contact Us', 'rebrand'); ?></a></li>
          <li class="wrap"><a class="donate" href="https://donate.mozilla.org/?presets=100,50,25,15&amp;amount=50&amp;currency=usd"><?php _e('Donate', 'rebrand'); ?></a></li>
        </ul>

        <ul class="links-legal">
          <li><a href="https://www.mozilla.org/privacy/"><?php _e('Privacy', 'rebrand'); ?></a></li>
          <li class="wrap"><a href="https://www.mozilla.org/privacy/websites/#cookies"><?php _e('Cookies', 'rebrand'); ?></a></li>
          <li class="wrap"><a href="https://www.mozilla.org/about/legal/"><?php _e('Legal', 'rebrand'); ?></a></li>
          <li class="clear"><a href="https://www.mozilla.org/about/legal/fraud-report/"><?php _e('Report Trademark Abuse', 'rebrand'); ?></a></li>
        </ul>
      </section>

      <section class="col col-3">
        <ul class="links-social">
          <li>
            Mozilla:
            <ul>
              <li class="wrap"><a href="https://twitter.com/mozilla">Twitter<span> (@mozilla)</span></a></li>
              <li class="wrap"><a href="https://www.facebook.com/mozilla">Facebook<span> (Mozilla)</span></a></li>
            </ul>
          </li>
          <li>
            Firefox:
            <ul>
              <li class="wrap"><a href="https://twitter.com/firefox">Twitter<span> (@firefox)</span></a></li>
              <li class="wrap"><a href="https://www.facebook.com/Firefox">Facebook<span> (Firefox)</span></a></li>
              <li class="wrap"><a href="https://www.youtube.com/firefoxchannel">YouTube<span> (firefoxchannel)</span></a></li>
            </ul>
          </li>
        </ul>
      </section>

    </div>
  </footer>

<?php wp_footer(); ?>
</body>
</html>
