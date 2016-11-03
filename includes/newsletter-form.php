<?php
/**
 * Newsletter subscription form.
 */
?>
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
        <button type="submit" id="email-submit" class="form-button hollow light">Sign Up Now</button>
        <p class="form-details">
          <small>We will only send you Mozilla-related information.</small>
        </p>
      </div>
    </div>
  </form>

</aside>
