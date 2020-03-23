<?php

$style = get_theme_mod('plip-home-style', 'vertical');

$post = get_posts(array(
   'numberposts' => 1,
    'category_name' => 'lede'
));
$post_id = $post[0]->ID;
$is_multimedia = in_category("multimedia", $post_id);

?>

<div class="home-lede article-item lede-<?php echo $style; if ($style == 'horizontal-headline') echo ' lede-horizontal'; ?>">

    <?php

    if (!($is_multimedia)):
        if (!(catch_that_image($post_id) == false)) : ?>
            <div class='article-image'>
                <a href='<?php echo get_the_permalink($post_id); ?>'>
                    <img src='<?php echo catch_that_image($post_id) ?>'>
                </a>
            </div>
        <?php endif; ?>
        <?php the_scorebox();
    endif; ?>

    <div class="article-text">

        <?php

        include 'include-home-lede-headline.php';

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