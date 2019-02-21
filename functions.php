<?php
function plip_script_enqueue()
{
  // wp_enqueue_style(string $handle, mixed $src, array $deps, mixed $ver, string $media);
  wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/plip.css', array(), '1.0.0', 'all');
  wp_enqueue_script('customjs', get_template_directory_uri() . '/js/plip.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'plip_script_enqueue');

function plip_theme_setup()
{
  add_theme_support('menus');
  register_nav_menu('primary', 'Primary Header Navigation');
  register_nav_menu('secondary', 'Footer Navigation');
}

add_action('init', 'plip_theme_setup'); // execute after theme setup

function plip_navbar_logo($wp_customize)
{
  $wp_customize->add_section('plip-navbar-section', array(
    'title' => 'Navbar'
  ));

  $wp_customize->add_setting('plip-navbar-image');

  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'plip-navbar-image-control', array(
    'label' => 'image',
    'section' => 'plip-navbar-section',
    'settings' => 'plip-navbar-image',
    'width' => 674,
    'height' => 129
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
    $first_img = "/images/default.jpg";
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
?>
 