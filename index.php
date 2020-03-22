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
    <div class="home-left">
        <?php
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
</div>


<?php get_footer(); ?>