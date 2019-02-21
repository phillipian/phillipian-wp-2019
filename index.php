<?php get_header(); ?>


<?php 














?>


<div class='articles-container'>
    <div class='home-divider'></div>

    <div class='sect sect-news'>

        <?php
        if (have_posts()): while (have_posts()): the_post(); ?>
        <div class='article-item article-news-feature'>
            <h2><a href='<?php the_permalink(); ?>'>
                    <?php the_title(); ?>
                </a></h2>
            <div class=' article-text'>
                <div class='article-author'><span>By
                        <?php the_author(); ?></span></div>
                <p class='article-blurb'>
                    <?php the_excerpt(); ?>
                </p>
            </div>
            <div class='article-image'><img src='<?php echo catch_that_image() ?>'></div>
        </div>
        <?php endwhile;
endif; ?>

        <div class='article-item article-news-alt1'>
            <h2>After 29 Issues, CXLI Bids Farewell To The Newsroom</h2>
            <div class='article-text'>
                <div class='article-author'><span>By Sophia Lee and Zaina Qamar</span></div>
                <p class='article-blurb'>This is the first issue of The Phillipian vol. CXLII, with the former board of Editors, Managers, and Upper Management having officially left the newsroom.</p>
            </div>
            <div class='article-image'><img src='https://i2.wp.com/phillipian.net/wp-content/uploads/2019/02/hsolomon.BYECXLI-1.jpg?resize=1024%2C683'></div>
        </div>

        <div class='article-item article-news-alt2'>
            <h2>After 29 Issues, CXLI Bids Farewell To The Newsroom</h2>
            <div class='article-text'>
                <div class='article-author'><span>By Sophia Lee and Zaina Qamar</span></div>
                <p class='article-blurb'>This is the first issue of The Phillipian vol. CXLII, with the former board of Editors, Managers, and Upper Management having officially left the newsroom.</p>
            </div>
            <div class='article-image'><img src='https://apod.nasa.gov/apod/image/1801/moonsetLasCampanas_beletsky.jpg'></div>
        </div>

    </div>
    <div class='sect sect-commentary'>

        <div class='sect-header'>
            <h1>Commentary</h1>
        </div>

        <div class='article-item'>
            <h2>After 29 Issues, CXLI Bids Farewell To The Newsroom</h2>
            <div class='article-author'><span>By Sophia Lee and Zaina Qamar</span></div>
            <p class='article-blurb'>This is the first issue of The Phillipian vol. CXLII, with the former board of Editors, Managers, and Upper Management
                having officially left the newsroom.</p>
            <div class='article-image'><img src='https://i2.wp.com/phillipian.net/wp-content/uploads/2019/02/hsolomon.BYECXLI-1.jpg?resize=1024%2C683'></div>
        </div>

    </div>
</div>


<?php get_footer(); ?> 