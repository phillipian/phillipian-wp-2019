<div class='article-author'>
    <?php
    if (!isset($currpost)){
        $post_id = get_the_ID();
    }
    else{
        $post_id = $currpost;
    }
    $def_author_id = get_post_field ('post_author', $post_id);
    $def_author = get_the_author_meta('display_name', $def_author_id);
    if ($def_author == 'admin') {
        $cust_author = get_post_meta($post_id, 'cpa_author', true);
        echo $cust_author;
    } else {
        if (function_exists('coauthors_posts_links')) {
            $coauthors = get_coauthors($post_id);
            if (count($coauthors) == 1 && $coauthors[0]->display_name == "admin"){ // I believe Coauthors Plus plugin has a bug which returns main loop author as fallback instead of for the specified post_id - this is my temporary workaround.
                echo $def_author;
            }
            else{
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
            }
        } else {
            echo $def_author;
        }
    }
    ?>
</div> 