<div class='multilingual-grid'>
    <?php
    $childcats = get_categories('child_of=' . get_cat_ID("Multilingual"));
    foreach ($childcats as $childcat) {
        $childcatname = $childcat->cat_name;
        preg_match("/\((.*?)\)/", $childcatname, $array);
        $translated_name = $array[1];
        preg_match("/(.*?)\(/", $childcatname, $array);
        $childcatname = $array[1];
        ?>
    <a href='<?php echo get_category_link($childcat); ?> ' class='multilingual-grid-item'>
        <?php echo "<div class='lang-label-1'><span>" . $childcatname . "</span></div>";
            echo "<div class='lang-label-2'><span>" . $translated_name . "</span></div>"; ?>
    </a>
    <?php
    }
    ?>
</div>