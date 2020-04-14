<div class="home-popular">
    <h1>This Month's Top Stories</h1>
    <?php
    if ( function_exists('wpp_get_mostpopular') ) {
        /* Get up to the top 5 commented posts from the last 7 days */
        wpp_get_mostpopular(array(
            'limit' => get_theme_mod('plip-home-pop-num', 3),
            'range' => 'custom',
            'time_quantity' => get_theme_mod('plip-home-pop-weeks', 4),
            'time_unit' => 'week',
            'order_by' => 'views',
            'freshness' => 1
        ));
    }
    ?>
</div>