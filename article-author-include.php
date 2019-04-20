<div class='article-author'>
    <?php 
    $def_author = get_the_author();
    ?>
    <script>console.log("<?php echo $def_author ?>");</script>
    <?php
    $cust_author = get_post_meta(get_the_ID(), 'cpa_author', true);
    if ($def_author == 'admin') {
        echo "<span>" . $cust_author . "</span>";
    } else {
        if ($singlepage) {
            $author_email = get_the_author_meta('email');
            echo "<a href='" . get_author_posts_url(get_the_author_meta('ID')) . "'><div class='author-prof'>" . get_avatar($author_email) . "</div></a>";
        }
        echo "<span>" . get_the_author_posts_link() . "</span>";
    }
    ?>
</div> 