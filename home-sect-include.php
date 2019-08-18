<div class='home-sect'>
	<div class='sect-header'>
		<h1><a href='<?php
						$catlink = get_category_link(get_cat_ID($catname));
						echo $catlink ?>'><?php
								echo $catname ?></a></h1>
	</div>
	<?php
	if ($catname == "Multilingual") {
		?>
		<div class='multilingual-grid'>
			<?php
			$childcats = get_categories('child_of=' . get_cat_ID($catname));
			foreach ($childcats as $childcat) {
				$childcatname = $childcat->cat_name;
				preg_match("/\((.*?)\)/", $childcatname, $array);
				$translated_name = $array[1];
				preg_match("/(.*?)\(/", $childcatname, $array);
				$childcatname = $array[1];
				?>
				<a href='<?php echo get_category_link($childcat); ?> ' class='multilingual-grid-item'>
					<?php echo "<div class='lang-label-1'><span>" . $childcatname . "</span></div>";
					echo "<div class='lang-label-2'><span>" . $translated_name . "</span></div>"; ?>
				</a>
			<?php
			}
			?>
		</div>
	<?php
	}
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