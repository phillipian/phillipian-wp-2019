<?php

add_filter('use_block_editor_for_post', '__return_false', 10);

function jetpackme_remove_rp()
{
  if (class_exists('Jetpack_RelatedPosts')) {
    $jprp = Jetpack_RelatedPosts::init();
    $callback = array($jprp, 'filter_add_target_to_dom');
    remove_filter('the_content', $callback, 40);
  }
}
add_filter('wp', 'jetpackme_remove_rp', 20);

function plip_script_enqueue()
{
  // wp_enqueue_style(string $handle, mixed $src, array $deps, mixed $ver, string $media);
  wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/plip.css', array(), null, 'all');
  wp_enqueue_script('customjs', get_template_directory_uri() . '/js/section-dropdown.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'plip_script_enqueue');

function plip_theme_setup()
{
  add_theme_support('menus');
  register_nav_menus(array(
    'primary' => __('Primary Header Navigation'),
    'secondary' => __( 'Footer Navigation'),
    'home-cats' => __('Home Category Bar'),
    'sections-1' => __('Sections Dropdown 1'),
    'sections-2' => __('Sections Dropdown 2'),
    'sections-3' => __('Sections Dropdown 3'),
    'sections-4' => __('Sections Dropdown 4')
  ));
}

add_action('init', 'plip_theme_setup'); // execute after theme setup

function plip_navbar_logo($wp_customize)
{
  $wp_customize->add_section('plip-navbar-section', array(
    'title' => 'Navbar'
  ));

  $wp_customize->add_setting('plip-navbar-image');
  $wp_customize->add_setting('plip-navbar-image-mobile');

  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'plip-navbar-image-control', array(
    'label' => 'image',
    'section' => 'plip-navbar-section',
    'settings' => 'plip-navbar-image'
  )));

  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'plip-navbar-image-mobile-control', array(
    'label' => 'image',
    'section' => 'plip-navbar-section',
    'settings' => 'plip-navbar-image-mobile'
  )));
}

add_action('customize_register', 'plip_navbar_logo');

function catch_that_image()
{
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if (empty($first_img)) { //Defines a default image
    $first_img = false;
  }
  return $first_img;
}

function custom_excerpt_length($length)
{
  return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

function custom_excerpt_more($more)
{
  return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');
 