<?php get_header(); ?>

    <div class='category-container'>

        <?php
        if (is_category()){
            $catname = "Sports"; // to trigger "catSports()" for categories
        }
        if (is_author()){
            $author = get_queried_object();
            $author_email = get_the_author_meta('email');
            echo "<div class='author-prof'>".get_avatar($author_email)."</div>";
        }
        ?>
        <h1 class="author-title">
            <?php
            $title = get_the_archive_title();
            preg_match("/(?<=Category: )(.*)|(?<=Author: )(.*)/", $title, $array);
            echo $array[0];
            ?>
        </h1>
        <?php if (is_author()) {
            /*echo "<p>Note: author archives were introduced with the website redesign in March 2019. By default, articles published before this time will not appear in the archive. Furthermore, articles with multiple authors may not appear in the archive. Contact <a href='mailto:ede@phillipian.net'>ede@phillipian.net</a> to request that archiving be enabled for a specific author.</p>";*/
            echo "<p class='author-bio'>" . get_the_author_meta('description') . " Contact the author at <a href='mailto:".$author_email."'>".$author_email.".</a></p>";

            if (!(empty(\Media_Credit::author_media_and_posts( [ 'author_id' => $author->ID ] )))){
                echo "<h1>Media credited to this author</h1>";
                \Media_Credit::display_author_media( [ 'author_id' => $author->ID, 'sidebar' => false ] );
            }
        }
        if (have_posts()) :
            echo "<h1>Articles by this author</h1>";
            while (have_posts()) : the_post(); ?>
                <?php
                $archive = true;
                include 'article-include.php' ?>
            <?php endwhile;
        endif;
        echo paginate_links();
        ?>
    </div>

<?php
if ($mediaexists){
    echo "media exists!";
}
get_footer(); ?>