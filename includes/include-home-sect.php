<?php

$cattype = substr($catname, 0, 1);

// IF POST

if ($cattype == "*"){

    echo "<div class='article-spotlight-outer'><div class='pin-banner'><span><i class=\"fas fa-thumbtack\"></i> Pinned Article</span></div>";

    $currpost = substr($catname, 1);
    $spotlight = true;

    include 'include-article-item.php';

    $currpost = null;
    $spotlight = false;

    ?>

    <a class='sect-more' href='<?php echo get_the_permalink($post_id); ?>'>Read Full Article ></a>

    </div>

    <?php

}

// ELSE IF TAG

else if ($cattype == "#"){

    $tagname = substr($catname, 1);
    $taglink = get_tag_link(get_tag_ID($tagname));
    $sect = true;

    ?>

    <div class='home-sect'>
        <div class='sect-header'>
            <h1>
                <a href='<?php
                echo $taglink ?>'><?php
                    echo $catname ?></a>
            </h1>
        </div>

    <?php

    wp_reset_query();
    query_posts(array(
        'tag__in' => get_term_by('slug', $tagname, 'post_tag')
    ));



    if (have_posts()) :
        while (have_posts()) :
            the_post();
            include 'include-article-item.php';
        endwhile;
    endif;

    echo "</div>";
}

// ELSE, IT'S A CATEGORY

else {
    $catlink = get_category_link(get_cat_ID($catname));?>
        <div class='home-sect'>
        <div class='sect-header'>
            <h1>
                <a href='<?php
                echo $catlink ?>'><?php
                    echo $catname ?></a>
            </h1>
        </div>
    <?php
    $sect = true;
    wp_reset_query();
    query_posts(array(
        'cat' => get_cat_ID($catname),
        'posts_per_page' => get_theme_mod('plip-home-sect-num')
    ));
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            include 'include-article-item.php';
        endwhile;
    endif;
    if ($catname == "Multimedia"): ?>
        </div>
        <a class='sect-more' href='<?php
        echo $catlink ?>'>All <?php
            echo $catname ?> ></a>
    <?php else: ?>
        <a class='sect-more' href='<?php
        echo $catlink ?>'>All <?php
            echo $catname ?> Articles ></a>
        </div>
    <?php endif;
}?>