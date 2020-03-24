<?php
if (!isset($currpost)){
    $post_id = get_the_ID();
}
else{
    $post_id = $currpost;
}
$is_multimedia = in_category("multimedia", $post_id);
?>

<div class="article-item <?php
if ($sect or $archive) { ?>article-sect <?php } else { ?>article-news-side <?php }
if ($is_multimedia) {
    echo "article-noimage article-multimedia";
} else {
    if (catch_that_image($post_id) == false) {
        echo "article-noimage";
    }
} ?>">
    <div class=" article-text">
        <div class='article-category'>
            <?php
            if (isset($views)){
                echo "<div class='viewcount'><span> <i class=\"fas fa-eye\"></i> " . $views . " views</span></div>";
            }
            if ($catname == "Sports") {
                catsSports($post_id);
            } elseif ($multilingual) {
                catMulti($post_id);
            } else {
                catsNoFeatured($catname, $post_id);
            }
            if (!($breaking) && !(is_tag())) {
                if (has_tag('', $post_id)) {
                    foreach (get_the_tags($post_id) as $t) { ?>
                        <a class="article-tag" href="<?php echo get_tag_link($t); ?>">#<?php echo $t->name; ?></a>
                    <?php }
                }
            }
            ?>
        </div>
        <h2><a href="<?php echo get_the_permalink($post_id); ?>"><?php echo get_the_title($post_id); ?></a></h2>
        <?php

        if ($is_multimedia) {
            $postcontent = get_post_field('post_content', $post_id);;
            preg_match("/\[ytembed(.*)\[\/ytembed\]/", $postcontent, $youtubematches);
            echo do_shortcode($youtubematches[0]);
        }

        ?>
        <?php include 'include-article-author.php' ?>
        <div class="article-date">
            <span>
                <?php echo get_the_time("M j, Y", $post_id);
                ?>
            </span>
        </div>
    </div>
    <?php
    if (!($is_multimedia)):
        if (!(catch_that_image($post_id) == false)) : ?>
            <div class='article-image'><a href='<?php echo get_the_permalink($post_id); ?>'><img src='<?php echo catch_that_image($post_id) ?>'></a>
            </div>
        <?php endif; ?>
        <?php the_scorebox();
    endif; ?>
</div>