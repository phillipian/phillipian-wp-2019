<?php

add_filter('use_block_editor_for_post', '__return_false', 10);

// not needed with proprietary media-credit plugin
//
//function media_credit_sc($atts, $content = null)
//{
//    $a = shortcode_atts(array(
//        'name' => 'The Phillipian',
//        'id' => 'none'
//    ), $atts);
//    if ($a['id'] == 'none'){
//        $credit = $a['name'];
//    }
//    else{
//        $authorname = get_the_author_meta('user_firstname',$a['id']) . " " . get_the_author_meta('user_lastname',$a['id']);
//        $credit = $authorname . "/The Phillipian";
//    }
//    preg_match("/<img(.*)\/>/", $content, $array1);
//    return "<div class='single-image'>" . $array1[0] . "<div class='media-credit'><span>" . $credit . '</span></div></div><p></p>';
//}

function caption_override_sc($atts, $content = null)
{
    preg_match("/\[media\-credit(.*)\[\/media-credit\]/", $content, $array2);
    preg_match("/(?<=\[\/media-credit\])(.*)/", $content, $array3);
    return "<div class='single-image'>" . do_shortcode($array2[0]) . "<div class='single-image-caption'><span>" . $array3[0] . "</span></div></div><p></p>";
}

function override_image_shortcodes(){
//    not needed with proprietary media-credit plugin
//    remove_shortcode('media-credit');
//    add_shortcode('media-credit', 'media_credit_sc');
    remove_shortcode('caption');
    add_shortcode('caption', 'caption_override_sc');
}

add_action( 'wp_loaded', 'override_image_shortcodes' );

function scorebox_sc($atts, $content = null)
{
    $scores = explode(",", $content);
    $retval = "";
    foreach ($scores as $score) {
        $scoresplit = explode(":", $score);
        $retval = $retval . "
      <div class='score-name'><span>" . $scoresplit[0] . "</span></div>
      <div class='score-num'><span>" . $scoresplit[1] . "</span></div>";
    }
    return "<div class='score-box'>" . $retval . "</div>";
}

function imggallery_sc($atts, $content = null){
    $retval = "<div class='imggallery'>" . do_shortcode($content) . "
  <div class='gallery-controls'>
  <div class='gallery-prev'><i class='fas fa-arrow-left'></i></div>
  <div class='gallery-index'><span class='num'>1</span><span class='total'>/4</span></div>
  <div class='gallery-next'><i class='fas fa-arrow-right'></i></div>
  </div>
  </div>";
    $retval = str_replace("<p>", "", $retval);
    $retval = str_replace("</p>", "", $retval);
    return $retval . "<p></p>";
}

add_shortcode('imggallery', 'imggallery_sc');

add_shortcode('scorebox', 'scorebox_sc');

function ytembed_sc($atts, $content = null)
{
    return "<div class='single-image'><div class='yt-container'><iframe src='https://www.youtube.com/embed/" . $content . "'></iframe></div></div>";
}

add_shortcode('ytembed', 'ytembed_sc');

function jetpackme_remove_rp()
{
    if (class_exists('Jetpack_RelatedPosts')) {
        $jprp = Jetpack_RelatedPosts::init();
        $callback = array($jprp, 'filter_add_target_to_dom');
        remove_filter('the_content', $callback, 40);
    }
}

add_filter('wp', 'jetpackme_remove_rp', 20);

function jetpackme_more_related_posts($options)
{
    $options['size'] = 6;
    return $options;
}

add_filter('jetpack_relatedposts_filter_options', 'jetpackme_more_related_posts');

function plip_script_enqueue()
{
    // wp_enqueue_style(string $handle, mixed $src, array $deps, mixed $ver, string $media);
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/plip.css', array(), null, 'all');
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/section-dropdown.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'plip_script_enqueue');
add_theme_support('post-thumbnails');

