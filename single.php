<?php get_header(); ?>
<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class='single-container'>
        <div class='article-category'>
            <div class='post-categories'>
                <? foreach (get_the_category() as $c) {
                    if ($c->name != 'Featured Posts' && $c->name != 'lede') {
                        if ($c->name != 'Hidden') {?>
                        <a href='<?php echo get_category_link($c->cat_ID) ?>'>
                            <?php echo $c->name; ?></a>
                        <?php }
                        else{
                            echo $c->name;
                        }
                    }
                }
                foreach (get_the_tags() as $t) { ?>
                    <a class="article-tag" href="<?php echo get_tag_link($t); ?>">#<?php echo $t->name; ?></a>
                <?php }
                ?>
            </div>
        </div>
        <h1>
            <?php the_title(); ?>
        </h1>
        <div class='single-left'>
            <div class='article-about'>
                <div class='article-about-top'></div>
                <?php $singlepage = true;
                include 'includes/include-article-author.php' ?>
                <span class='article-date'>
                <?php the_date(); ?></span>
                </span>
            </div>
            <div class='desktop-ads-related'>
                <?php include 'includes/include-single-sidebar.php' ?>
            </div>
        </div>
        <div class='single-right'>
            <div class='mobile-ads-related'>
                <?php include 'includes/include-single-sidebar.php' ?>
            </div>
            <?php the_content(); ?>

            <?php
            $tags = get_the_tags();
            if (!(empty($tags))) {
                $singlepage = false;
                foreach ($tags as $t) {
                    echo "<div class='tag-posts'>";
                    echo "<div class=\"article-about-top\"></div>";
                    echo "<h2 class='tag-title'>Other posts with the tag <a href='" . get_tag_link($t) . "'>#" . $t->name . "</a></h2>";
                    $args = array("tag" => $t->name, 'posts_per_page' => 5);
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) {
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                            $archive = true;
                            include 'includes/include-article-item.php';
                        }
                    }
                    echo "</div>";
                }
            }
            ?>
            <?php
            if (!(has_category("hidden"))){
                include 'includes/include-related-posts.php';
            }

            ?>
        </div>
    </div>

    <script src='<?php echo get_template_directory_uri() . "/js/gallery.js" ?>'></script>


<?php endwhile;
endif; ?>

<?php get_footer(); ?> 