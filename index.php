<?php get_header(); ?>

<div class='home-top'>
    <div class='home-col1'>
        <div class='home-logo'><img src='<?php echo get_template_directory_uri() . '/images/nameplate.png'; ?>'></div>
        <div class='home-tagline'><span>Vertias Super Omnia<br />
                <?php echo date('l, F d, Y') ?></span></div>
    </div>
    <p>First printed in 1857, <i>The Phillipian</i> is Phillips Academy’s weekly student newspaper. Entirely uncensored and student run, the paper is distributed every Friday from September to June.</p>
    <div class='home-cat'>
        <?php  wp_nav_menu(array('theme_location' => 'home-cats')) ?>
        <!--
        <div class='home-cat-item'><span><a href=''>News</a></span></div>
        <div class='home-cat-item'><span><a href=''>Commentary</a></span></div>
        <div class='home-cat-item'><span><a href=''>Arts & Leisure</a></span></div>
        <div class='home-cat-item'><span><a href=''>Sports</a></span></div>
        <div class='home-cat-item'><span><a href=''>News</a></span></div>
        <div class='home-cat-item'><span><a href=''>Commentary</a></span></div>
        <div class='home-cat-item'><span><a href=''>Arts & Leisure</a></span></div>
        <div class='home-cat-item'><span><a href=''>Sports</a></span></div>
        -->
    </div>
</div>

<div class='articles-container'>
    <div class='home-divider'></div>

    <div class='sect sect-news'>

        <div class='sect-header'>
            <h1>News</h1>
        </div>


        <?php query_posts('category_name=News'); ?>
        <?php
        if (have_posts()): while (have_posts()): the_post(); ?>
        <div class='article-item article-news-feature'>
            <h2><a href='<?php the_permalink(); ?>'>
                    <?php the_title(); ?>
                </a></h2>
            <div class=' article-text'>
                <div class='article-author'><span>By
                        <?php the_author(); ?></span></div>
                <?php the_excerpt(); ?>
            </div>
            <div class='article-image'><img src='<?php echo catch_that_image() ?>'></div>
        </div>
        <?php endwhile;
endif; ?>
        <?php wp_reset_query(); ?>

        <div class='article-item article-news-alt2'>
            <h2>After 29 Issues, CXLI Bids Farewell To The Newsroom</h2>
            <div class='article-text'>
                <div class='article-author'><span>By Sophia Lee and Zaina Qamar</span></div>
                <p class='article-blurb'>This is the first issue of The Phillipian vol. CXLII, with the former board of Editors, Managers, and Upper Management having officially left the newsroom.</p>
            </div>
            <div class='article-image'><img src='https://i1.wp.com/phillipian.net/wp-content/uploads/2019/02/IMG_0755.jpg?resize=1024%2C963'></div>
        </div>

        <div class='article-item article-news-alt1'>
            <h2>After 29 Issues, CXLI Bids Farewell To The Newsroom</h2>
            <div class='article-text'>
                <div class='article-author'><span>By Sophia Lee and Zaina Qamar</span></div>
                <p class='article-blurb'>This is the first issue of The Phillipian vol. CXLII, with the former board of Editors, Managers, and Upper Management having officially left the newsroom.</p>
            </div>
            <div class='article-image'><img src='https://i2.wp.com/phillipian.net/wp-content/uploads/2019/02/hsolomon.BYECXLI-1.jpg?resize=1024%2C683'></div>
        </div>

    </div>
    <div class='sect sect-commentary'>

        <div class='sect-header'>
            <h1>Commentary</h1>
        </div>

        <?php query_posts('category_name=Commentary'); ?>
        <?php
        if (have_posts()): while (have_posts()): the_post(); ?>
        <div class='article-item article-commentary'>
            <div class=' article-text'>
                <h2><a href='<?php the_permalink(); ?>'>
                        <?php the_title(); ?>
                    </a></h2>
                <div class='article-author'><span>By
                        <?php the_author(); ?></span></div>
                <?php the_excerpt(); ?>
                </p>
            </div>
            <div class='article-image'><img src='<?php echo catch_that_image() ?>'></div>
        </div>
        <?php endwhile;
endif; ?>
        <?php wp_reset_query(); ?>

    </div>
</div>


<?php get_footer(); ?> 