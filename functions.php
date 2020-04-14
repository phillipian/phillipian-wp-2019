<?php

add_filter('use_block_editor_for_post', '__return_false', 10);

function custom_media_credit( $string, $atts, $content = null )
{
// get name and ID attributes from media-credit shortcode, with Phillipian-specific defaults
    $a = shortcode_atts(array(
        'name' => 'The Phillipian',
        'id' => 'none'
    ), $atts);

// generate proper credit text
    if ($a['id'] == 'none') {
        $credit = $a['name'];
    } else {
        $authorname = get_the_author_meta('user_firstname', $a['id']) . " " . get_the_author_meta('user_lastname', $a['id']);
        $authorlink = get_author_posts_url($a['id']);
        $credit = "<a href='" . $authorlink . "'>" . $authorname . "/The Phillipian</a>";
    }

// get the actual image enclosed
    preg_match("/<img(.*)\/>/", $content, $array1);

    return "<div class='wp-caption'>" . $array1[0] . "<div class='media-credit'><span>" . $credit . "</span></div></div><p></p>";
}

add_filter('media_credit_shortcode', 'custom_media_credit', 10, 3);

// CUSTOM SCOREBOX SHORTCODE

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

add_shortcode('scorebox', 'scorebox_sc');

// CAPTION SHORTCODE OVERRIDE

function caption_override_sc($atts, $content = null)
{
    // for some reason default shortcode doesn't work with media-credit
    preg_match("/\[media\-credit(.*)\[\/media-credit\]/", $content, $array2);
    preg_match("/(?<=\[\/media-credit\])(.*)/", $content, $array3);
    return "<div class='wp-caption'>" . do_shortcode($array2[0]) . "<p class='wp-caption-text' >" . $array3[0] . "</p></div>";
}

function override_image_shortcodes(){
    remove_shortcode('caption');
    add_shortcode('caption', 'caption_override_sc');
}

add_action('wp_loaded', 'override_image_shortcodes');

// CUSTOM IMGGALLERY SHORTCODE

