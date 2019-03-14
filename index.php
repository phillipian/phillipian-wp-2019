<?php get_header(); ?>

<div class='home-top'>
    <div class='home-logo'><img src='<?php echo get_template_directory_uri() . '/images/nameplate.png'; ?>'></div>
    <div class='home-tagline'>
        <span><a href='about' title='Truth Above All: About The Phillipian'>Veritas Super Omnia</a></span>
        <span class='dot'> • </span>
        <span><?php echo date('l, F d, Y') ?></span>
        <span class='dot'> • </span>
        <div class='home-social'>
            <div class='home-social-item'><a href='https://www.youtube.com/channel/UCQrKknXWKCGhlF1XCOewoBA'><i class="fab fa-youtube"></i></a></div>
            <div class='home-social-item'><a href='https://twitter.com/phillipian'><i class="fab fa-twitter"></i></a></div>
            <div class='home-social-item'><a href='https://www.instagram.com/thephillipian/'><i class="fab fa-instagram"></i></a></div>
        </div>
    </div>
    <!--<p>First printed in 1857, <i>The Phillipian</i> is Phillips Academy’s weekly student newspaper. Entirely uncensored and student run, the paper is distributed every Friday from September to June.</p>-->
    <div class='home-cat'>
        <?php wp_nav_menu(array('theme_location' => 'home-cats')) ?>
    </div>
    <div class='home-strip-outer'>
        <div class='home-strip'>
            <?php
            $strip_link = get_theme_mod('plip-yt-link', '');
            $strip_img_url = wp_get_attachment_url(get_theme_mod('plip-yt-thumb', null));
            $strip_main = get_theme_mod('plip-yt-title', "No Video Featured");
            $strip_tag = 'Video';
            include 'home-strip-include.php';

            $strip_link = '';
            $strip_img_url = get_template_directory_uri() . '/images/a8.png';
            $strip_main = get_theme_mod('plip-a8-title', "No Eighth Page Article Featured");
            $strip_tag = 'Satire';
            include 'home-strip-include.php';
            ?>
            <div class='strip-item strip-complex'>
                <?php
                $strip_link = '';
                $strip_img_url = get_template_directory_uri() . '/images/maillist.png';
                $strip_main = 'Sign up for our weekly newsletter';
                $strip_tag = '';
                $small = true;
                $complex = true;
                include 'home-strip-include.php';
                $strip_link = '';
                $strip_img_url = get_template_directory_uri() . '/images/write.png';
                $strip_main = 'Write for <i>The Phillipian</i>';
                $strip_tag = '';
                include 'home-strip-include.php';
                ?>
            </div>
            <?php
            $strip_link = 'subscribe';
            $strip_img_url = get_template_directory_uri() . '/images/subscribe.png';
            $strip_main = 'Support student journalism and get the latest Andover news delivered to your mailbox';
            $small = true;
            $strip_tag = '';
            $complex = false;
            include 'home-strip-include.php';
            ?>

        </div>
    </div>
</div>

<div class='articles-container'>
    <?php
    $adclass = 'home-top-ad';
    $adarea = 'plip-ad-homewide';
    include 'ad-include.php';
    ?>
    <div class='home-divider'></div>
    <div class='sect-group-left'>

        <?php
        $catname = 'News';
        $sectleft = true;
        include 'home-sect-include.php';
        $catname = 'Sports';
        include 'home-sect-include.php';
        ?>

    </div>
    <script>
        var $grid2 = $(".sect-news").masonry({
            itemSelector: '.article-item',
            percentPosition: true,
            gutter: 32,
            columnWidth: '.article-news-alt2'
        });
        $grid2.imagesLoaded(function() {
            $grid2.masonry();
        });
        var $grid1 = $(".sect-sports").masonry({
            itemSelector: '.article-item',
            percentPosition: true,
            gutter: 32,
            horizontalOrder: true,
            columnWidth: '.article-item'
        });
        $grid1.imagesLoaded(function() {
            $grid1.masonry();
        });
    </script>

    <div class='sect-group-right'>

        <?php
        $catname = 'Editorial';
        $sectleft = false;
        include 'home-sect-include.php';
        $catname = 'Commentary';
        include 'home-sect-include.php';

        $adarea = 'plip-ad-homesmall';
        $adclass = 'sidebar-ad';
        include 'ad-include.php';

        $catname = 'Arts';
        include 'home-sect-include.php';
        ?>
    </div>

</div>


<?php get_footer(); ?> 