<div class='article-category'>
    <?php catsNoFeatured($catname, $post_id);
    if (has_tag('', $post_id)) {
        foreach (get_the_tags($post_id) as $t) { ?>
            <a class="article-tag" href="<?php echo get_tag_link($t); ?>">#<?php echo $t->name; ?></a>
        <?php }
    }?>
</div>

<h2><a href="<?php echo get_the_permalink($post_id); ?>"><?php echo get_the_title($post_id); ?></a></h2>