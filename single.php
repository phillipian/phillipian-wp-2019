<?php get_header(); ?>
<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class='single-container'>
    <div class='article-category'>
        <div class='post-categories'>
            <? foreach (get_the_category() as $c) {
                if ($c->name != 'Featured Posts') { ?>
            <a href='<?php echo get_category_link($c->cat_ID) ?>'>
                <?php echo $c->name; ?></a>
            <?php

        }
    }
    ?>
        </div>
    </div>
    <h1>
        <?php the_title(); ?>
    </h1>
    <div class='single-left'>
        <div class='article-about'>
            <div class='article-about-top'></div>
            <span class='article-author'>
                <?php 
                $def_author = get_the_author();
                $cust_author = get_post_meta(get_the_ID(), 'cpa_author', true);
                if ($def_author == 'admin') {
                    echo $cust_author;
                } else {
                    echo $def_author;
                }
                ?>
                <br /></span>
            <span class='article-date'>
                <?php the_date(); ?></span>
            </span>
        </div>
        <div class='ad single-ad'><span>300x250 advertisement</span></div>
        <?php include 'related-include.php' ?>
        <div class='ad single-ad'><span>300x250 advertisement</span></div>
    </div>
    <div class='single-right'>
        <?php the_content(); ?>
        <?php include 'related-include.php' ?>
    </div>
</div>



<?php endwhile;
endif; ?>

<?php get_footer(); ?> 