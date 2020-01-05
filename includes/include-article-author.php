<div class='article-author'>
    <?php
    ?>
    <?php
    $def_author = get_the_author();
    if ($def_author == 'admin') {
        $cust_author = get_post_meta(get_the_ID(), 'cpa_author', true);
        echo $cust_author;
    } else {
        if (function_exists('coauthors_posts_links')) {
            $coauthors = get_coauthors(get_the_ID());
            $last = end($coauthors)->display_name;
            foreach ($coauthors as $author) {
                echo $author->display_name;
                if (!($author->display_name == $last)) {
                    echo ", ";
                }
            }
        } else {
            echo $def_author->display_name . $def_author;
        }
    }
    ?>
</div> 