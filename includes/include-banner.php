<div class='banner'>
    <?php
    $strip_link = home_url() . '/subscribe';
    $strip_img_url = get_template_directory_uri() . '/images/subscribe.png';
    $strip_main = 'Support student journalism and get the latest Andover news delivered to your mailbox';
    ?>
    <div class="subscribe-item">
        <a href='<?php echo $strip_link ?>'>
        <img class="strip-square" src='<?php echo $strip_img_url ?>'>
        </a>
        <span class="banner-text">
            <a href='<?php echo $strip_link ?>'>
                <?php echo $strip_main ?>
            </a>
        </span>
    </div>
    <div class='strip-item strip-complex'>
        <?php
            $strip_link = home_url() . '/newsletter-subscribe';
            $strip_img_url = get_template_directory_uri() . '/images/maillist.png';
            $strip_main = 'Sign up for our weekly newsletter';
            $strip_tag = '';
            $small = true;
            $complex = true;
            include 'include-sidebar-strip-item.php';
            $strip_link = home_url() . '/join';
            $strip_img_url = get_template_directory_uri() . '/images/write.png';
            $strip_main = 'Write for <i>The Phillipian</i>';
            $strip_tag = '';
            include 'include-sidebar-strip-item.php';
        ?>
    </div>
</div>
