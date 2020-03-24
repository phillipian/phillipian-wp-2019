<?php
$ind = strval($storyind);
$headline = get_theme_mod('plip-breaking-headline' . $ind, null);
$blurb = get_theme_mod('plip-breaking-blurb' . $ind, null);
$slug = get_term_by('slug', get_theme_mod('plip-breaking-tag' . $ind, "none"), 'post_tag');
$leftincludes = explode(",", get_theme_mod('plip-breaking-left' . $ind, "news"));
$rightincludes = explode(",", get_theme_mod('plip-breaking-right' . $ind, "social-media"));
?>

<div class="breaking-story-outer">
    <div class="breaking-story">
        <div class="breaking-info">
            <h1><?php echo $headline ?></h1>
            <p><?php echo $blurb ?></p>
        </div>
        <div class="breaking-col">
            <?php
            $includes = $leftincludes;
            include 'include-breaking-news-col.php';
            ?>
        </div>
        <div class="breaking-col">
            <?php
            $includes = $rightincludes;
            include 'include-breaking-news-col.php';
            ?>
        </div>
    </div>
    <div class="breaking-scroll"><span>Scroll right for more <i class="fas fa-arrow-right"></i></span></div>
</div>