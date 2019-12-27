<?php get_header(); ?>

    <div class='home-top'>
        <!--<div class='home-logo'><img src='<?php /* echo get_template_directory_uri() . '/images/nameplate.png'; */ ?>'></div>-->
        <div class='home-tagline'>
            <span><a href='about' title='Truth Above All: About The Phillipian'>Veritas Super Omnia</a></span>
            <span class='dot'> • </span>
            <span><?php echo date('l, F d, Y') ?></span>
            <span class='dot'> • </span>
            <div class='home-social'>
                <div class='home-social-item'><a href='https://www.youtube.com/channel/UCQrKknXWKCGhlF1XCOewoBA'><i
                                class="fab fa-youtube"></i></a></div>
                <div class='home-social-item'><a href='https://twitter.com/phillipian'><i
                                class="fab fa-twitter"></i></a></div>
                <div class='home-social-item'><a href='https://www.instagram.com/thephillipian/'><i
                                class="fab fa-instagram"></i></a></div>
            </div>
        </div>
        <div class='home-cat'>
            <?php wp_nav_menu(array('theme_location' => 'home-cats')) ?>
        </div>
    </div>

    <div class='home-new'>
        <?php if (get_theme_mod('plip-breaking-banner', null)):?>
        <div class="breaking-banner">
            <span>Breaking News</span>
        </div>
        <?php endif; ?>
        <?php if (get_theme_mod('plip-breaking-check1', null)):
            $storyind = 1;
            include 'include-breaking-news.php';
        endif; ?>
        <?php if (get_theme_mod('plip-breaking-check2', null)):
            $storyind = 2;
            include 'include-breaking-news.php';
        endif; ?>
    </div>
    <div class="home-featured four-col">
        <?php
        if (get_theme_mod('plip-breaking-switch', 'no mod') == 1) :
            $adclass = 'home-top-ad';
            $adarea = 'plip-ad-homewide';
            include 'ad-include.php';
        else:
            echo "<div class='ad-spacer'></div>";
        endif;
        ?>
        <h1>Featured</h1>
        <?php query_posts(array(
            'category_name' => 'featured',
            'posts_per_page' => 7
        ));
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                include "article-include.php";
            endwhile;
        endif; ?>
    </div>
    <div class="home-main three-col">
        <div class="home-video">
            <h1>Live & Video</h1>
        </div>
        <div class='home-sects-inner'>
            <?php
            $catname = "News";
            include 'home-sect-include.php';
            $catname = "Commentary";
            include 'home-sect-include.php';
            $catname = "Sports";
            include 'home-sect-include.php';
            $catname = "Arts";
            include 'home-sect-include.php';
            ?>
        </div>
        <?php include "home-right-include.php" ?>
        <div class="home-video-color leftbar"></div>
        <div class="home-right-color rightbar"></div>
    </div>
    <script>
        var $grid2 = $(".home-sects-inner").masonry({
            itemSelector: '.home-sect',
            percentPosition: true,
            gutter: 36,
            columnWidth: '.home-sect'
        });
        $grid2.imagesLoaded(function () {
            $grid2.masonry();
        });
    </script>


<?php get_footer(); ?>