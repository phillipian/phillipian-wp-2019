<?php

add_filter('use_block_editor_for_post', '__return_false', 10);

function media_credit_sc($atts, $content = null)
{
  $a = shortcode_atts(array(
    'name' => 'The Phillipian',
  ), $atts);
  preg_match("/<img(.*)\/>/", $content, $array1);
  return "<div class='single-image'>" . $array1[0] . "<div class='media-credit'><span>" . $a['name'] . '</span></div></div><p></p>';
}

add_shortcode('media-credit', 'media_credit_sc');

function caption_override_sc($atts, $content = null)
{
  preg_match("/\[media\-credit(.*)\[\/media-credit\]/", $content, $array2);
  preg_match("/(?<=\[\/media-credit\])(.*)/", $content, $array3);
  return "<div class='single-image'>" . do_shortcode($array2[0]) . "<div class='single-image-caption'><span>" . $array3[0] . "</span></div></div><p></p>";
}

add_shortcode('caption', 'caption_override_sc');

function scorebox_sc($atts, $content = null){
  $scores = explode(",", $content);
  $retval = "";
  foreach ($scores as $score){
    $scoresplit = explode(":", $score);
    $retval = $retval."
      <div class='score-name'><span>".$scoresplit[0]."</span></div>
      <div class='score-num'><span>".$scoresplit[1]."</span></div>";
  }
  return "<div class='score-box'>".$retval."</div>";
}

add_shortcode('scorebox', 'scorebox_sc');

function jetpackme_remove_rp()
{
  if (class_exists('Jetpack_RelatedPosts')) {
    $jprp = Jetpack_RelatedPosts::init();
    $callback = array($jprp, 'filter_add_target_to_dom');
    remove_filter('the_content', $callback, 40);
  }
}
add_filter('wp', 'jetpackme_remove_rp', 20);

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
  $wp_customize->add_setting('plip-ad-single1');
  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'plip-ad-single1-control', array(
    'label' => 'Single Ad 1',
    'section' => 'plip-ad-sec',
    'settings' => 'plip-ad-single1',
    'width' => 300,
    'height' => 250
  )));
  $wp_customize->add_setting('plip-ad-single2');
  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'plip-ad-single2-control', array(
    'label' => 'Single Ad 2',
    'section' => 'plip-ad-sec',
    'settings' => 'plip-ad-single2',
    'width' => 300,
    'height' => 250
  )));
}

add_action('customize_register', 'plip_ads');

function plip_ytstrip($wp_customize)
{
  $wp_customize->add_section('plip-ytstrip-sec', array(
    'title' => 'Home Strip'
  ));
  $wp_customize->add_setting('plip-yt-title');
  $wp_customize->add_setting('plip-yt-link');
  $wp_customize->add_setting('plip-yt-thumb');
  $wp_customize->add_setting('plip-a8-title');
  $wp_customize->add_control('plip-yt-title', array(
    'label' => 'Home Strip YouTube Title',
    'section' => 'plip-ytstrip-sec'
  ));
  $wp_customize->add_control('plip-yt-link', array(
    'label' => 'Home Strip YouTube Link',
    'section' => 'plip-ytstrip-sec'
  ));
  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'plip-yt-thumb-control', array(
    'label' => 'Home Strip YouTube Thumb',
    'section' => 'plip-ytstrip-sec',
    'settings' => 'plip-yt-thumb',
    'width' => 300,
    'height' => 300
  )));
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
</select> <?php _e('Value:', 'baapf'); ?><input type="TEXT" name="ADMIN_FILTER_FIELD_VALUE" value="<?php echo $current_v; ?>" />
<?php

}