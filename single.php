<?php get_header(); ?>
<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class='single-container'>
        <div class='article-category'>
            <div class='post-categories'>
                <? foreach (get_the_category() as $c) {
                    if ($c->name != 'Featured Posts') { ?>
                        <a href='<?php echo get_category_link($c->cat_ID) ?>'>
                            <?php echo $c->name; ?></a>
                        <?php
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
                <?php include 'single-sidebar-include.php' ?>
            </div>
        </div>
        <div class='single-right'>
            <div class='mobile-ads-related'>
                <?php include 'single-sidebar-include.php' ?>
            </div>
            <?php the_content(); ?>
            <?php include 'related-include.php' ?>
        </div>
    </div>

    <script src='<?php echo get_template_directory_uri() . "/js/gallery.js" ?>'></script>


<?php endwhile;
endif; ?>

<?php get_footer(); ?> 