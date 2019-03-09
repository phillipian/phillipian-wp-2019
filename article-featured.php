<div class='article-item article-news-feature'>
    <h2><a href=' <?php the_permalink(); ?>'>
            <?php the_title(); ?>
        </a></h2>
    <div class=' article-text'>
        <?php include 'article-author-include.php'?>
        <div class='article-date'><span><?php the_time( get_option( 'date_format' ) );?></span></div>
        <?php the_excerpt(); ?>
    </div>
    <?php if (catch_that_image() == false ): else: ?>
    <div class='article-image'><a href='<?php the_permalink(); ?>'><img src='<?php echo catch_that_image() ?>'></a></div>
    <?php endif ?>
</div>