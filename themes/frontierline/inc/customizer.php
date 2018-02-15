<?php

/**
 * Add color scheme selection to theme customizer.
 */
function frontierline_customize_register($wp_customize) {

  // Theme Options
  $wp_customize->add_section('frontierline_theme_options', array(
    'priority' => 70,
    'title'    => esc_html__('Theme Options', 'frontierline'),
  ));

  // Register color scheme setting and control
  $wp_customize->add_setting('frontierline_color_scheme', array(
    'default'           => 'none',
    'sanitize_callback' => 'frontierline_sanitize_color_scheme',
    'transport'         => 'postMessage',
  ));

  $wp_customize->add_control('frontierline_color_scheme', array(
    'label'    => __('Accent Color', 'frontierline'),
    'priority' => 5,
    'section'  => 'frontierline_theme_options',
    'type'     => 'select',
    'choices'  => array(
      'none'      => __('None (Default)', 'frontierline'),
      'cyan'      => __('Cyan', 'frontierline'),
      'coral'     => __('Coral', 'frontierline'),
      'yellow'    => __('Yellow', 'frontierline'),
      'lilac'     => __('Lilac', 'frontierline'),
      'orange'    => __('Orange', 'frontierline'),
      'lime'      => __('Lime', 'frontierline'),
      'neonblue'  => __('Neon Blue', 'frontierline'),
      'neonpink'  => __('Neon Pink', 'frontierline'),
      'neongreen' => __('Neon Green', 'frontierline'),
    ),
  ));

  // Register header pattern option and control
  $wp_customize->add_setting('frontierline_head_pattern', array(
    'default'           => 'none',
    'sanitize_callback' => 'frontierline_sanitize_head_pattern',
    'transport'         => 'postMessage',
  ));

  $wp_customize->add_control('frontierline_head_pattern', array(
    'label'    => __('Header Pattern', 'frontierline'),
    'priority' => 6,
    'section'  => 'frontierline_theme_options',
    'type'     => 'select',
    'choices'  => array(
      'none'          => __('None (Default)', 'frontierline'),
      'arrows'        => __('Arrows', 'frontierline'),
      'basketweave'   => __('Basket Weave', 'frontierline'),
      'confetti'      => __('Confetti', 'frontierline'),
      'emoticons'     => __('Emoticons', 'frontierline'),
      'slashbracket'  => __('Slashes and Brackets', 'frontierline'),
      'tradewinds'    => __('Trade Winds', 'frontierline'),
    ),
  ));

  // Register category drawer option and control
  $wp_customize->add_setting('frontierline_category_drawer', array(
    'capability'        => 'edit_theme_options',
    'default'           => false,
    'sanitize_callback' => 'frontierline_sanitize_checkbox',
    'type'              => 'theme_mod',
  ));

  $wp_customize->add_control('frontierline_category_drawer', array(
    'label'       => esc_html__('Header Category Menu', 'frontierline'),
    'description' => esc_html__('Enable a drop down category menu on the fixed navigation bar.', 'frontierline'),
    'priority' => 7,
    'section'     => 'frontierline_theme_options',
    'settings'    => 'frontierline_category_drawer',
    'type'        => 'checkbox',
  ));

  // Register Firefox download button option and control
  $wp_customize->add_setting('frontierline_firefox_button', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'sanitize_callback' => 'frontierline_sanitize_checkbox',
    'type'              => 'theme_mod',
  ));

  $wp_customize->add_control('frontierline_firefox_button', array(
    'label'       => esc_html__('Firefox download button', 'frontierline'),
    'description' => esc_html__('Display a "Download Firefox" button in the main navigation in place of the "Discover Firefox" link.', 'frontierline'),
    'priority' => 7,
    'section'     => 'frontierline_theme_options',
    'settings'    => 'frontierline_firefox_button',
    'type'        => 'checkbox',
  ));

  // Register featured image aka post thumbnail option and control
  $wp_customize->add_setting('frontierline_no_post_thumbnail', array(
      'capability'        => 'edit_theme_options',
      'default'           => '',
      'sanitize_callback' => 'frontierline_sanitize_checkbox',
      'type'              => 'theme_mod',
    ));

  $wp_customize->add_control('frontierline_no_post_thumbnail', array(
    'label'       => esc_html__('Disable featured images', 'frontierline'),
    'description' => esc_html__('Do not display featured images on posts.', 'frontierline'),
    'priority' => 9,
    'section'     => 'frontierline_theme_options',
    'settings'    => 'frontierline_no_post_thumbnail',
    'type'        => 'checkbox',
  ));

  // Register byline option and control
  $wp_customize->add_setting('frontierline_no_byline', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'sanitize_callback' => 'frontierline_sanitize_checkbox',
    'type'              => 'theme_mod',
  ));

  $wp_customize->add_control('frontierline_no_byline', array(
    'label'       => esc_html__('Hide Byline', 'frontierline'),
    'description' => esc_html__('Do not display the author\'s name with articles.', 'frontierline'),
    'priority' => 10,
    'section'     => 'frontierline_theme_options',
    'settings'    => 'frontierline_no_byline',
    'type'        => 'checkbox',
  ));

  // Register site intro enable option and control
  $wp_customize->add_setting('frontierline_site_intro', array(
    'capability'        => 'edit_theme_options',
    'default'           => '',
    'sanitize_callback' => 'frontierline_sanitize_checkbox',
    'type'              => 'theme_mod',
  ));

  $wp_customize->add_control('frontierline_site_intro', array(
    'label'       => esc_html__('Site introduction', 'frontierline'),
    'description' => esc_html__('Display a brief introduction to appear at the top of the home page.', 'frontierline'),
    'priority'    => 20,
    'section'     => 'static_front_page',
    'settings'    => 'frontierline_site_intro',
    'type'        => 'checkbox',
  ));

  // Register site intro text option and control
  $wp_customize->add_setting('frontierline_site_intro_text', array(
    'sanitize_callback' => 'frontierline_sanitize_text',
    'default'           => '',
  ));

  $wp_customize->add_control('frontierline_site_intro_text', array(
    'label'       => esc_html__('Site introduction text', 'frontierline'),
    'description' => esc_html__('Some HTML is allowed.', 'frontierline'),
    'priority'    => 20,
    'section'     => 'static_front_page',
    'settings'    => 'frontierline_site_intro_text',
    'type'        => 'textarea',
  ));
}
add_action('customize_register', 'frontierline_customize_register');

