<?php get_header(); ?>

<!-- do this stuff -->

<div class='category-container'>
    <h1><?php echo single_cat_title()?></h1>
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <div class='article-item'>
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
</div>


<?php get_footer(); ?> 