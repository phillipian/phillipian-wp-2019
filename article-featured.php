<div class='article-item article-news-feature'>
    <h2><a href=' <?php the_permalink(); ?>'>
            <?php the_title(); ?>
        </a></h2>
    <div class=' article-text'>
        <div class='article-author'><span>By
            <?php 
            $def_author = get_the_author();
            $cust_author = get_post_meta(get_the_ID(), 'cpa_author', true);
            if ($def_author == 'admin'){
                echo $cust_author;
            } else{
                echo $def_author;
            }
            ?>
        </span></div>
        <div class='article-date'><span><?php the_time( get_option( 'date_format' ) );?></span></div>
        <?php the_excerpt(); ?>
    </div>
    <?php if (catch_that_image() == false ): else:?>
    <div class='article-image'><a href='<?php the_permalink(); ?>'><img src='<?php echo catch_that_image() ?>'></a><a href='<?php the_permalink(); ?>'></div>
    <?php endif ?>
</div>