/*
 * Sanitize excerpt select option
 */
function frontierline_sanitize_excerpt_select($excerpt_select) {
  if (!in_array($excerpt_select, array('disabled', 'enabled'))) {
    $excerpt_select = 'disabled';
  }
  return $excerpt_select;
}

/**
 * Sanitize the color scheme.
 */
function frontierline_sanitize_color_scheme($input) {
  $valid = array('none', 'cyan', 'coral', 'yellow', 'lilac', 'orange', 'lime', 'neonblue', 'neonpink', 'neongreen');

  if (in_array($input, $valid)) {
    return $input;
  }
  return 'none'; // Default
}


/**
 * Sanitize the header pattern.
 */
function frontierline_sanitize_head_pattern($input) {
  $valid = array('none', 'arrows', 'basketweave', 'confetti', 'emoticons', 'slashbracket', 'tradewinds');

  if (in_array($input, $valid)) {
    return $input;
  }
  return 'none'; // Default
}

/**
 * Sanitize checkbox values.
 */
function frontierline_sanitize_checkbox($input) {
  if ($input === true || $input === '1') {
    return '1';
  }
  return '';
}


/**
 * Sanitize text
 */
function frontierline_sanitize_text($input) {
  return wp_kses_post(force_balance_tags($input));
}


/**
 * Render the site intro text
 */
function frontierline_filter_site_intro_text() {
  $intro_text = get_theme_mod('frontierline_site_intro_text');

  if ($intro_text) {
    return $intro_text;
  }
}
add_filter('frontierline_site_intro_text', 'frontierline_filter_intro_text');


/**
 * Bind JS handlers to instantly live-preview changes.
 */
function frontierline_customize_preview_js() {
  wp_enqueue_script('frontierline-customize-preview', get_theme_file_uri('/js/customize-preview.js'), array('customize-preview'), '1.0', true);
}
add_action('customize_preview_init', 'frontierline_customize_preview_js');
