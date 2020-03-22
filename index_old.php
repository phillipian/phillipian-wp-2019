<?php get_header(); ?>

<div class='home-top'>
    <!--<div class='home-logo'><img src='<?php /* echo get_template_directory_uri() . '/images/nameplate.png'; */ ?>'></div>-->
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
    <div class='home-cat'>
        <?php wp_nav_menu(array('theme_location' => 'home-cats')) ?>
    </div>
</div>
<div class='home-new'>
    <?php if (get_theme_mod('plip-breaking-banner', null)) : ?>
        <div class="breaking-banner">
            <span>Breaking News</span>
        </div>
    <?php endif; ?>
    <?php if (get_theme_mod('plip-breaking-check1', null)) :
        $storyind = 1;
        include 'includes/breaking-news/include-breaking-news.php';
    endif; ?>
    <?php if (get_theme_mod('plip-breaking-check2', null)) :
        $storyind = 2;
        include 'includes/breaking-news/include-breaking-news.php';
    endif; ?>
</div>

<div class="home-featured four-col">
    <h1 style="grid-row: 1;">Featured</h1>
    <div class="featured-posts">
        <?php query_posts(array(
            'category_name' => 'featured',
            'posts_per_page' => get_theme_mod('plip-home-num', 8)
        ));
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                include "includes/include-article-item.php";
            endwhile;
        endif; ?>
    </div>
    <?php
    if (get_theme_mod('plip-breaking-switch', 'no mod') == 1) :
        $adclass = 'home-top-ad';
        $adarea = 'plip-ad-homewide';
        include 'includes/include-ad.php';
    else :
        echo "<div class='ad-spacer'></div>";
    endif;
    ?>
</div>
<div class="home-main three-col">
    <div class="home-video">
        <?php
        $catname = "Multimedia";
        include 'includes/include-home-sect.php';
        ?>
    </div>
    <div class='home-sects-inner'>
        <?php
        $catname = "News";
        include 'includes/include-home-sect.php';
        $catname = "Commentary";
        include 'includes/include-home-sect.php';
        $catname = "Sports";
        include 'includes/include-home-sect.php';
        $catname = "Arts";
        include 'includes/include-home-sect.php';
        ?>
    </div>
    <?php include "includes/include-home-right.php" ?>
    <div class="home-video-color leftbar"></div>
    <div class="home-right-color rightbar"></div>
</div>
<script>
    var $grid1 = $(".featured-posts").masonry({
        itemSelector: '.article-news-side',
        gutter: 24,
        columnWidth: '.article-news-side'
    });
    $grid1.imagesLoaded(function() {
        $grid1.masonry();
    });
    var $grid2 = $(".home-sects-inner").masonry({
        itemSelector: '.home-sect',
        percentPosition: true,
        gutter: 36,
        columnWidth: '.home-sect'
    });
    $grid2.imagesLoaded(function() {
        $grid2.masonry();
    });
    var $grid3 = $(".home-video-container").masonry({
        itemSelector: '.article-item',
        percentPosition: true,
        gutter: 24,
        columnWidth: '.article-item'
    });
    $grid3.imagesLoaded(function() {
        $grid3.masonry();
    });
</script>


<?php get_footer(); ?>