function plip_theme_setup()
{
    add_theme_support('menus');
    register_nav_menus(array(
        'primary' => __('Primary Header Navigation'),
        'secondary' => __('Footer Navigation'),
        'home-cats' => __('Home Category Bar'),
        'sections-1' => __('Sections Dropdown 1'),
        'sections-2' => __('Sections Dropdown 2'),
        'sections-3' => __('Sections Dropdown 3'),
        'sections-4' => __('Sections Dropdown 4')
    ));
}

add_action('init', 'plip_theme_setup'); // execute after theme setup

function plip_ads($wp_customize)
{
    $wp_customize->add_section('plip-ad-sec', array(
        'title' => 'Advertisements'
    ));
    $wp_customize->add_setting('plip-ad-homewide');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'plip-ad-homewide-control', array(
        'label' => 'Home Wide Ad',
        'section' => 'plip-ad-sec',
        'settings' => 'plip-ad-homewide',
        'width' => 1200,
        'height' => 200
    )));
    $wp_customize->add_setting('plip-ad-homewide-url');
    $wp_customize->add_control('plip-ad-homewide-url', array(
        'label' => 'Home Wide Ad Link',
        'type' => 'url',
        'section' => 'plip-ad-sec',
        'settings' => 'plip-ad-homewide-url'
    ));
    $wp_customize->add_setting('plip-ad-homesmall');
    $wp_customize->add_control(new WP_Customize_Media_control($wp_customize, 'plip-ad-homesmall-control', array(
        'label' => 'Home Small Ad',
        'section' => 'plip-ad-sec',
        'settings' => 'plip-ad-homesmall',
        'width' => 300,
        'height' => 250,
        'flex-width' => true,
        'flex-height' => true
    )));
    $wp_customize->add_setting('plip-ad-homesmall-url');
    $wp_customize->add_control('plip-ad-homesmall-url', array(
        'label' => 'Home Small Ad Link',
        'type' => 'url',
        'section' => 'plip-ad-sec',
        'settings' => 'plip-ad-homesmall-url'
    ));
    $wp_customize->add_setting('plip-ad-single1');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'plip-ad-single1-control', array(
        'label' => 'Single Ad 1',
        'section' => 'plip-ad-sec',
        'settings' => 'plip-ad-single1',
        'width' => 300,
        'height' => 250
    )));
    $wp_customize->add_setting('plip-ad-single1-url');
    $wp_customize->add_control('plip-ad-single1-url', array(
        'label' => 'Some Ad 1 Link',
        'type' => 'url',
        'section' => 'plip-ad-sec',
        'settings' => 'plip-ad-single1-url'
    ));
    $wp_customize->add_setting('plip-ad-single2');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'plip-ad-single2-control', array(
        'label' => 'Single Ad 2',
        'section' => 'plip-ad-sec',
        'settings' => 'plip-ad-single2',
        'width' => 300,
        'height' => 250
    )));
    $wp_customize->add_setting('plip-ad-single2-url');
    $wp_customize->add_control('plip-ad-single2-url', array(
        'label' => 'Single Ad 2 Link',
        'type' => 'url',
        'section' => 'plip-ad-sec',
        'settings' => 'plip-ad-single2-url'
    ));
    $wp_customize->add_setting('plip-ad-single2-url');
    $wp_customize->add_control('plip-ad-single2-url', array(
        'label' => 'Single Ad 2 Link',
        'type' => 'url',
        'section' => 'plip-ad-sec',
        'settings' => 'plip-ad-single2-url'
    ));
    $wp_customize->add_section('plip-home-sec', array(
        'title' => 'Home Custom Settings'
    ));
    $wp_customize->add_setting('plip-home-num');
    $wp_customize->add_control('plip-home-num-control', array(
        'label' => 'Number of featured posts',
        'type' => 'number',
        'section' => 'plip-home-sec',
        'settings' => 'plip-home-num'
    ));
    $wp_customize->add_section('plip-breaking-sec', array(
        'title' => 'Breaking News'
    ));
    $wp_customize->add_setting('plip-breaking-banner');
    $wp_customize->add_control('plip-breaking-banner-control', array(
        'label' => 'red "BREAKING" banner?',
        'type' => 'checkbox',
        'section' => 'plip-breaking-sec',
        'settings' => 'plip-breaking-banner'
    ));
    $wp_customize->add_setting('plip-breaking-check1');
    $wp_customize->add_control('plip-breaking-check1-control', array(
        'label' => 'show first breaking story?',
        'type' => 'checkbox',
        'section' => 'plip-breaking-sec',
        'settings' => 'plip-breaking-check1'
    ));
    $wp_customize->add_setting('plip-breaking-tag1');
    $wp_customize->add_control('plip-breaking-tag1-control', array(
        'label' => 'story 1 tag',
        'type' => 'string',
        'section' => 'plip-breaking-sec',
        'settings' => 'plip-breaking-tag1'
    ));
    $wp_customize->add_setting('plip-breaking-headline1');
    $wp_customize->add_control('plip-breaking-headline1-control', array(
        'label' => 'story 1 headline',
        'type' => 'string',
        'section' => 'plip-breaking-sec',
        'settings' => 'plip-breaking-headline1'
    ));
    $wp_customize->add_setting('plip-breaking-blurb1');
    $wp_customize->add_control('plip-breaking-blurb1-control', array(
        'label' => 'story 1 blurb',
        'type' => 'string',
        'section' => 'plip-breaking-sec',
        'settings' => 'plip-breaking-blurb1'
    ));
    $wp_customize->add_setting('plip-breaking-right1');
    $wp_customize->add_control('plip-breaking-right1-control', array(
        'label' => 'story 1 right column content as comma-separated (no spaces!) list, e.g. "social-media,commentary,multimedia". Default is just social-media.',
        'type' => 'string',
        'section' => 'plip-breaking-sec',
        'settings' => 'plip-breaking-right1'
    ));
    $wp_customize->add_setting('plip-breaking-check2');
    $wp_customize->add_control('plip-breaking-check2-control', array(
        'label' => 'show second breaking story?',
        'type' => 'checkbox',
        'section' => 'plip-breaking-sec',
        'settings' => 'plip-breaking-check2'
    ));
    $wp_customize->add_setting('plip-breaking-tag2');
    $wp_customize->add_control('plip-breaking-tag2-control', array(
        'label' => 'story 2 tag',
        'type' => 'string',
        'section' => 'plip-breaking-sec',
        'settings' => 'plip-breaking-tag2'
    ));
    $wp_customize->add_setting('plip-breaking-headline2');
    $wp_customize->add_control('plip-breaking-headline2-control', array(
        'label' => 'story 2 headline',
        'type' => 'string',
        'section' => 'plip-breaking-sec',
        'settings' => 'plip-breaking-headline2'
    ));
    $wp_customize->add_setting('plip-breaking-blurb2');
    $wp_customize->add_control('plip-breaking-blurb2-control', array(
        'label' => 'story 2 blurb',
        'type' => 'string',
        'section' => 'plip-breaking-sec',
        'settings' => 'plip-breaking-blurb2'
    ));
    $wp_customize->add_setting('plip-breaking-right2');
    $wp_customize->add_control('plip-breaking-right2-control', array(
        'label' => 'story 2 right column content as comma-separated (no spaces!) list, e.g. "social-media,commentary,multimedia". Default is just social-media.',
        'type' => 'string',
        'section' => 'plip-breaking-sec',
        'settings' => 'plip-breaking-right2'
    ));
}

