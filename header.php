<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, target-densityDpi=device-dpi' name='viewport' />
    <title>Phillipian Prototype</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <script type="text/javascript">
        (function() {
            var trial = document.createElement('script');
            trial.type = 'text/javascript';
            trial.async = true;
            trial.src = 'https://easy.myfonts.net/v2/js?sid=341832(font-family=Avenir+Pro+35+Light)&sid=341836(font-family=Avenir+Pro+55+Roman)&sid=341838(font-family=Avenir+Pro+65+Medium)&sid=341840(font-family=Avenir+Pro+85+Heavy)&key=YOOzoYVN77';
            var head = document.getElementsByTagName("head")[0];
            head.appendChild(trial);
        })();
    </script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
</head>

<body>
    <div class='navbar navbar-sections-hover'>
        <div class='navbar-content'>
            <div class='navbar-logo'>
                <a href='http://localhost/wordpress/'><img class='desktop-logo' src='<?php echo wp_get_attachment_url(get_theme_mod('plip-navbar-image')) ?>'></a>
                <a href='http://localhost/wordpress/'><img class='mobile-logo' src='<?php echo wp_get_attachment_url(get_theme_mod('plip-navbar-image-mobile')) ?>'></a>
            </div>
            <?php /* wp_nav_menu(array('theme_location' => 'primary')) */ ?>
            <!--class: menu-main-navigation-container-->

            <div class='navbar-menu'>
                <div class='navbar-item navbar-sections-hover'><span>Sections <i class="fas fa-caret-down"></i></span></div>
            </div>
        </div>
    </div> 
    <div class='sections-dropdown navbar-sections-hover'>
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

            <ul style='grid-column: 5; text-align: right;'>
                <li><a href=''>About</a></li>
                <li><a href=''>Masthead</a></li><li>This Week's Paper</li>
                <li>Archives</li>
            </ul>
        </div>
    </div>