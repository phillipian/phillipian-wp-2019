<div class='home-sect'>
	<div class='sect-header'>
		<h1><a href='<?php
						$catlink = get_category_link(get_cat_ID($catname));
						echo $catlink ?>'><?php
								echo $catname ?></a></h1>
	</div>
	<?php
	$sect = true;
	wp_reset_query();
	query_posts(array(
		'cat' => get_cat_ID($catname),
		'posts_per_page' => 5
	));
	if (have_posts()) :
		while (have_posts()) :
			the_post();
			include 'article-include.php';
		endwhile;
	endif;
	?>
	<a class='sect-more' href='<?php
								echo $catlink ?>'>All <?php
						echo $catname ?> Articles ></a>
</div>