add_action('customize_register', 'plip_ads');

function plip_ytstrip($wp_customize)
{
    $wp_customize->add_section('plip-ytstrip-sec', array(
        'title' => 'Home Strip'
    ));
    $wp_customize->add_setting('plip-yt-title');
    $wp_customize->add_setting('plip-yt-id');
    $wp_customize->add_setting('plip-a8-title');
    $wp_customize->add_control('plip-yt-title', array(
        'label' => 'Home Strip YouTube Title',
        'section' => 'plip-ytstrip-sec'
    ));
    $wp_customize->add_control('plip-yt-id', array(
        'label' => 'Home Strip YouTube ID',
        'section' => 'plip-ytstrip-sec'
    ));
    $wp_customize->add_control('plip-a8-title', array(
        'label' => 'Home Strip Eighth Page Title',
        'section' => 'plip-ytstrip-sec'
    ));
}

add_action('customize_register', 'plip_ytstrip');

function catch_that_image()
{
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches[1][0];

    if (empty($first_img)) { //Defines a default image
        $first_img = false;
    }
    return $first_img;
}

function custom_excerpt_length($length)
{
    return 20;
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);

function custom_excerpt_more($more)
{
    return '...';
}

add_filter('excerpt_more', 'custom_excerpt_more');

add_filter('parse_query', 'ba_admin_posts_filter');
add_action('restrict_manage_posts', 'ba_admin_posts_filter_restrict_manage_posts');

