<?php
function plip_script_enqueue(){
  // wp_enqueue_style(string $handle, mixed $src, array $deps, mixed $ver, string $media);
  wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/plip.css', array(), '1.0.0', 'all');
  wp_enqueue_script('customjs', get_template_directory_uri() . '/js/plip.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'plip_script_enqueue');

function plip_theme_setup(){
  add_theme_support('menus');
  register_nav_menu('primary', 'Primary Header Navigation');
  register_nav_menu('secondary', 'Footer Navigation');
}

add_action('init', 'plip_theme_setup'); // execute after theme setup
?>
