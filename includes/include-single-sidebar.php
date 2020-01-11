<?php
$adarea = 'plip-ad-single1';
$adclass = 'single-ad';
include 'include-ad.php';

if (!(has_category("hidden"))){
    include 'include-related-posts.php';
}

$adarea = 'plip-ad-single2';
$adclass = 'single-ad';
include 'include-ad.php';
?>
<div class='article-about-top'></div>
<?php include "include-sidebar-strip.php" ?>