<?php get_header(); ?>

<!-- do this stuff -->

<div class='category-container'>
    <h1>
        <?php echo single_cat_title() ?>
    </h1>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class='article-item article-commentary <?php if (catch_that_image() == false) : ?>article-noimage<? endif ?>'>
        <?php include 'article-include.php' ?>
    </div>
    <?php endwhile;
endif; ?>
</div>


<?php get_footer(); ?> 