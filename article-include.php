<div class="article-item <?php if ($archive){?>article-archive <?php }else{?>article-news-side <?php } if (catch_that_image() == false) : ?>article-noimage<?php endif ?>">
        <div class=" article-text">
                <div class='article-category'><a href=''><span><?php catsNoFeatured() ?></span></a></div>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php include 'article-author-include.php' ?>
                <div class="article-date"><span><?php the_time("M j"); ?></span></div>
        </div>
        <?php if (catch_that_image() == false) : else: ?>
                <div class='article-image'><a href='<?php the_permalink(); ?>'><img src='<?php echo catch_that_image() ?>'></a></div>
        <?php endif ?>
        <?php the_scorebox(); ?>
</div>