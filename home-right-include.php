<div class='home-sects-right'>
    <?php

    include "sidebar-strip-include.php";

    $adclass = 'home-side-ad';
    $adarea = 'plip-ad-homesmall';
    include 'ad-include.php';

    ?>

    <div class='article-about-top'></div>
    <h3><span style='color: rgba(0,0,0,0.4); font-weight: 400'>Latest video:</span> <?php echo get_theme_mod('plip-yt-title', "No Video Featured"); ?>"</h3>
    <div class='yt-container'><iframe src='https://www.youtube.com/embed/<?php echo get_theme_mod('plip-yt-id', ''); ?>?modestbranding=1' frameborder='0' allowfullscreen></iframe></div>
    <p><a class='sect-more' href='https://www.youtube.com/user/phillipianvideo'> <i>The Phillipian</i> on <i class="fab fa-youtube"></i> ></a></p>

    <div class='article-about-top'></div>
    <h3>Multilingual</h3>
    <?php include "multilingual-grid-include.php" ?>
</div>