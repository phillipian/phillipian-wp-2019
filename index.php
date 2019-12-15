<?php get_header(); ?>

<div class='home-top'>
    <!--<div class='home-logo'><img src='<?php /* echo get_template_directory_uri() . '/images/nameplate.png'; */ ?>'></div>-->
    <div class='home-tagline'>
        <span><a href='about' title='Truth Above All: About The Phillipian'>Veritas Super Omnia</a></span>
        <span class='dot'> • </span>
        <span><?php echo date('l, F d, Y') ?></span>
        <span class='dot'> • </span>
        <div class='home-social'>
            <div class='home-social-item'><a href='https://www.youtube.com/channel/UCQrKknXWKCGhlF1XCOewoBA'><i class="fab fa-youtube"></i></a></div>
            <div class='home-social-item'><a href='https://twitter.com/phillipian'><i class="fab fa-twitter"></i></a></div>
            <div class='home-social-item'><a href='https://www.instagram.com/thephillipian/'><i class="fab fa-instagram"></i></a></div>
        </div>
    </div>
    <div class='home-cat'>
        <?php wp_nav_menu(array('theme_location' => 'home-cats')) ?>
    </div>
</div>

<?php if (get_theme_mod('plip-breaking-switch', 'no mod') == 1) : ?>
    <div class='home-breaking-news'>
        <div class='breaking-label'><span>Breaking News</span></div>
        <div class='breaking-grid'>
            <div class='breaking-info'>
                <div class='breaking-title'>
                    <!-- <span><b><?php echo get_theme_mod('plip-breaking-name', 'no mod'); ?></b></span>
                    <span style='opacity: 0.7;'>Announced </span>
                    <span style='color: #0082ca'>16th Head of School</span> -->
                    <span><?php echo get_theme_mod('plip-breaking-name', 'no mod'); ?></span>
                </div>
                <!-- <img src='<?php echo wp_get_attachment_url(get_theme_mod('plip-breaking-image', null)); ?>'> -->
                <p><?php echo get_theme_mod('plip-breaking-item1', null); ?></p>
                <p><?php echo get_theme_mod('plip-breaking-item2', null); ?></p>
                <p><?php echo get_theme_mod('plip-breaking-item3', null); ?></p>
                <?php query_posts(array(
                        'category__and' => array(get_cat_ID("breaking"), get_cat_ID("news"))
                    )); ?>

                <p>Follow <i>The Phillipian</i> on social media for the latest updates:</p>

                <div class='breaking-social'>
                    <div class='breaking-social-item'><a href='https://www.youtube.com/channel/UCQrKknXWKCGhlF1XCOewoBA'><i class="fab fa-youtube"></i></a></div>
                    <div class='breaking-social-item'><a href='https://twitter.com/phillipian'><i class="fab fa-twitter"></i></a></div>
                    <div class='breaking-social-item'><a href='https://www.instagram.com/thephillipian/'><i class="fab fa-instagram"></i></a></div>
                </div>

            </div>
            <div class='breaking-image'>
                <div class='breaking-coverage-label'><span>Our Latest Coverage</span></div>

                <?php if (get_theme_mod('plip-breaking-youtube', '') != '') :
                        $breakingcoverage = true; ?>

                    <div class='breaking-article'>
                        <div class='yt-container'><iframe src='https://www.youtube.com/embed/<?php echo get_theme_mod('plip-breaking-youtube'); ?>?modestbranding=1' frameborder='0' allowfullscreen></iframe></div>
                    </div>

                <?php endif; ?>

                <?php if (have_posts()) :
                        $breakingcoverage = true; ?>

                    <?php while (have_posts()) :
                                the_post(); ?>

                        <a href='<?php the_permalink(); ?>'>
                            <div class='breaking-article'>
                                <div class='breaking-article-time'><?php echo time_elapsed_string(get_the_time()); ?></div>
                                <h2><?php the_title(); ?></h2>
                            </div>
                        </a>

                    <?php endwhile;
                        endif;
                        if (!$breakingcoverage) : ?>

                    <div class='breaking-social'>
                        <div class='breaking-social-item'><a href='https://www.youtube.com/channel/UCQrKknXWKCGhlF1XCOewoBA'><i class="fab fa-youtube"></i></a></div>
                        <div class='breaking-social-item'><a href='https://twitter.com/phillipian'><i class="fab fa-twitter"></i></a></div>
                        <div class='breaking-social-item'><a href='https://www.instagram.com/thephillipian/'><i class="fab fa-instagram"></i></a></div>
                    </div>

                    <p class='breaking-checkback'>Check back later and follow our social media for the latest coverage.</p>

                <?php
                    endif; ?>

                <div class='breaking-coverage-label'><span>Community Commentary</span></div>

                <p>Do you have thoughts about these policy changes? Start writing, be it a 100-word or 1000-word response, and email <a href='mailto:commentary@phillipian.net'>commentary@phillipian.net</a>.</p>

                <?php query_posts(array(
                        'category__and' => array(get_cat_ID("breaking"), get_cat_ID("commentary"))
                    ));
                    if (have_posts()) :
                        while (have_posts()) :
                            the_post(); ?>

                        <a href='<?php the_permalink(); ?>'>
                            <div class='breaking-article'>
                                <div class='breaking-article-time'><?php
                        $coauthors = get_coauthors(get_the_ID());
                        $last = end($coauthors)->display_name;
                        foreach ($coauthors as $author) {
                            echo $author->display_name;
                            if (!($author->display_name == $last)) {
                                echo ", ";
                            }
                        }
                                ?></div>
                                <h2><?php the_title(); ?></h2>
                            </div>
                        </a>

                    <?php endwhile;
                        endif;
                        ?>

                

                <!-- <img src='<?php echo wp_get_attachment_url(get_theme_mod('plip-breaking-image', null)); ?>'> -->
                <!-- <div class='breaking-input'>
                    <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdeBchqSs3vzeXcJyZSZ8--B9TuKKyuktB_0UD4DK7Z1CQw_g/viewform?embedded=true" marginheight="0" marginwidth="0">Loading…</iframe>
                </div> -->
            </div>
        </div>
    </div>
