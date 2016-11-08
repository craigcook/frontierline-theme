<?php
/**
 * Newsletter subscription form.
 */

global $wp;
$current_url = esc_attr(home_url(add_query_arg(array(),$wp->request)));
?>

<aside id="newsletter-subscribe" class="section">
  <form id="newsletter_form" class="content newsletter_form" name="newsletter_form" action="https://www.mozilla.org/en-US/newsletter/" method="post">
    <input type="hidden" id="newsletters" name="newsletters" value="mozilla-foundation">
    <input type="hidden" id="source_url" name="source_url" value="<?php echo $current_url; ?>">

    <div class="form-title">
      <h3><?php _e('Love the Web?', 'frontierline'); ?></h3>
      <h4><?php _e('Get the Mozilla newsletter and help us keep it open and free.', 'frontierline'); ?></h4>
    </div>

    <div id="form-contents" class="form-contents">
      <div id="newsletter_errors" class="newsletter_errors"></div>

      <div class="field field-email">
        <label for="email"><?php _e('Your e-mail address', 'frontierline'); ?></label>
        <?php // L10n: 'yourname' is used in an example e-mail address. ?>
        <input type="email" id="email" name="email" required placeholder="<?php _e('yourname', 'frontierline'); ?>@example.com" size="30">
      </div>

      <div class="form-details">
        <div class="field field-language">
          <label for="lang"><?php _e('Language', 'frontierline'); ?></label>
          <select aria-required="true" id="lang" name="lang" required="required">
            <option value="de">Deutsch</option>
            <option value="en" selected="selected">English</option>
            <option value="es">Español</option>
            <option value="fr">Français</option>
            <option value="pl">Polski</option>
          </select>
        </div>

        <div class="field field-format">
          <label for="format-h"><input checked="checked" id="format-h" name="fmt" value="H" type="radio"> <?php _e('HTML', 'frontierline'); ?></label>
          <label for="format-t"><input id="format-t" name="fmt" value="T" type="radio"> <?php _e('Text', 'frontierline'); ?></label>
        </div>

        <div class="field field-privacy">
          <label for="privacy">
            <input type="checkbox" id="privacy" name="privacy" required>
            <?php printf(__('I’m okay with Mozilla handling my info as explained in this <a href="%s">Privacy Policy</a>.', 'frontierline'), 'https://www.mozilla.org/privacy/' ); ?>
          </label>
        </div>
      </div>

      <div class="form-submit">
        <button id="newsletter_submit" type="submit" class="form-button light"><?php _e('Sign up now', 'frontierline'); ?></button>
        <p class="form-details promise">
          <small><?php _e('We will only send you Mozilla-related information.', 'frontierline'); ?></small>
        </p>
      </div>
    </div>

    <div id="newsletter_thanks" class="thanks">
      <h2><?php _e('Thanks!', 'frontierline'); ?></h2>
      <p>
        <?php _e('If you haven’t previously confirmed a subscription to a Mozilla-related newsletter you may have to do so.', 'frontierline'); ?>
        <?php _e('Please check your inbox or your spam filter for an e-mail from us.', 'frontierline'); ?>
      </p>
    </div>

  </form>
</aside>
