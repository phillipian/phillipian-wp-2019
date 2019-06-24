<?php get_header(); ?>

<div class='category-container multilingual-container'>

    <h1>Multilingual</h1>

    <p><?php echo category_description($cat); ?></p>

    <div class='multilingual-grid'>
        <?php
        $childcats = get_categories('child_of=' . $cat);
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

</div>
<div class='category-container'>

<h2>All Multilingual Articles</h2>

    <?php
    $multilingual = true;
    if (is_author()) {
        $author_email = get_the_author_meta('email');
        echo "<div class='author-prof'>" . get_avatar($author_email) . "</div>";
    }
    ?>
    <?php if (is_author()) {
        /*echo "<p>Note: author archives were introduced with the website redesign in March 2019. By default, articles published before this time will not appear in the archive. Furthermore, articles with multiple authors may not appear in the archive. Contact <a href='mailto:ede@phillipian.net'>ede@phillipian.net</a> to request that archiving be enabled for a specific author.</p>";*/
        echo "<p class='author-bio'>" . get_the_author_meta('description') . " Contact the author at <a href='mailto:" . $author_email . "'>" . $author_email . ".</p>";
    }
    if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php
            $archive = true;
            include 'article-include.php' ?>
        <?php endwhile;
endif;
echo paginate_links();
?>
</div>

<?php get_footer(); ?>