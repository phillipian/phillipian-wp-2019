<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, target-densityDpi=device-dpi' name='viewport' />
    <title>Phillipian Prototype</title>
    <script type=" text/javascript"> (function() { var trial=document.createElement('script'); trial.type='text/javascript' ; trial.async=true; trial.src='https://easy.myfonts.net/v2/js?sid=341832(font-family=Avenir+Pro+35+Light)&sid=341836(font-family=Avenir+Pro+55+Roman)&sid=341838(font-family=Avenir+Pro+65+Medium)&sid=341840(font-family=Avenir+Pro+85+Heavy)&key=y08LtgnAaN' ; var head=document.getElementsByTagName("head")[0]; head.appendChild(trial); })(); </script> <link href=" https: //stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/navbar.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/home.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/list-reset.css' ?>" type='text/css' ">
    <link rel=" stylesheet" href="<?php echo get_template_directory_uri() . '/css/fonts/fontface.css' ?>" type='text/css' ">

        <?php wp_head(); ?>
</head>

<body>
    <div class='navbar navbar-sections-hover'>
        <div class='navbar-content'>
            <?php  /* wp_nav_menu(array('theme_location' => 'primary')) */ ?>
            <!--class: menu-main-navigation-container-->
            <div class='navbar-logo'>
                <a href='http://localhost/wordpress/'><img class='desktop-logo' src='<?php echo get_template_directory_uri() . '/images/nameplate.png'; ?>'></a>
                <a href='http://localhost/wordpress/'><img class='mobile-logo' src='<?php echo get_template_directory_uri() . '/images/ponly.png'; ?>'></a>
            </div>
            <div class='navbar-sections-button'><span><i class="fas fa-bars"></i> Sections</span></div>
            <div class='navbar-item'><span><a href=''>This Week's Paper</a></span></div>
            <div class='navbar-rightnav'>
                <div class='navbar-item'><span><a href=''>About</a></span></div>
                <div class='navbar-item'><span><a href=''>Masthead</a></span></div>
                <div class='navbar-item'><span><a href=''>Archives</a></span></div>
                <div class='navbar-item navbar-search'><span><i class="fas fa-search"></i></span></div>
            </div>
        </div>
    </div>
    <div class='sections-dropdown'>
        <div class='sections-dropdown-inner'>

            <ul>
                <li><a href=''>News</a></li>
                <li><a href=''>Commentary</a></li>
                <li><a href=''>Eighth Page</a></li>
            </ul>

            <ul>
                <li><a href=''>Arts</a>
                    <ul>
                        <li>Look of the Week</li>
                    </ul>
                </li>
            </ul>

            <ul>
                <li><a href=''>Sports</a></li>
            </ul>

            <ul>
                <li><a href=''>About</a></li>
                <li><a href=''>Masthead</a></li>
                <li>This Week's Paper</li>
                <li>Archives</li>
            </ul>
        </div>
    </div>
    <div class='search-dropdown'>
        <?php get_search_form() ?>
    </div>