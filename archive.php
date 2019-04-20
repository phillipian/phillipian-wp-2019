<?php get_header(); ?>

<div class='category-container'>

    <?php
    if (is_category()){
        $catname = "Sports"; // to trigger "catSports()" for categories
    }
    if (is_author()){
        $author_email = get_the_author_meta('email');
        echo "<div class='author-prof'>".get_avatar($author_email)."</div>";
    }
    ?>
    <h1>
        <?php
        $title = get_the_archive_title();
        preg_match("/(?<=Category: )(.*)|(?<=Author: )(.*)/", $title, $array);
        echo $array[0];
        ?>
    </h1>
    <?php if (is_author()) {
        /*echo "<p>Note: author archives were introduced with the website redesign in March 2019. By default, articles published before this time will not appear in the archive. Furthermore, articles with multiple authors may not appear in the archive. Contact <a href='mailto:ede@phillipian.net'>ede@phillipian.net</a> to request that archiving be enabled for a specific author.</p>";*/
        echo "<p class='author-bio'>" . get_the_author_meta('description') . " Contact the author at <a href='mailto:".$author_email."'>".$author_email.".</p>";
    }
    if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php 
    $archive = true;
    include 'article-include.php' ?>
    <?php endwhile;
endif; ?>
</div>


<?php get_footer(); ?> 