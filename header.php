<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, target-densityDpi=device-dpi' name='viewport' />
    <title>Phillipian Prototype</title>
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
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
    <?php wp_head(); ?>
</head>

<body>
    <div class='navbar'>
        <div class='navbar-content'>
            <div class='navbar-logo'>
                <a href='http://localhost/wordpress/'><img src='<?php echo wp_get_attachment_url(get_theme_mod(' plip-navbar-image')) ?>'></a>
            </div>
            <?php wp_nav_menu(array('theme_location' => 'primary')) ?>
            <!--class: menu-main-navigation-container-->
        </div>
    </div> 