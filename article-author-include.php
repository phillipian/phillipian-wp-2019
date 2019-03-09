<div class='article-author'>
    <span>By
        <?php 
        $def_author = get_the_author();
        $cust_author = get_post_meta(get_the_ID(), 'cpa_author', true);
        if ($def_author == 'admin') {
            echo $cust_author;
        } else {
            echo get_the_author_posts_link();
        }
        ?>
    </span>
</div> 