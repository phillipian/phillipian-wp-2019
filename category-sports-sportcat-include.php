<?php foreach (get_the_category() as $c) {
    $ctrue = preg_match('/\&gt\;/', $c->name, $matches);
    if ($ctrue) {
        $exploded = explode("&gt;", $c->name);
        ?>
<a href='<?php echo get_category_link($c->cat_ID) ?>'><?php echo end($exploded); ?></a>
<?
}
}
