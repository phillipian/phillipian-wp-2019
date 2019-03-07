<?php
if (class_exists('Jetpack_RelatedPosts') && method_exists('Jetpack_RelatedPosts', 'init_raw')) {
    $related = Jetpack_RelatedPosts::init_raw()
        ->set_query_name('jetpackme-shortcode') // Optional, name can be anything
        ->get_for_post_id(
            get_the_ID(),
            array('size' => 3)
        );

    if ($related) {
        ?>
<div class='related-container'>
    <div class='article-about-top'></div>
    <h2>Related Posts</h2>
    <?php
    foreach ($related as $result) {
        $related_post = get_post($result['id']); ?>
    <div class='related-item'>
        <h3>
            <a href='<?php echo get_post_permalink($related_post); ?>'>
                <?php echo $related_post->post_title; ?>
            </a>
        </h3>
        <div class='related-date'><span><?php $cat = get_the_category($related_post); echo esc_html($cat[0]->name)." • "; echo get_the_date(get_option('date_format'), $related_post); ?></span></div>
    </div>
    <?php 
} ?>
</div>
<?php

}
} ?> 