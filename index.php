<?php get_header(); ?>

<div class='home-top'>
    <div class='home-col1'>
        <div class='home-logo'><img src='<?php echo get_template_directory_uri() . '/images/nameplate.png'; ?>'></div>
        <div class='home-text'>
            <div class='home-tagline'><span>Vertias Super Omnia<br />
                    <?php echo date('l, F d, Y') ?></span></div>
            <div class='home-social'>
                <div class='home-social-item'><a href=''><i class="fab fa-youtube"></i></a></div>
                <div class='home-social-item'><a href=''><i class="fab fa-twitter"></i></a></div>
                <div class='home-social-item'><a href=''><i class="fab fa-instagram"></i></a></div>
            </div>
        </div>
    </div>
    <p>First printed in 1857, <i>The Phillipian</i> is Phillips Academy’s weekly student newspaper. Entirely uncensored and student run, the paper is distributed every Friday from September to June.</p>
    <div class='home-cat'>
        <?php wp_nav_menu(array('theme_location' => 'home-cats')) ?>
    </div>
</div>

<div class='articles-container'>
    <div class='home-top-ad ad'><span>1200x200 advertisement</span></div>
    <div class='home-divider'></div>
    <div class='sect-group-left'>
        <div class='sect sect-news'>
    
            <div class='sect-header'>
                <h1><a href='<?php echo get_category_link(get_cat_ID('News'))?>'>News</a></h1>
            </div>
    
            <?php query_posts(array( 'category_name' => 'news+featured', 'posts_per_page' => 1 )); ?>
            <?php
            if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php include 'article-featured.php'?>
            <?php endwhile;
    endif; ?>
            <?php wp_reset_query(); ?>
    
    
            <?php $exclude = get_cat_ID('featured'); $include = get_cat_ID('news'); query_posts(array( 'cat' => $include.",-".$exclude, 'posts_per_page' => 4 )); ?>
            <?php
            if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class='article-item <?php if (catch_that_image() == false): ?> article-noimage <? else: ?> article-news-alt2 <? endif ?>'>
                <?php include 'article-include.php' ?>
            </div>
            <?php endwhile;
    endif; ?>
            <?php wp_reset_query(); ?>
    
        </div>
        <div class='sect sect-sports'>
    
            <div class='sect-header'>
                <h1><a href='<?php echo get_category_link(get_cat_ID('Sports'))?>'>Sports</a></h1>
            </div>
    
    
            <?php $exclude = get_cat_ID('featured'); $include = get_cat_ID('Sports'); query_posts(array( 'cat' => $include.",-".$exclude, 'posts_per_page' => 5 )); ?>
            <?php
            if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class='article-item <?php if (catch_that_image() == false): ?> article-noimage <? else: ?> article-news-alt2 <? endif ?>'>
                <?php include 'article-include.php' ?>
            </div>
            <?php endwhile;
    endif; ?>
            <?php wp_reset_query(); ?>
    
        </div>
        
    </div>

    <div class='sect-group-right'>
        <div class='sect sect-commentary'>

            <div class='sect-header'>
                <h1><a href='<?php echo get_category_link(get_cat_ID('Commentary'))?>'>Commentary</a></h1>
            </div>

            <?php query_posts(array( 'category_name' => 'commentary', 'posts_per_page' => 4 )); ?>
            <?php
            if (have_posts()): while (have_posts()): the_post(); ?>
            <div class='article-item article-commentary <?php if (catch_that_image() == false): ?> article-noimage<? endif ?>'>
                <?php include 'article-include.php' ?>
            </div>
            <?php endwhile;
    endif; ?>
            <?php wp_reset_query(); ?>

        </div>

        <div class='sidebar-ad ad'><span>300x250 advertisement</span></div>

        <div class='sect sect-arts'>

            <div class='sect-header'>
                <h1><a href='<?php echo get_category_link(get_cat_ID('Arts'))?>'>Arts</a></h1>
            </div>

            <?php query_posts(array( 'category_name' => 'arts', 'posts_per_page' => 5 )); ?>
            <?php
            if (have_posts()): while (have_posts()): the_post(); ?>
            <div class='article-item article-commentary <?php if (catch_that_image() == false): ?> article-noimage<? endif ?>'>
                <?php include 'article-include.php' ?>
            </div>
            <?php endwhile;
    endif; ?>
            <?php wp_reset_query(); ?>

        </div>
    </div>

</div>


<?php get_footer() ; ?>