<?php endif; ?>

<div class='home-featured'>
    <div class='home-featured-inner'>
        <?php query_posts(array(
            'category_name' => 'featured',
            'posts_per_page' => get_theme_mod('plip-home-num', null)
        ));
        if (have_posts()) :
            $i = 0;
            while (have_posts()) :
                the_post();
                if ($i == 0) {
                    include "article-featured.php";
                    $i++;
                } else {
                    include "article-include.php";
                }
            endwhile;
        endif; ?>
    </div>
</div>
<?php $adclass = 'home-top-ad';
$adarea = 'plip-ad-homewide';
include 'ad-include.php'; ?>
<div class='home-sects'>
    <div class='home-sects-inner'>
        <?php
        $catname = "News";
        include 'home-sect-include.php';
        $catname = "Commentary";
        include 'home-sect-include.php';
        $catname = "Sports";
        include 'home-sect-include.php';
        $catname = "Arts";
        include 'home-sect-include.php';
        ?>
    </div>
    <?php include "home-right-include.php" ?>
</div>
<script>
    var $grid = $(".home-featured-inner").masonry({
        itemSelector: '.article-item',
        percentPosition: true,
        gutter: 24,
        columnWidth: '.article-news-side'
    });
    $grid.imagesLoaded(function() {
        $grid.masonry();
    });
    var $grid2 = $(".home-sects-inner").masonry({
        itemSelector: '.home-sect',
        percentPosition: true,
        gutter: 36,
        columnWidth: '.home-sect'
    });
    $grid2.imagesLoaded(function() {
        $grid2.masonry();
    });
</script>
</div>


<?php get_footer(); ?>