<div class='<?php if ($complex){echo "strip-complex-item";}else{echo "strip-item";}?>'>
    <a href='<?php echo $strip_link ?>'>
        <div class='strip-square'>
            <img src='<?php echo $strip_img_url ?>'>
        </div>
    </a>
    <a href='<?php echo $strip_link ?>'>
        <div class='strip-text'>
            <div class='strip-tag'><span><?php echo $strip_tag ?></span></div>
            <div class='<?php if ($small){echo "strip-sub";}else{echo "strip-main";}?>'><span><?php echo $strip_main ?></span></div>
        </div>
    </a>
</div> 