<?php get_header(); ?>
<?php
if (have_posts()): while (have_posts()): the_post(); ?>

<div class='single-container'>
    <h1>
        <?php the_title(); ?>
    </h1>
    <div class='article-about'>
        <div class='article-about-top'></div>
        <span class='article-author'>
            <?php the_author(); ?><br /></span>
        <span class='article-date'>
            <?php the_date(); ?></span>
        </span>
    </div>
    <!--<div class='advertisement ad-skyscraper'><span>Skyscraper ad</span></div>
    <div class='advertisement ad-banner'><span>Banner ad</span></div>-->
    <?php the_content(); ?>
</div>



<?php endwhile;
endif; ?>

<?php get_footer(); ?> 