<div class='article-author'>
    <?php
    ?>
    <?php
    $def_author = get_the_author();
    if ($def_author  == 'admin'){
        $cust_author = get_post_meta(get_the_ID(), 'cpa_author', true);
        echo $cust_author;
    }
    else{
        if (function_exists('coauthors_posts_links')) {
            $coauthors = get_coauthors(get_the_ID());
            $last = end($coauthors)->display_name;
            foreach ($coauthors as $author) {
                echo $author->display_name;
                if (!($author->display_name == $last)) {
                    echo ", ";
                }
            }
        }
        else{
            echo $def_author->display_name . $def_author;
        }
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