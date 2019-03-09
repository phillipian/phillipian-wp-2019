<?php get_header(); ?>

<div class='home-top'>
    <div class='home-logo'><img src='<?php echo get_template_directory_uri() . '/images/nameplate.png'; ?>'></div>
    <div class='home-tagline'>
        <span><a href='about' title='Truth Above All: About The Phillipian'>Vertias Super Omnia</a></span>
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
            $strip_link = get_theme_mod('plip-yt-link','');
            $strip_img_url = wp_get_attachment_url(get_theme_mod('plip-yt-thumb',null));
            $strip_main = get_theme_mod('plip-yt-title',"No Video Featured");
            $strip_tag = 'Video';
            include 'home-strip-include.php';

            $strip_link = '';
            $strip_img_url = get_template_directory_uri() . '/images/a8.png';
            $strip_main = 'How to Get a Date';
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
    <div class='home-top-ad ad'>
        <img src='<?php echo wp_get_attachment_url(get_theme_mod('plip-ad-homewide', null)); ?>'>
    </div>
    <div class='home-divider'></div>
    <div class='sect-group-left'>
        <div class='sect sect-news'>
            <div class='sect-header'>
                <h1><a href='<?php echo get_category_link(get_cat_ID('News')) ?>'>News</a></h1>
            </div>

            <?php query_posts(array('category_name' => 'news+featured', 'posts_per_page' => 1)); ?>
            <?php
            if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php include 'article-featured.php' ?>
            <?php endwhile;
    endif; ?>
            <?php wp_reset_query(); ?>


            <?php $exclude = get_cat_ID('featured');
            $include = get_cat_ID('news');
            query_posts(array('cat' => $include . ",-" . $exclude, 'posts_per_page' => 4)); ?>
            <?php
            if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class='article-item <?php if (catch_that_image() == false) : ?> article-noimage <? else : ?> article-news-alt2 <? endif ?>'>
                <?php include 'article-include.php' ?>
            </div>
            <?php endwhile;
    endif; ?>
            <?php wp_reset_query(); ?>

        </div>
        <div class='sect sect-sports'>
            <div class='sect-header'>
                <h1><a href='<?php echo get_category_link(get_cat_ID('Sports')) ?>'>Sports</a></h1>
            </div>


            <?php $exclude = get_cat_ID('featured');
            $include = get_cat_ID('Sports');
            query_posts(array('cat' => $include . ",-" . $exclude, 'posts_per_page' => 5)); ?>
            <?php
            if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class='article-item <?php if (catch_that_image() == false) : ?> article-noimage <? else : ?> article-news-alt2 <? endif ?>'>
                <?php include 'article-include.php' ?>
            </div>
            <?php endwhile;
    endif; ?>
            <?php wp_reset_query(); ?>

        </div>

    </div>

    <div class='sect-group-right'>
        <div class='sect sect-editorial'>

            <div class='sect-header'>
                <h1><a href='<?php echo get_category_link(get_cat_ID('Editorial')) ?>'>Editorial</a></h1>
            </div>

            <?php query_posts(array('category_name' => 'editorial', 'posts_per_page' => 1)); ?>
            <?php
            if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class='article-item article-commentary <?php if (catch_that_image() == false) : ?> article-noimage<? endif ?>'>
                <?php include 'article-include.php' ?>
            </div>
            <?php endwhile;
    endif; ?>
            <?php wp_reset_query(); ?>

        </div>
        <div class='sect sect-commentary'>

            <div class='sect-header'>
                <h1><a href='<?php echo get_category_link(get_cat_ID('Commentary')) ?>'>Commentary</a></h1>
            </div>

            <?php query_posts(array('category_name' => 'commentary', 'posts_per_page' => 4)); ?>
            <?php
            if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class='article-item article-commentary <?php if (catch_that_image() == false) : ?> article-noimage<? endif ?>'>
                <?php include 'article-include.php' ?>
            </div>
            <?php endwhile;
    endif; ?>
            <?php wp_reset_query(); ?>

        </div>

        <div class='sidebar-ad ad'>
            <img src='<?php echo wp_get_attachment_url(get_theme_mod('plip-ad-homesmall', null)); ?>'>
        </div>

        <div class='sect sect-arts'>

            <div class='sect-header'>
                <h1><a href='<?php echo get_category_link(get_cat_ID('Arts')) ?>'>Arts</a></h1>
            </div>

            <?php query_posts(array('category_name' => 'arts', 'posts_per_page' => 5)); ?>
            <?php
            if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class='article-item article-commentary <?php if (catch_that_image() == false) : ?> article-noimage<? endif ?>'>
                <?php include 'article-include.php' ?>
            </div>
            <?php endwhile;
    endif; ?>
            <?php wp_reset_query(); ?>

        </div>
    </div>

</div>


<?php get_footer(); ?> 