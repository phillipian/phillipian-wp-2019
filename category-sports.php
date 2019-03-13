<?php get_header(); ?>
<div class='sports-container'>
    <h2>Game Coverage</h2>
    <div class='sports-coverage'>
        <div class='sports-coverage-inner'>
            <?php
            $args = array("category_name" => "game-coverage");
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post(); ?>
            <div class='sports-coverage-item'>
                <?php include "category-sports-sportcat-include.php" ?>
                <h3><a href='<?php the_permalink(); ?>'>
                        <?php the_title(); ?></a></h3>
                <?php include 'article-author-include.php' ?>
                <div class='article-date'><span>
                        <?php the_time(get_option('date_format')); ?></span></div>
                <?php if (catch_that_image() == false) : else  :?>
                <div class='article-image'><a href='<?php the_permalink(); ?>'><img src='<?php echo catch_that_image() ?>'></a></div>
                <?php endif;
            $excerpt = get_the_content();
            $scoreboxtrue = preg_match("/\[scorebox\](.*)\[\/scorebox\]/", $excerpt, $matches);
            if ($scoreboxtrue) 
                    {echo do_shortcode($matches[0])
                ;}
            ?>
            </div>
            <?php 
        }
    } ?>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
    var $grid = $(".sports-coverage-inner").masonry({
        itemSelector: '.sports-coverage-item',
        percentPosition: true,
        columnWidth: '.sports-coverage-item'
    });
    $grid.imagesLoaded(function() {
        console.log("loaded");
        $grid.masonry();
    });
</script >