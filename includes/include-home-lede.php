<?php

$style = get_theme_mod('plip-home-style', 'none');

if ($style == 'none'){

}
else{

$post = get_posts(array(
   'numberposts' => 1,
    'category_name' => 'lede'
));
$post_id = $post[0]->ID;
$is_multimedia = in_category("multimedia", $post_id);

?>

<div class="home-lede article-item lede-<?php echo $style; if ($style == 'horizontal-headline' || $style == 'horizontal-overlay') echo ' lede-horizontal'; ?>">

    <?php

    if (!($is_multimedia)):
        if (!(catch_that_image($post_id) == false)) :
            $credit = get_lede_credit($post_id);
            if (is_int($credit)){
                $name = get_user_meta($credit, 'first_name', true) . " " . get_user_meta($credit, 'last_name', true);
                $url = get_author_posts_url($credit);
                $byline = $name . "/The Phillipian";
            }
            else{
                $byline = $credit;
            }
            ?>
            <div class='article-image'>
                    <div class="article-image-inner">
                        <a href='<?php echo get_the_permalink($post_id); ?>'>
                            <img src='<?php echo catch_that_image($post_id) ?>'>
                        </a>
                        <div class="lede-byline">
                            <?php
                            if (isset($url)){?>
                                <a href="<?php echo $url ?>"><span><?php echo $byline ?></span></a>
                                <?php
                            }
                            else{?>
                                <span><?php echo $byline ?></span>
                            <?php }
                            ?>
                        </div>
                    </div>
            </div>
        <?php endif; ?>
        <?php the_scorebox();
    endif; ?>

    <div class="article-text">

        <?php

        include 'include-home-lede-headline.php';

        if ($style == 'vertical'){
            $content = get_post_field('post_content', $post_id);
            $excerpt = get_snippet(sz_stripall($content),70);
            echo "<p>" . $excerpt . "...</p>";
        }

        $currpost = $post_id;
        include 'include-article-author.php';
        $currpost = null;
        ?>

        <div class="article-date">
            <span>
                <?php echo get_the_time("M j, Y", $post_id);
                ?>
            </span>
        </div>

    </div>

</div>
<?php } ?>