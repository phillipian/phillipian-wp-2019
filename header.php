<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, target-densityDpi=device-dpi' name='viewport' />
    <title><?php bloginfo('name'); ?></title>
    <script type=" text/javascript">
        (function() {
            var trial = document.createElement('script');
            trial.type = 'text/javascript';
            trial.async = true;
            trial.src = 'https://easy.myfonts.net/v2/js?sid=341832(font-family=Avenir+Pro+35+Light)&sid=341836(font-family=Avenir+Pro+55+Roman)&sid=341838(font-family=Avenir+Pro+65+Medium)&sid=341840(font-family=Avenir+Pro+85+Heavy)&key=y08LtgnAaN';
            var head = document.getElementsByTagName("head")[0];
            head.appendChild(trial);
        })();
    </script>
    <link href=" https: //stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/navbar.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/home.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/list-reset.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/about.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/home-strip.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/subscribe.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/fonts/fontface.css' ?>" type='text/css' ">

        <?php wp_head(); ?>
</head>

<body>
    <div class='navbar navbar-sections-hover'>
        <div class='navbar-content'>
            <?php  /* wp_nav_menu(array('theme_location' => 'primary')) */ ?>
            <!--class: menu-main-navigation-container-->
            <div class='navbar-logo'>
                <a href='<?php echo get_home_url() ?>'><img class='desktop-logo' src='<?php echo get_template_directory_uri() . '/images/nameplate.png'; ?>'></a>
                <a href='<?php echo get_home_url() ?>'><img class='mobile-logo' src='<?php echo get_template_directory_uri() . '/images/ponly.png'; ?>'></a>
            </div>
            <div class='navbar-sections-button'><span><i class=" fas fa-bars"></i> Sections</span></div>
    <div class='navbar-item'><span><a href=''>This Week's Paper</a></span></div>
    <div class='navbar-rightnav'>
        <div class='navbar-item'><span><a href='<?php echo get_home_url() ?>/about/'>About</a></span></div>
        <div class='navbar-item'><span><a href='<?php echo get_home_url() ?>/about#masthead'>Masthead</a></span></div>
        <div class='navbar-item'><span><a href='http://archives.phillipian.net/'>Archives</a></span></div>
        <div class='navbar-item navbar-search'><span><i class="fas fa-search"></i></span></div>
    </div>
    </div>
    </div>
    <div class='sections-dropdown'>
        <div class='sections-dropdown-inner'>

            <?php wp_nav_menu(array('theme_location' => 'sections-1')) ?>
            <?php wp_nav_menu(array('theme_location' => 'sections-2')) ?>
            <?php wp_nav_menu(array('theme_location' => 'sections-3')) ?>
            <?php wp_nav_menu(array('theme_location' => 'sections-4')) ?>

        </div>
    </div>
    <div class='search-dropdown'>
        <?php get_search_form() ?>
    </div> 