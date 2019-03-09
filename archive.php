<?php get_header(); ?>

<!-- do this stuff -->

<div class='category-container'>
    <h1>
        <?php
        $title = get_the_archive_title();
        preg_match("/(?<=Category: )(.*)|Author: (.*)/", $title, $array);
        echo $array[0];
        ?>
    </h1>
    <?php if (preg_match("/Author: /", $title)) {
        echo "<p>Note: author archives were introduced with the website redesign in March 2019. By default, articles published before this time will not appear in the archive. Furthermore, articles with multiple authors may not appear in the archive. Contact <a href='mailto:ede@phillipian.net'>ede@phillipian.net</a> to request that archiving be enabled for a specific author.</p>";
    }
    if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class='article-item article-commentary <?php if (catch_that_image() == false) : ?>article-noimage<? endif ?>'>
        <?php include 'article-include.php' ?>
    </div>
    <?php endwhile;
endif; ?>
</div>


<?php get_footer(); ?> 