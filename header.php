<!doctype html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>Phillipian Prototype</title>
    <?php wp_head(); ?>
  </head>
  <body>
    <div class='navbar'>
      <div class='navbar-content'>
        <div class='navbar-logo'>
          <a href='http://localhost/wordpress/'><img src='<?php echo wp_get_attachment_url(get_theme_mod('plip-navbar-image')) ?>'></a>
        </div>
        <?php wp_nav_menu(array('theme_location'=>'primary')) ?> <!--class: menu-main-navigation-container-->
      </div>
    </div>
