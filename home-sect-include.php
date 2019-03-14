<div class='sect-header'>
	<h1><a href='<?php
$catlink = get_category_link(get_cat_ID($catname));
echo $catlink ?>'><?php
echo $catname ?></a></h1>
</div>
<div class='sect sect-<?php
echo strtolower($catname) ?>'>
<div class='home-divider'></div>

    <?php

if ($catname == 'News') {
	get_cat_ID($catname);
	query_posts(array(
		'category_name' => 'news+featured',
		'posts_per_page' => 1
	));
	if (have_posts()):
		while (have_posts()):
			the_post();
			include 'article-featured.php';

		endwhile;
	endif;
	wp_reset_query();
	$exclude = get_cat_ID('featured');
	$include = get_cat_ID($catname);
	query_posts(array(
		'cat' => $include . ",-" . $exclude,
		'posts_per_page' => 4
	));
	if (have_posts()):
		while (have_posts()):
			the_post(); ?>
    <div class='article-item <?php
			if (catch_that_image() == false) {
				echo "article-noimage";
			}
			else {
				echo "article-news-alt2";
			} ?>'>
        <?php
			include 'article-include.php' ?>
    </div>
    <?php

		endwhile;
	endif;
	wp_reset_query();
}
else {
	if ($catname == 'Commentary') {
		$postppg = 4;
	}
	elseif ($catname == 'Editorial') {
		$postppg = 1;
	}
	else {
		$postppg = 6;
	}

	query_posts(array(
		'cat' => get_cat_ID($catname) ,
		'posts_per_page' => $postppg
	));
	if (have_posts()):
		while (have_posts()):
			the_post(); ?>
    <div class='article-item <?php
			if (!$sectleft):
				echo "article-commentary ";
			endif;
			if (catch_that_image() == false):
				echo "article-noimage ";
			elseif ($sectleft):
				echo "article-news-alt2 ";
			endif
?>'>
        <?php
			include 'article-include.php' ?>
    </div>
    <?php

		endwhile;
	endif;
	wp_reset_query();
} ?>

 </div>
<a class='sect-more' href='<?php
echo $catlink ?>'>All <?php
echo $catname ?> Articles ></a>