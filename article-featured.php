<div class="article-item article-news-main">
    <div class=" article-text">
        <div class='article-category'><a href=''><span><?php catsNoFeatured() ?></span></a></div>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p><?php the_excerpt(); ?></p>
        <?php the_scorebox(); ?>
        <div class='article-bottom'>
            <?php include 'article-author-include.php' ?>
            <div class="article-date"><span><?php the_time(get_option('date_format')); ?></span></div>
        </div>
    </div>
    <?php if (catch_that_image() == false) : else: ?>
        <div class='article-image'><a href='<?php the_permalink(); ?>'><img src='<?php echo catch_that_image() ?>'></a></div>
    <?php endif ?>
</div>