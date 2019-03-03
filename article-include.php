<div class=' article-text'>
    <h2><a href='<?php the_permalink(); ?>'>
            <?php the_title(); ?></a></h2>
    <div class='article-author'><span>By
            <?php the_author(); ?></span></div>
    <div class='article-date'><span>
            <?php the_time(get_option('date_format')); ?></span></div>
    <?php the_excerpt(); ?>
</div>
<?php if (catch_that_image() == false): else :?>
<div class='article-image'><img src='<?php echo catch_that_image() ?>'></div>
<?php endif ?>