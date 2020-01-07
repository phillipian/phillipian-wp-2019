<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, target-densityDpi=device-dpi' name='viewport' />
    <title><?php echo wp_get_document_title(); ?></title>
    <?php
    date_default_timezone_set("America/New_York");
    ?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() ?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() ?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri() ?>/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri() ?>/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href=" https: //stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/navbar.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/home.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/home-new.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/home-breaking-news.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/list-reset.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/about.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/home-strip.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/subscribe.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/single.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/sports.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/author.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/archive.css' ?>" type='text/css' ">
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
            <div class='navbar-sections-button' tabindex='0' role='button'><span><i class=" fas fa-bars"></i> Sections</span></div>
    <div class='navbar-item'><span><a href='http://archives.phillipian.net/latest'>Latest Paper</a></span></div>
    <div class='navbar-rightnav'>
        <div class='navbar-item'><span><a href='<?php echo get_home_url() ?>/about/'>About</a></span></div>
        <div class='navbar-item'><span><a href='<?php echo get_home_url() ?>/about#masthead'>Masthead</a></span></div>
        <div class='navbar-item'><span><a href='http://archives.phillipian.net/'>Archives</a></span></div>
        <div class='navbar-item navbar-search' tabindex='0' role='button'><span><i class="fas fa-search"></i></span></div>
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