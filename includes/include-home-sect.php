<?php
$catlink = get_category_link(get_cat_ID($catname));
if ($catname == "Multimedia"): ?>
    <div class='sect-header'>
        <h1>
            <a href='<?php
            echo $catlink ?>'>Live & Video</a>
        </h1>
    </div>
    <div class="home-video-container">
<?php else: ?>
    <div class='home-sect'>
    <div class='sect-header'>
        <h1>
            <a href='<?php
            echo $catlink ?>'><?php
                echo $catname ?></a>
        </h1>
    </div>
<?php endif;
$sect = true;
wp_reset_query();
query_posts(array(
    'cat' => get_cat_ID($catname),
    'posts_per_page' => 1
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
<?php endif; ?>
