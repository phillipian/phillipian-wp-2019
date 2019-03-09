<div class='ad single-ad'>
    <img src='<?php echo wp_get_attachment_url(get_theme_mod('plip-ad-single1', null)); ?>'>
</div>
<?php include 'related-include.php' ?>
<div class='ad single-ad'>
    <img src='<?php echo wp_get_attachment_url(get_theme_mod('plip-ad-single2', null)); ?>'>
</div>
<?php
$strip_link = 'subscribe';
$strip_img_url = get_template_directory_uri() . '/images/subscribe.png';
$strip_main = 'Support student journalism and get the latest Andover news delivered to your mailbox';
$small = true;
$strip_tag = '';
$complex = false;
include 'home-strip-include.php';
?>
<div class='strip-item strip-complex'>
    <?php
    $strip_link = '';
    $strip_img_url = get_template_directory_uri() . '/images/maillist.png';
    $strip_main = 'Sign up for our weekly newsletter';
    $strip_tag = '';
    $small = true;
    $complex = true;
    include 'home-strip-include.php';
    $strip_link = '';
    $strip_img_url = get_template_directory_uri() . '/images/write.png';
    $strip_main = 'Write for <i>The Phillipian</i>';
    $strip_tag = '';
    include 'home-strip-include.php';
    ?>
</div> 