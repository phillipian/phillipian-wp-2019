<?php get_header(); ?>

<div class='home-top'>
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

<?php if (get_theme_mod('plip-banner-check')){?>
    <a href="<?php echo get_theme_mod('plip-banner-link')?>">
        <div class="home-banner"><span><?php echo get_theme_mod('plip-banner-blurb')?></span></div>
    </a>
<?php } ?>

<div class='home-new'>
    <?php if (get_theme_mod('plip-breaking-banner', null)) : ?>
        <div class="breaking-banner">
            <span>Breaking News</span>
        </div>
    <?php endif; ?>
    <?php if (get_theme_mod('plip-breaking-check1', null)) :
        $storyind = 1;
        include 'includes/breaking-news/include-breaking-news.php';
    endif; ?>
    <?php if (get_theme_mod('plip-breaking-check2', null)) :
        $storyind = 2;
        include 'includes/breaking-news/include-breaking-news.php';
    endif; ?>
</div>

<div class="home-container">
    <?php
    include 'includes/include-home-lede.php';
    include 'includes/include-home-popular.php'; // DISPLAYS ONLY WHEN FULL 3 COLUMN WIDTH
    ?>

    <?php
    $adclass = 'home-top-ad';
    $adarea = 'plip-ad-homewide';
    include 'includes/include-ad.php';
    ?>

    <div class="home-left">
        <?php
        include 'includes/include-home-popular.php'; // HIDDEN ON DESKTOP VIEW, DISPLAYS WHEN COLLAPSED TO 1/2 COLUMNS
        $includes = explode(",", get_theme_mod('plip-home-left', 'News,Sports'));
        foreach ($includes as $item){
            $catname = $item;
            include 'includes/include-home-sect.php';
        }
        ?>
    </div>

    <div class="home-right">
        <?php
        $includes = explode(",", get_theme_mod('plip-home-right', 'Commentary,Arts'));
        foreach ($includes as $item){
            $catname = $item;
            include 'includes/include-home-sect.php';
        }
        ?>
    </div>

    <div class="home-sidebar">
        <div class="sidebar-masthead">
            <a href="<?php echo get_home_url() ?>/about/">
                <img src='<?php echo get_template_directory_uri(). "/images/masthead-02-06-2020.png"?>'>
            </a>
        </div>
        <div class="sidebar-ads">
            <?php
            $adclass = 'home-side-ad';
            $adarea = 'plip-ad-homesmall';
            include 'includes/include-ad.php';
            $adclass = 'home-side-ad';
            $adarea = 'plip-ad-homesmall-2';
            include 'includes/include-ad.php';
            ?>
        </div>
    </div>
</div>

<div class="home-strip">
    <?php
    include 'includes/include-sidebar-strip.php';
    ?>
</div>

<div class="home-live">
    <div class="home-live-inner">
        <div class='sect-header'>
            <h1>
                <a href='<?php echo get_category_link(get_cat_ID("Multimedia")) ?>'>Live & Video</a>
            </h1>
        </div>
        <div class="live-posts">
            <?php
            $posts = get_posts(array(
                'numberposts' => 4,
                'category' => get_cat_ID("Multimedia")
            ));
            foreach ($posts as $post){
                $currpost = $post->ID;
                include 'includes/include-article-item.php';
            }
            ?>
        </div>
        <a class='sect-more' href='<?php echo get_category_link(get_cat_ID("Multimedia")) ?>'>All Multimedia ></a>
    </div>
</div>

<div class="home-live home-multilingual">
    <div class="home-live-inner">
        <div class='sect-header'>
            <h1>
                <a href='<?php echo get_category_link(get_cat_ID("Multilingual")) ?>'>Multilingual</a>
            </h1>
        </div>
        <?php
        include 'includes/include-multilingual-grid.php';
        ?>
    </div>
</div>


<?php get_footer(); ?>