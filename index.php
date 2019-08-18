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
                $strip_link = home_url() . '/newsletter-subscribe';
                $strip_img_url = get_template_directory_uri() . '/images/maillist.png';
                $strip_main = 'Sign up for our weekly newsletter';
                $strip_tag = '';
                $small = true;
                $complex = true;
                include 'home-strip-include.php';
                $strip_link = home_url() . '/join';
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
    <div class='home-cat'>
        <?php wp_nav_menu(array('theme_location' => 'home-cats')) ?>
    </div>
    <!--<p>First printed in 1857, <i>The Phillipian</i> is Phillips Academy’s weekly student newspaper. Entirely uncensored and student run, the paper is distributed every Friday from September to June.</p>-->
</div>

<div class='home-featured'>
    <div class='home-featured-inner'>
        <?php query_posts(array(
            'category_name' => 'featured',
            'posts_per_page' => get_theme_mod('plip-home-num', null)
        ));
        if (have_posts()) :
            $i = 0;
            while (have_posts()) :
                the_post();
                if ($i == 0) {
                    include "article-featured.php";
                    $i++;
                } else {
                    include "article-include.php";
                }
            endwhile;
        endif; ?>
    </div>
</div>
<?php $adclass = 'home-top-ad';
$adarea = 'plip-ad-homewide';
include 'ad-include.php'; ?>
<div class='home-sects'>
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
        $catname = "Multilingual";
        include 'home-sect-include.php';
        ?>
    </div>
    <div class='home-sects-right'>
        <?php $adclass = 'home-side-ad';
        $adarea = 'plip-ad-homesmall';
        include 'ad-include.php'; ?>
    </div>
</div>
<script>
    var $grid = $(".home-featured-inner").masonry({
        itemSelector: '.article-item',
        percentPosition: true,
        gutter: 24,
        columnWidth: '.article-news-side'
    });
    $grid.imagesLoaded(function() {
        $grid.masonry();
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
</script>
</div>


<?php get_footer(); ?>