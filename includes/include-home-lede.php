<?php

$style = get_theme_mod('plip-home-style', 'vertical');

if ($style == 'vertical' || $style == 'horizontal'){
    $post = get_posts(array(
       'numberposts' => 1,
        'category_name' => 'lede'
    ));
    $post_id = $post[0]->ID;
    $is_multimedia = in_category("multimedia", $post_id);
    ?>

    <div class="home-lede article-item lede-<?php echo $style?> article-noimage">
        <?php
        if (!($is_multimedia)):
            if (!(catch_that_image($post_id) == false)) : ?>
                <div class='article-image'><a href='<?php echo get_the_permalink($post_id); ?>'><img src='<?php echo catch_that_image($post_id) ?>'></a>
                </div>
            <?php endif; ?>
            <?php the_scorebox();
        endif; ?>
        <div class="article-text">
            <div class='article-category'>
                <?php catsNoFeatured($catname, $post_id);
                foreach (get_the_tags($post_id) as $t) { ?>
                    <a class="article-tag" href="<?php echo get_tag_link($t); ?>">#<?php echo $t->name; ?></a>
                <?php }?>
            </div>
            <h2><a href="<?php echo get_the_permalink($post_id); ?>"><?php echo get_the_title($post_id); ?></a></h2>
        </div>
    </div>

    <?php
}