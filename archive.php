<?php get_header(); ?>

    <div class='category-container'>

        <?php
        if (is_category()) {
            $catname = "Sports"; // to trigger "catSports()" for categories
        }
        if (is_author()) {
            $author = get_queried_object();
            $author_email = get_the_author_meta('email');
            echo "<div class='author-prof'>" . get_avatar($author_email) . "</div>";
        }
        ?>
        <h1 class="author-title">
            <?php
            $title = get_the_archive_title();
            preg_match("/(?<=Category: )(.*)|(?<=Author: )(.*)|(Tag: )(.*)/", $title, $array);
            echo $array[0];
            ?>
        </h1>
        <?php if (is_author()) {
            /*echo "<p>Note: author archives were introduced with the website redesign in March 2019. By default, articles published before this time will not appear in the archive. Furthermore, articles with multiple authors may not appear in the archive. Contact <a href='mailto:ede@phillipian.net'>ede@phillipian.net</a> to request that archiving be enabled for a specific author.</p>";*/
            echo "<p class='author-bio'>" . get_the_author_meta('description') . " Contact the author at <a href='mailto:" . $author_email . "'>" . $author_email . ".</a></p>";

            $media = \Media_Credit::author_media_and_posts( ['author_id' => $author->ID] );
            if ( !(empty( $media )) ) :?>
                <h1>Media credited to this author</h1>
                <div class="media-archive">
                <?php
                foreach ( $media as $attachment ) : ?>
                    <?php
                    \setup_postdata( $attachment );

                    // If media is attached to a post, link to the parent post. Otherwise, link to attachment page itself.
                    ?>
                    <div class='media-archive-item' id='attachment-<?php echo \esc_attr( $attachment->ID ); ?>'>
                        <?php if ( $attachment->post_parent > 0 ) : ?>
                            <a href="<?php \the_permalink( $attachment->post_parent ); ?>" title="<?php \the_title_attribute( $attachment->post_parent ); ?>"><?php echo \wp_get_attachment_image( $attachment->ID, 'large' ); ?></a>
                        <?php else : ?>
                            <?php echo \wp_get_attachment_link( $attachment->ID, 'large', true ); ?>
                        <?php endif; ?>
                    </div>
                <?php
                endforeach; ?>
                    <script>
                        var $grid = $(".media-archive").masonry({
                            itemSelector: '.media-archive-item',
                            percentPosition: true,
                            gutter: 24,
                            columnWidth: '.media-archive-item'
                        });
                        $grid.imagesLoaded(function() {
                            $grid.masonry();
                        });
                    </script>
                </div>
            <?php endif;

            if (have_posts()) {
                echo "<h1>Articles by this author</h1>";
            }
        }
        if (have_posts()) :
            echo "<div class='category-posts-container'>";

            // START OF MAIN LOOP
            while (have_posts()) : the_post(); ?>
                <?php
                $archive = true;
                include 'includes/include-article-item.php' ?>
            <?php endwhile;
            // END OF MAIN LOOP
            ?>

            <script>
                var $grid = $(".category-posts-container").masonry({
                    itemSelector: '.article-item',
                    percentPosition: true,
                    gutter: 36,
                    horizontalOrder: true,
                    columnWidth: '.article-item'
                });
                $grid.imagesLoaded(function () {
                    $grid.masonry();
                });
            </script>

            <?php
            echo "</div>";
        endif;
        echo "<div class='paginate-controls'>" . paginate_links() . "</div>";
        ?>
    </div>

<?php
get_footer(); ?>