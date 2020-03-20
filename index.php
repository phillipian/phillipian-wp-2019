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
    <div class="top-container">
        <div class="top-grid">
            <div class="first-post column-divider">
                <?php
                        query_posts(array(
                            'category_name' => 'top-posts',
                            'posts_per_page' => 1
                        ));
                        if (have_posts()) :
                            while (have_posts()) :
                                the_post();
                        include "includes/include-top-article-item.php";
                        endwhile;
                        endif;
                ?>
            </div>
            <div class="top-stories">
                    <h1>This month's top stories</h1> 
                    <?php
                        $sect = true;
                        wp_reset_query();
                        query_posts(array(
                            'category_name' => 'featured',
                            'posts_per_page' => get_theme_mod('plip-home-num', 3)
                        ));
                        if (have_posts()) :
                            while (have_posts()) :
                                the_post();
                                include "includes/include-article-item.php";
                            endwhile;
                                endif;
                        $catlink = get_category_link(get_cat_ID($catname));
                     ?>
                    <a class='sect-more' href='<?php
                    echo $catlink ?>'>All Featured Articles ></a>
            </div>
            <hr>
            <?php
                $numposts = 1;

                $catname = "News";
                include 'includes/include-home-sect.php';
                $catname = "Sports";
                include 'includes/include-home-sect.php';
            ?>
            <div class='ad-sect'>
            <?php
                $adclass = 'home-side-ad';
                $adarea = 'plip-ad-homesmall';
                include 'includes/include-ad.php';

                $adarea = 'plip-ad-homesmall-2';
                include 'includes/include-ad.php';
            ?>
            </div>
            <?php
                $catname = "Arts";
                include 'includes/include-home-sect.php';
                $catname = "Commentary";
                include 'includes/include-home-sect.php';
            ?>
            </div>
        </div>
        <?php
        // TODO: Ad support with new layout?
        if (get_theme_mod('plip-breaking-switch', 'no mod') == 1) :
            $adclass = 'home-top-ad';
            $adarea = 'plip-ad-homewide';
            include 'includes/include-ad.php';
        else :
            echo "<div class='ad-spacer'></div>";
        endif;
        ?>
    </div>
    <div class="bottom-container">
        <?php
            include 'includes/include-banner.php';
        ?>
        <div class="home-video">
            <?php
            $catname = "Multimedia";
            $numposts = 4;
            include 'includes/include-home-sect.php';
            ?>
        </div>
    </div>
</script>

<?php get_footer(); ?>