function imggallery_sc($atts, $content = null)
{
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

// CUSTOM YTEMBED SHORTCODE

function ytembed_sc($atts, $content = null)
{
    return "<div class='wp-caption'><div class='yt-container'><iframe src='https://www.youtube.com/embed/" . $content . "'></iframe></div></div>";
}

add_shortcode('ytembed', 'ytembed_sc');

// LOTW-INTERACTIVE SHORTCODE

function lotw_interactive_sc($atts, $content = null)
{
    return '<div class="lotw-interactive-container">' . do_shortcode($content) . '</div>';
}

function lotw_interactive_descript_sc($atts, $content = null){
    $a = shortcode_atts(array(
        'left' => 0,
        'top' => 0,
        'index' => 0
    ), $atts);
    return '<div class="lotw-interactive-marker" style="left:' . $a['left'] . "%; top:" . $a['top'] . '%;" data-ind="' . $a['index'] . '"></div>' . '<div class="lotw-interactive-descript" data-ind="' . $a['index'] . '"><div class="lotw-interactive-close">close</div>' . do_shortcode($content) . '</div><script src="' . get_template_directory_uri() . '/js/lotw-interactive.js"></script>' ;
}

add_shortcode('lotw-interactive', 'lotw_interactive_sc');
add_shortcode('descript', 'lotw_interactive_descript_sc');

// JETPACK RELATED POSTS

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

// INCLUDE CSS, JS

function plip_script_enqueue()
{
    // wp_enqueue_style(string $handle, mixed $src, array $deps, mixed $ver, string $media);
    wp_enqueue_style('plip-main', get_template_directory_uri() . '/css/plip.css', array(), null, 'all');
    wp_enqueue_style('plip-navbar', get_template_directory_uri() . '/css/navbar.css', array(), null, 'all');
    wp_enqueue_style('plip-article-item', get_template_directory_uri() . '/css/article-item.css', array(), null, 'all');
    wp_enqueue_style('plip-home', get_template_directory_uri() . '/css/home.css', array(), null, 'all');
    wp_enqueue_style('plip-home-breaking-news', get_template_directory_uri() . '/css/home-breaking-news.css', array(), null, 'all');
    wp_enqueue_style('plip-list-reset', get_template_directory_uri() . '/css/list-reset.css', array(), null, 'all');
    wp_enqueue_style('plip-about', get_template_directory_uri() . '/css/about.css', array(), null, 'all');
    wp_enqueue_style('plip-home-strip', get_template_directory_uri() . '/css/home-strip.css', array(), null, 'all');
    wp_enqueue_style('plip-subscribe', get_template_directory_uri() . '/css/subscribe.css', array(), null, 'all');
    wp_enqueue_style('plip-single', get_template_directory_uri() . '/css/single.css', array(), null, 'all');
    wp_enqueue_style('plip-sports', get_template_directory_uri() . '/css/sports.css', array(), null, 'all');
    wp_enqueue_style('plip-author', get_template_directory_uri() . '/css/author.css', array(), null, 'all');
    wp_enqueue_style('plip-archive', get_template_directory_uri() . '/css/archive.css', array(), null, 'all');
    wp_enqueue_style('plip-fontface', get_template_directory_uri() . '/css/fonts/fontface.css', array(), null, 'all');
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/section-dropdown.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'plip_script_enqueue');
add_theme_support('post-thumbnails');

// SET UP MENUS

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

function plip_customize_ads($wp_customize)
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
        'height' => 200,
        'flex-width' => true,
        'flex-height' => true
    )));
    $wp_customize->add_setting('plip-ad-homewide-url');
    $wp_customize->add_control('plip-ad-homewide-url', array(
        'label' => 'Home Wide Ad Link',
        'type' => 'url',
        'section' => 'plip-ad-sec',
        'settings' => 'plip-ad-homewide-url'
    ));
    $wp_customize->add_setting('plip-ad-homewide-2');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'plip-ad-homewide-2-control', array(
        'label' => 'Home Wide Ad 2',
        'section' => 'plip-ad-sec',
        'settings' => 'plip-ad-homewide-2',
        'width' => 1200,
        'height' => 200,
        'flex-width' => true,
        'flex-height' => true
    )));
    $wp_customize->add_setting('plip-ad-homewide-2-url');
    $wp_customize->add_control('plip-ad-homewide-2-url', array(
        'label' => 'Home Wide Ad 2 Link',
        'type' => 'url',
        'section' => 'plip-ad-sec',
        'settings' => 'plip-ad-homewide-2-url'
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
    $wp_customize->add_setting('plip-ad-homesmall-2');
    $wp_customize->add_control(new WP_Customize_Media_control($wp_customize, 'plip-ad-homesmall-2-control', array(
        'label' => 'Home Small Ad 2',
        'section' => 'plip-ad-sec',
        'settings' => 'plip-ad-homesmall-2',
        'width' => 300,
        'height' => 250,
        'flex-width' => true,
        'flex-height' => true
    )));
    $wp_customize->add_setting('plip-ad-homesmall-2-url');
    $wp_customize->add_control('plip-ad-homesmall-2-url-control', array(
        'label' => 'Home Small Ad 2 Link',
        'type' => 'url',
        'section' => 'plip-ad-sec',
        'settings' => 'plip-ad-homesmall-2-url'
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
}

add_action('customize_register', 'plip_customize_ads');

function plip_customize_home($wp_customize)
{
    $wp_customize->add_section('plip-home-sec', array(
        'title' => 'Home Custom Settings'
    ));
    $wp_customize->add_setting('plip-home-style', array(
        'default' => 'none'
    ));
    $wp_customize->add_control('plip-home-style-control', array(
        'label' => 'Homepage style',
        'type' => 'select',
        'choices' => array(
                'none' => 'None: Hide Top Posts & Lede [i.e. if you want just breaking news]',
                'horizontal' => 'Top Posts & Single Lede Story, Horizontal Image, Image First',
                'horizontal-headline' => 'Top Posts & Single Lede Story, Horizontal Image, Headline First',
                'horizontal-overlay' => 'Top Posts & Single Lede Story, Horizontal Image, Headline Overlayed',
                'vertical' => 'Top Posts & Single Lede Story, Vertical Image',
                'text' => '[WIP don\'t use yet] Top Posts & Single Lede Story, Text Blurb'
        ),
        'section' => 'plip-home-sec',
        'settings' => 'plip-home-style'
    ));
    $wp_customize->add_setting('plip-home-views-check');
    $wp_customize->add_control('plip-home-views-check-control', array(
        'label' => 'show viewcounts for popular posts?',
        'type' => 'checkbox',
        'section' => 'plip-home-sec',
        'settings' => 'plip-home-views-check'
    ));
    $wp_customize->add_setting('plip-home-left');
    $wp_customize->add_control('plip-home-left-control', array(
       'label' => 'Left column categories',
       'type' => 'string',
       'section' => 'plip-home-sec',
       'settings' => 'plip-home-left'
    ));
    $wp_customize->add_setting('plip-home-right');
    $wp_customize->add_control('plip-home-right-control', array(
        'label' => 'Left column categories',
        'type' => 'string',
        'section' => 'plip-home-sec',
        'settings' => 'plip-home-right'
    ));
    $wp_customize->add_setting('plip-home-sect-num', array(
        'default' => 5
    ));
    $wp_customize->add_control('plip-home-sect-num-control', array(
        'label' => 'Number of posts per section',
        'type' => 'number',
        'section' => 'plip-home-sec',
        'settings' => 'plip-home-sect-num'
    ));
    $wp_customize->add_setting('plip-home-pop-num', array(
        'default' => 3
    ));
    $wp_customize->add_control('plip-home-pop-num-control', array(
        'label' => 'Number of popular posts to display',
        'type' => 'number',
        'section' => 'plip-home-sec',
        'settings' => 'plip-home-pop-num'
    ));
    $wp_customize->add_setting('plip-home-pop-weeks', array(
        'default' => 4
    ));
    $wp_customize->add_control('plip-home-pop-weeks-control', array(
        'label' => 'Period of time to draw popular posts from (past x weeks)',
        'type' => 'number',
        'section' => 'plip-home-sec',
        'settings' => 'plip-home-pop-weeks'
    ));
    $wp_customize->add_setting('plip-banner-check');
    $wp_customize->add_control('plip-banner-check-control', array(
        'label' => 'show top banner?',
        'type' => 'checkbox',
        'section' => 'plip-home-sec',
        'settings' => 'plip-banner-check'
    ));
    $wp_customize->add_setting('plip-banner-blurb');
    $wp_customize->add_control('plip-banner-blurb-control', array(
        'label' => 'top banner text',
        'type' => 'string',
        'section' => 'plip-home-sec',
        'settings' => 'plip-banner-blurb'
    ));
    $wp_customize->add_setting('plip-banner-link');
    $wp_customize->add_control('plip-banner-link-control', array(
        'label' => 'top banner link',
        'type' => 'string',
        'section' => 'plip-home-sec',
        'settings' => 'plip-banner-link'
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
    $wp_customize->add_setting('plip-breaking-left1');
    $wp_customize->add_control('plip-breaking-left1-control', array(
        'label' => 'story 1 left column content as comma-separated (no spaces!) list, e.g. "news,multimedia". Default is just news.',
        'type' => 'string',
        'section' => 'plip-breaking-sec',
        'settings' => 'plip-breaking-left1'
    ));
    $wp_customize->add_setting('plip-breaking-right1');
    $wp_customize->add_control('plip-breaking-right1-control', array(
        'label' => 'story 1 right column content as comma-separated (no spaces!) list, e.g. "social-media,commentary,commentary-call". Default is just social-media.',
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
    $wp_customize->add_setting('plip-breaking-left2');
    $wp_customize->add_control('plip-breaking-left2-control', array(
        'label' => 'story 2 left column content as comma-separated (no spaces!) list, e.g. "news,multimedia". Default is just news.',
        'type' => 'string',
        'section' => 'plip-breaking-sec',
        'settings' => 'plip-breaking-left2'
    ));
    $wp_customize->add_setting('plip-breaking-right2');
    $wp_customize->add_control('plip-breaking-right2-control', array(
        'label' => 'story 2 right column content as comma-separated (no spaces!) list, e.g. "social-media,commentary,multimedia". Default is just social-media.',
        'type' => 'string',
        'section' => 'plip-breaking-sec',
        'settings' => 'plip-breaking-right2'
    ));
}

add_action('customize_register', 'plip_customize_home');

// WordPress Popular Posts Custom HTML

function custom_wpp_markup($popular_posts, $instance){
    foreach ($popular_posts as $popular_post){
        $currpost = $popular_post->id;
        $sect = true;
        $views = $popular_post->pageviews;
        include 'includes/include-article-item.php';
        $views = null;
    }
}

add_filter( 'wpp_custom_html', 'custom_wpp_markup', 10, 2 );

// IMAGE GRABBING FUNCTION (not mine)

function catch_that_image($post_id)
{
    $post = get_post($post_id);
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches[1][0];

    if (empty($first_img)) {
        // see if it's just an issue with image not having quotes, not necessarily missing them entirely
        $output = preg_match_all('<img.+src=([^\'"\s]+)[\'"\s].*>', $post->post_content, $matches);
        $first_img = $matches[1][0];
        if (empty($first_img)){
            $first_img = false;
        }
    }
    return $first_img;
}

function get_lede_credit($post_id){ // this needs much more logic
    $content = get_post_field('post_content', $post_id);

    $block = '';
    preg_match('/\media-credit(.*?)\]/', $content, $block);
    $block = $block[1];

    $matches = '';
    if (preg_match('/(id=("?|\'?))(.*?)("?\s|"?$)/', $block, $matches)){
        return intval($matches[3]);
    }
    else{
        preg_match('/name=(\"|\')(.*?)(\"|\')/',$content,$matches);
        return $matches[2];
    }
}

// Code from https://www.wordpressaddicted.com/wordpress-get-tag-id-by-tag-name/:

function get_tag_ID($tag_name) {
    $tag = get_term_by('name', $tag_name, 'post_tag');
    if ($tag) {
        return $tag->term_id;
    } else {
        return 0;
    }
}

function custom_excerpt_length($length)
{
    return 80;
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);

function custom_excerpt_more($more)
{
    return '...';
}

add_filter('excerpt_more', 'custom_excerpt_more');

function sz_stripall($str){
    return wp_strip_all_tags(strip_shortcodes($str));
}

// Code from https://stackoverflow.com/a/12445298

function get_snippet( $str, $wordCount = 10 ) {
    return implode(
        '',
        array_slice(
            preg_split(
                '/([\s,\.;\?\!]+)/',
                $str,
                $wordCount*2+1,
                PREG_SPLIT_DELIM_CAPTURE
            ),
            0,
            $wordCount*2-1
        )
    );
}

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

// CATEGORY FUNCTIONS

function catsNoFeatured($catname, $post_id)
{
    foreach (get_the_category($post_id) as $c) {
        if (!in_array($c->name, ["Winter Sports", "Spring Sports", "Fall Sports", "Featured Posts", "lede", $catname])) { ?>
        <a href='<?php echo get_category_link($c->cat_ID) ?>'>
            <?php echo $c->name; ?></a><?php
        }
    }
}

function catsSports($post_id)
{
    foreach (get_the_category($post_id) as $c) {
        if (!in_array($c->name, ["Sports", "Winter Sports", "Spring Sports", "Fall Sports", "Featured Posts", "lede"])) { ?>
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

function catMulti($post_id)
{
    foreach (get_the_category($post_id) as $c) {
        if (!in_array($c->name, ["Multilingual"])) { ?>
        <a href='<?php echo get_category_link($c->cat_ID) ?>'>
            <?php echo $c->name; ?></a><?php
        }
    }
}

?>