<?php $is_multimedia = has_category("multimedia"); ?>

<div class="article-item <?php
if ($sect or $archive) { ?>article-sect <?php } else { ?>article-news-side <?php }
if ($is_multimedia) {
    echo "article-noimage article-multimedia";
} else {
    if (catch_that_image() == false) {
        echo "article-noimage";
    }
} ?>">
    <div class=" article-text">
        <div class='article-category'>
            <?php if ($catname == "Sports") {
                catsSports();
            } elseif ($multilingual) {
                catMulti();
            } else {
                catsNoFeatured($catname);
            }
            if (!($breaking) && !(is_tag())) {
                foreach (get_the_tags() as $t) { ?>
                    <a class="article-tag" href="<?php echo get_tag_link($t); ?>">#<?php echo $t->name; ?></a>
                <?php }
            }
            ?>
        </div>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php

        if ($is_multimedia) {
            $postcontent = get_the_content();
            preg_match("/\[ytembed(.*)\[\/ytembed\]/", $postcontent, $youtubematches);
            echo do_shortcode($youtubematches[0]);
        }

        ?>
        <?php include 'include-article-author.php' ?>
        <div class="article-date"><span><?php the_time("M j, Y"); ?></span></div>
    </div>
    <?php
    if (!($is_multimedia)):
        if (!(catch_that_image() == false)) : ?>
            <div class='article-image'><a href='<?php the_permalink(); ?>'><img src='<?php echo catch_that_image() ?>'></a>
            </div>
        <?php endif; ?>
        <?php the_scorebox();
    endif; ?>
</div>