function ba_admin_posts_filter($query)
{
    global $pagenow;
    if (is_admin() && $pagenow == 'edit.php' && isset($_GET['ADMIN_FILTER_FIELD_NAME']) && $_GET['ADMIN_FILTER_FIELD_NAME'] != '') {
        $query->query_vars['meta_key'] = $_GET['ADMIN_FILTER_FIELD_NAME'];
        if (isset($_GET['ADMIN_FILTER_FIELD_VALUE']) && $_GET['ADMIN_FILTER_FIELD_VALUE'] != '')
            $query->query_vars['meta_value'] = $_GET['ADMIN_FILTER_FIELD_VALUE'];
    }
}

function ba_admin_posts_filter_restrict_manage_posts()
{
    global $wpdb;
    $sql = 'SELECT DISTINCT meta_key FROM ' . $wpdb->postmeta . ' ORDER BY 1';
    $fields = $wpdb->get_results($sql, ARRAY_N);
    ?>
    <select name="ADMIN_FILTER_FIELD_NAME">
        <option value=""><?php _e('Filter By Custom Fields', 'baapf'); ?></option>
        <?php
        $current = isset($_GET['ADMIN_FILTER_FIELD_NAME']) ? $_GET['ADMIN_FILTER_FIELD_NAME'] : '';
        $current_v = isset($_GET['ADMIN_FILTER_FIELD_VALUE']) ? $_GET['ADMIN_FILTER_FIELD_VALUE'] : '';
        foreach ($fields as $field) {
            if (substr($field[0], 0, 1) != "_") {
                printf(
                    '<option value="%s"%s>%s</option>',
                    $field[0],
                    $field[0] == $current ? ' selected="selected"' : '',
                    $field[0]
                );
            }
        }
        ?>
    </select> <?php _e('Value:', 'baapf'); ?><input type="TEXT" name="ADMIN_FILTER_FIELD_VALUE"
                                                    value="<?php echo $current_v; ?>" />
    <?php

}

function catsNoFeatured()
{
    foreach (get_the_category() as $c) {
        if (!in_array($c->name, ["Winter Sports", "Spring Sports", "Fall Sports", "Featured Posts"])) { ?>
        <a href='<?php echo get_category_link($c->cat_ID) ?>'>
            <?php echo $c->name; ?></a><?php
        }
    }
}

function catsSports()
{
    foreach (get_the_category() as $c) {
        if (!in_array($c->name, ["Sports", "Winter Sports", "Spring Sports", "Fall Sports", "Featured Posts"])) { ?>
        <a href='<?php echo get_category_link($c->cat_ID) ?>'>
            <?php echo $c->name; ?></a><?php
        }
    }
}

function the_scorebox()
{
    $excerpt = get_the_content();
    $scoreboxtrue = preg_match("/\[scorebox\](.*)\[\/scorebox\]/", $excerpt, $matches);
    if ($scoreboxtrue) {
        echo do_shortcode($matches[0]);
    }
}

function catMulti()
{
    foreach (get_the_category() as $c) {
        if (!in_array($c->name, ["Multilingual"])) { ?>
        <a href='<?php echo get_category_link($c->cat_ID) ?>'>
            <?php echo $c->name; ?></a><?php
        }
    }

}

function time_elapsed_string($datetime)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        // 's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

?>