<div class='article-author'>
    <?php 
    $def_author = get_the_author();
    if (function_exists('coauthors_posts_links')) {
        // $coauthors = coauthors_posts_links();
        coauthors();
        // print_r($coauthors);
    }
    else{
        the_author();
    }
    // if ($def_author == 'admin') {
        // echo "<span>" . $def_author . "</span>";
    /*} else {
        if ($singlepage) {
            $author_email = get_the_author_meta('email');
            echo "<a href='" . get_author_posts_url(get_the_author_meta('ID')) . "'><div class='author-prof'>" . get_avatar($author_email) . "</div></a>";
        }
        echo "<span>" . get_the_author_posts_link() . "</span>";
    }*/
    ?>
</div> 