<?php
/**
 * Newsletter subscription form.
 */

?>

<aside id="newsletter-subscribe" class="section newsletter-firefox">
  <form id="newsletter_form" class="content newsletter_form" name="newsletter_form" action="https://www.mozilla.org/en-US/newsletter/" method="post" data-blog="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
    <input type="hidden" id="newsletters" name="newsletters" value="mozilla-and-you">
    <input type="hidden" id="source_url" name="source_url" value="<?php frontierline_current_url(); ?>">

    <div class="form-title">
      <?php // L10n: line break for visual formatting ?>
      <h3><?php _e('Keep up with<br> all things Firefox.', 'frontierline'); ?></h3>
    </div>

    <div id="form-contents" class="form-contents">
      <div id="newsletter_errors" class="newsletter_errors"></div>

      <div class="field field-email">
        <label for="email"><?php _e('Your e-mail address', 'frontierline'); ?></label>
        <?php // L10n: 'yourname' is used as the first part of an example e-mail address, as in 'yourname@example.com' ?>
        <input type="email" id="email" name="email" required placeholder="<?php _e('yourname', 'frontierline'); ?>@example.com" size="30">
      </div>

      <div class="form-details">
        <div class="field field-country">
          <label for="country"><?php _e('Country', 'frontierline'); ?></label>
          <select id="country" name="country" required="required">
            <option value="" selected="selected"><?php _e('- select -', 'frontierline'); ?></option>
            <option value="af">Afghanistan</option>
            <option value="qz">Akrotiri</option>
            <option value="al">Albania</option>
            <option value="dz">Algeria</option>
            <option value="as">American Samoa</option>
            <option value="ad">Andorra</option>
            <option value="ao">Angola</option>
            <option value="ai">Anguilla</option>
            <option value="aq">Antarctica</option>
            <option value="ag">Antigua and Barbuda</option>
            <option value="ar">Argentina</option>
            <option value="am">Armenia</option>
            <option value="aw">Aruba</option>
            <option value="xa">Ashmore and Cartier Islands</option>
            <option value="au">Australia</option>
            <option value="at">Austria</option>
            <option value="az">Azerbaijan</option>
            <option value="bs">Bahamas, The</option>
            <option value="bh">Bahrain</option>
            <option value="xb">Baker Island</option>
            <option value="bd">Bangladesh</option>
            <option value="bb">Barbados</option>
            <option value="qs">Bassas da India</option>
            <option value="by">Belarus</option>
            <option value="be">Belgium</option>
            <option value="bz">Belize</option>
            <option value="bj">Benin</option>
            <option value="bm">Bermuda</option>
            <option value="bt">Bhutan</option>
            <option value="bo">Bolivia</option>
            <option value="bq">Bonaire, Sint Eustatius, and Saba</option>
            <option value="ba">Bosnia and Herzegovina</option>
            <option value="bw">Botswana</option>
            <option value="bv">Bouvet Island</option>
            <option value="br">Brazil</option>
            <option value="io">British Indian Ocean Territory</option>
            <option value="bn">Brunei</option>
            <option value="bg">Bulgaria</option>
            <option value="bf">Burkina Faso</option>
            <option value="mm">Burma</option>
            <option value="bi">Burundi</option>
            <option value="cv">Cabo Verde</option>
            <option value="kh">Cambodia</option>
            <option value="cm">Cameroon</option>
            <option value="ca">Canada</option>
            <option value="ky">Cayman Islands</option>
            <option value="cf">Central African Republic</option>
            <option value="td">Chad</option>
            <option value="cl">Chile</option>
            <option value="cn">China</option>
            <option value="cx">Christmas Island</option>
            <option value="cp">Clipperton Island</option>
            <option value="cc">Cocos (Keeling) Islands</option>
            <option value="co">Colombia</option>
            <option value="km">Comoros</option>
            <option value="cg">Congo (Brazzaville)</option>
            <option value="cd">Congo (Kinshasa)</option>
            <option value="ck">Cook Islands</option>
            <option value="xc">Coral Sea Islands</option>
            <option value="cr">Costa Rica</option>
            <option value="hr">Croatia</option>
            <option value="cu">Cuba</option>
            <option value="cw">Curaçao</option>
            <option value="cy">Cyprus</option>
            <option value="cz">Czech Republic</option>
            <option value="ci">Côte d’Ivoire</option>
            <option value="dk">Denmark</option>
            <option value="xd">Dhekelia</option>
            <option value="dg">Diego Garcia</option>
            <option value="dj">Djibouti</option>
            <option value="dm">Dominica</option>
            <option value="do">Dominican Republic</option>
            <option value="ec">Ecuador</option>
            <option value="eg">Egypt</option>
            <option value="sv">El Salvador</option>
            <option value="gq">Equatorial Guinea</option>
            <option value="er">Eritrea</option>
            <option value="ee">Estonia</option>
            <option value="et">Ethiopia</option>
            <option value="xe">Europa Island</option>
            <option value="fk">Falkland Islands (Islas Malvinas)</option>
            <option value="fo">Faroe Islands</option>
            <option value="fj">Fiji</option>
            <option value="fi">Finland</option>
            <option value="fr">France</option>
            <option value="gf">French Guiana</option>
            <option value="pf">French Polynesia</option>
            <option value="tf">French Southern and Antarctic Lands</option>
            <option value="ga">Gabon</option>
            <option value="gm">Gambia, The</option>
            <option value="xg">Gaza Strip</option>
            <option value="ge">Georgia</option>
            <option value="de">Germany</option>
            <option value="gh">Ghana</option>
            <option value="gi">Gibraltar</option>
            <option value="qx">Glorioso Islands</option>
            <option value="gr">Greece</option>
            <option value="gl">Greenland</option>
            <option value="gd">Grenada</option>
            <option value="gp">Guadeloupe</option>
            <option value="gu">Guam</option>
            <option value="gt">Guatemala</option>
            <option value="gg">Guernsey</option>
            <option value="gn">Guinea</option>
            <option value="gw">Guinea-Bissau</option>
            <option value="gy">Guyana</option>
            <option value="ht">Haiti</option>
            <option value="hm">Heard Island and McDonald Islands</option>
            <option value="hn">Honduras</option>
            <option value="hk">Hong Kong</option>
            <option value="xh">Howland Island</option>
            <option value="hu">Hungary</option>
            <option value="is">Iceland</option>
            <option value="in">India</option>
            <option value="id">Indonesia</option>
            <option value="ir">Iran</option>
            <option value="iq">Iraq</option>
            <option value="ie">Ireland</option>
            <option value="im">Isle of Man</option>
            <option value="il">Israel</option>
            <option value="it">Italy</option>
            <option value="jm">Jamaica</option>
            <option value="xj">Jan Mayen</option>
            <option value="jp">Japan</option>
            <option value="xq">Jarvis Island</option>
            <option value="je">Jersey</option>
            <option value="xu">Johnston Atoll</option>
            <option value="jo">Jordan</option>
            <option value="qu">Juan de Nova Island</option>
            <option value="kz">Kazakhstan</option>
            <option value="ke">Kenya</option>
            <option value="xm">Kingman Reef</option>
            <option value="ki">Kiribati</option>
            <option value="kp">Korea, North</option>
            <option value="kr">Korea, South</option>
            <option value="xk">Kosovo</option>
            <option value="kw">Kuwait</option>
            <option value="kg">Kyrgyzstan</option>
            <option value="la">Laos</option>
            <option value="lv">Latvia</option>
            <option value="lb">Lebanon</option>
            <option value="ls">Lesotho</option>
            <option value="lr">Liberia</option>
            <option value="ly">Libya</option>
            <option value="li">Liechtenstein</option>
            <option value="lt">Lithuania</option>
            <option value="lu">Luxembourg</option>
            <option value="mo">Macau</option>
            <option value="mk">Macedonia</option>
            <option value="mg">Madagascar</option>
            <option value="mw">Malawi</option>
            <option value="my">Malaysia</option>
            <option value="mv">Maldives</option>
            <option value="ml">Mali</option>
            <option value="mt">Malta</option>
            <option value="mh">Marshall Islands</option>
            <option value="mq">Martinique</option>
            <option value="mr">Mauritania</option>
            <option value="mu">Mauritius</option>
            <option value="yt">Mayotte</option>
            <option value="mx">Mexico</option>
            <option value="fm">Micronesia, Federated States of</option>
            <option value="qm">Midway Islands</option>
            <option value="md">Moldova</option>
            <option value="mc">Monaco</option>
            <option value="mn">Mongolia</option>
            <option value="me">Montenegro</option>
            <option value="ms">Montserrat</option>
            <option value="ma">Morocco</option>
            <option value="mz">Mozambique</option>
            <option value="na">Namibia</option>
            <option value="nr">Nauru</option>
            <option value="xv">Navassa Island</option>
            <option value="np">Nepal</option>
            <option value="nl">Netherlands</option>
            <option value="nc">New Caledonia</option>
            <option value="nz">New Zealand</option>
            <option value="ni">Nicaragua</option>
            <option value="ne">Niger</option>
            <option value="ng">Nigeria</option>
            <option value="nu">Niue</option>
            <option value="nf">Norfolk Island</option>
            <option value="mp">Northern Mariana Islands</option>
            <option value="no">Norway</option>
            <option value="om">Oman</option>
            <option value="pk">Pakistan</option>
            <option value="pw">Palau</option>
            <option value="xl">Palmyra Atoll</option>
            <option value="pa">Panama</option>
            <option value="pg">Papua New Guinea</option>
            <option value="xp">Paracel Islands</option>
            <option value="py">Paraguay</option>
            <option value="pe">Peru</option>
            <option value="ph">Philippines</option>
            <option value="pn">Pitcairn Islands</option>
            <option value="pl">Poland</option>
            <option value="pt">Portugal</option>
            <option value="pr">Puerto Rico</option>
            <option value="qa">Qatar</option>
            <option value="re">Reunion</option>
            <option value="ro">Romania</option>
            <option value="ru">Russia</option>
            <option value="rw">Rwanda</option>
            <option value="bl">Saint Barthelemy</option>
            <option value="sh">Saint Helena, Ascension, and Tristan da Cunha</option>
            <option value="kn">Saint Kitts and Nevis</option>
            <option value="lc">Saint Lucia</option>
            <option value="mf">Saint Martin</option>
            <option value="pm">Saint Pierre and Miquelon</option>
            <option value="vc">Saint Vincent and the Grenadines</option>
            <option value="ws">Samoa</option>
            <option value="sm">San Marino</option>
            <option value="st">Sao Tome and Principe</option>
            <option value="sa">Saudi Arabia</option>
            <option value="sn">Senegal</option>
            <option value="rs">Serbia</option>
            <option value="sc">Seychelles</option>
            <option value="sl">Sierra Leone</option>
            <option value="sg">Singapore</option>
            <option value="sx">Sint Maarten</option>
            <option value="sk">Slovakia</option>
            <option value="si">Slovenia</option>
            <option value="sb">Solomon Islands</option>
            <option value="so">Somalia</option>
            <option value="za">South Africa</option>
            <option value="gs">South Georgia and South Sandwich Islands</option>
            <option value="ss">South Sudan</option>
            <option value="es">Spain</option>
            <option value="xs">Spratly Islands</option>
            <option value="lk">Sri Lanka</option>
            <option value="sd">Sudan</option>
            <option value="sr">Suriname</option>
            <option value="xr">Svalbard</option>
            <option value="sz">Swaziland</option>
            <option value="se">Sweden</option>
            <option value="ch">Switzerland</option>
            <option value="sy">Syria</option>
            <option value="tw">Taiwan</option>
            <option value="tj">Tajikistan</option>
            <option value="tz">Tanzania</option>
            <option value="th">Thailand</option>
            <option value="tl">Timor-Leste</option>
            <option value="tg">Togo</option>
            <option value="tk">Tokelau</option>
            <option value="to">Tonga</option>
            <option value="tt">Trinidad and Tobago</option>
            <option value="xt">Tromelin Island</option>
            <option value="tn">Tunisia</option>
            <option value="tr">Turkey</option>
            <option value="tm">Turkmenistan</option>
            <option value="tc">Turks and Caicos Islands</option>
            <option value="tv">Tuvalu</option>
            <option value="ug">Uganda</option>
            <option value="ua">Ukraine</option>
            <option value="ae">United Arab Emirates</option>
            <option value="gb">United Kingdom</option>
            <option value="us">United States</option>
            <option value="uy">Uruguay</option>
            <option value="uz">Uzbekistan</option>
            <option value="vu">Vanuatu</option>
            <option value="va">Vatican City</option>
            <option value="ve">Venezuela</option>
            <option value="vn">Vietnam</option>
            <option value="vg">Virgin Islands, British</option>
            <option value="vi">Virgin Islands, U.S.</option>
            <option value="qw">Wake Island</option>
            <option value="wf">Wallis and Futuna</option>
            <option value="xw">West Bank</option>
            <option value="eh">Western Sahara</option>
            <option value="ye">Yemen</option>
            <option value="zm">Zambia</option>
            <option value="zw">Zimbabwe</option>
          </select>
        </div>

        <div class="field field-language">
          <label for="lang"><?php _e('Language', 'frontierline'); ?></label>
          <select id="lang" name="lang" required="required">
            <option value="id">Bahasa Indonesia</option>
            <option value="de">Deutsch</option>
            <option value="en" selected="selected">English</option>
            <option value="es">Español</option>
            <option value="fr">Français</option>
            <option value="pl">Polski</option>
            <option value="pt">Português</option>
            <option value="ru">Русский</option>
            <option value="zh-TW">正體中文</option>
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
        <button id="newsletter_submit" type="submit" class="form-button button-light"><?php _e('Sign up now', 'frontierline'); ?></button>
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
