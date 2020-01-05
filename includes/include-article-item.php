<?php
if (has_category("multimedia")):  // FOR MULTIMEDIA ARTICLE
    ?>


    <div class="article-item <?php if ($archive) { ?>article-sect !article-archive <?php } elseif ($sect) { ?>article-sect <?php } else { ?>article-news-side <?php } ?> article-noimage article-multimedia ">
        <div class="article-text">

            <div class='article-category'><?php catsNoFeatured(); ?></div>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php

            $postcontent = get_the_content();
            preg_match("/\[ytembed(.*)\[\/ytembed\]/", $postcontent, $youtubematches);
            echo do_shortcode($youtubematches[0]);

            ?>
            <?php include 'include-article-author.php' ?>
            <div class="article-date"><span><?php the_time("M j"); ?></span></div>
        </div>
    </div>

<?php else: // NOT MULTIMEDIA ARTICLE ?>

    <div class="article-item <?php if ($archive) { ?>article-sect !article-archive <?php } elseif ($sect) { ?>article-sect <?php } else { ?>article-news-side <?php }
    if (catch_that_image() == false) : ?>article-noimage<?php endif ?>">
        <div class=" article-text">
            <div class='article-category'><?php if ($catname == "Sports") {
                    catsSports();
                } elseif ($multilingual) {
                    catMulti();
                } else {
                    catsNoFeatured();
                } ?></div>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php include 'include-article-author.php' ?>
            <div class="article-date"><span><?php the_time("M j"); ?></span></div>
        </div>
        <?php if (catch_that_image() == false) : else: ?>
            <div class='article-image'><a href='<?php the_permalink(); ?>'><img src='<?php echo catch_that_image() ?>'></a>
            </div>
        <?php endif ?>
        <?php the_scorebox(); ?>
    </div>
<?php endif; ?>

<?php //echo "testing";?>
