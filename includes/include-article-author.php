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
                $authorID = $author->ID;
                $authorEmail = get_the_author_meta('email', $authorID);
                $authorLink = get_author_posts_url($authorID);
                if ($singlepage){
                    echo "<a href='" . $authorLink . "'><div class='author-container'><div class='author-avatar'>" . get_avatar($authorEmail) . "</div><div class='author-name'><span>" . $author->display_name . "</span></div></div></a>";
                }
                else{
                    echo "<a href='" . $authorLink . "'>" . $author->display_name . "</a>";
                    if (!($author->display_name == $last)) {
                        echo ", ";
                    }
                }
            }
        } else {
            echo $def_author->display_name . $def_author;
        }
    }
    ?>
</div> 