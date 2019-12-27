<?php
$ind = strval($storyind);
$headline = get_theme_mod('plip-breaking-headline' . $ind, null);
$blurb = get_theme_mod('plip-breaking-blurb' . $ind, null);
$slug = get_term_by('slug', get_theme_mod('plip-breaking-tag' . $ind, "none"), 'post_tag');
$rightincludes = explode(",", get_theme_mod('plip-breaking-right' . $ind, "social-media"));
?>

<div class="breaking-story-outer">
    <div class="breaking-story three-col">
        <div class="breaking-info">
            <h1><?php echo $headline ?></h1>
            <p><?php echo $blurb ?></p>
        </div>
        <div class="breaking-col">
            <div class="breaking-coverage-label"><span>Our Latest Coverage</span></div>
            <?php query_posts(array(
                'category__and' => get_cat_ID("news"),
                'tag__in' => $slug
            ));
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    include "article-include.php";
                endwhile;
            endif; ?>
        </div>
        <div class="breaking-col">
            <?php foreach ($rightincludes as $rightitem):
                if ($rightitem == 'social-media'): ?>
                    <p>Follow <i>The Phillipian</i> on social media for the latest updates:</p>

                    <div class='breaking-social'>
                        <div class='breaking-social-item'><a
                                    href='https://www.youtube.com/channel/UCQrKknXWKCGhlF1XCOewoBA'><i
                                        class="fab fa-youtube"></i></a></div>
                        <div class='breaking-social-item'><a href='https://twitter.com/phillipian'><i
                                        class="fab fa-twitter"></i></a></div>
                        <div class='breaking-social-item'><a href='https://www.instagram.com/thephillipian/'><i
                                        class="fab fa-instagram"></i></a></div>
                    </div>
                <?php
                elseif ($rightitem == 'commentary-call'): ?>
                    <p>Do you have thoughts about these policy changes? Start writing, be it a 100-word or 1000-word response, and email <a href="mailto:commentary@phillipian.net">commentary@phillipian.net</a>.</p>
                <?php else:
                    query_posts(array(
                        'category__and' => get_cat_ID($rightitem),
                        'tag__in' => $slug
                    ));
                    if (have_posts()) :
                        ?>
                        <div class="breaking-coverage-label"><span><?php echo $rightitem ?></span></div>
                        <?php
                        while (have_posts()) :
                            the_post();
                            include "article-include.php";
                        endwhile;
                    endif;
                endif;
            endforeach; ?>
        </div>
    </div>
    <div class="breaking-scroll"><span>Scroll right for more <i class="fas fa-arrow-right"></i></span></div>
</div>