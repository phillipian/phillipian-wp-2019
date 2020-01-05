<?php foreach ($includes as $item):
    if ($item == 'social-media'): ?>
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
    elseif ($item == 'commentary-call'): ?>
        <p>Do you have thoughts about these policy changes? Start writing, be it a 100-word or 1000-word response, and email <a href="mailto:commentary@phillipian.net">commentary@phillipian.net</a>.</p>
    <?php else:
        query_posts(array(
            'category__and' => get_cat_ID($item),
            'tag__in' => $slug
        ));
        if (have_posts()) :
            if ($item == "news"): ?>
                <div class="breaking-coverage-label"><span>Our Latest Coverage</span></div>
            <?php else: ?>
                <div class="breaking-coverage-label"><span><?php echo $item ?></span></div>
            <?php endif;
            while (have_posts()) :
                the_post();
                include(__DIR__ . '/../include-article-item.php');
            endwhile;
        endif;
    endif;
endforeach; ?>