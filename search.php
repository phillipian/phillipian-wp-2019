<?php get_header(); ?>

<?php
global $query_string;
$query_args = explode("&", $query_string);
$search_query = array();

foreach ($query_args as $key => $string) {
    $query_split = explode("=", $string);
    $search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

$the_query = new WP_Query($search_query);
?>

<div class='category-container'>
    <h1>
        Search results for "<?php echo the_search_query() ?>"
    </h1>
    <?php if ($the_query->have_posts()): while ($the_query->have_posts()): $the_query->the_post(); ?>
    <div class='article-item'>
        <h2><a href='<?php the_permalink(); ?>'>
                <?php the_title(); ?>
            </a></h2>
        <div class=' article-text'>
            <div class='article-author'><span>By
                    <?php the_author(); ?></span></div>
            <?php the_excerpt(); ?>
        </div>
        <div class='article-image'><img src='<?php echo catch_that_image() ?>'></div>
    </div>
    <?php endwhile; else: ?>
<p>No results found.</p>
<? endif; ?>
</div>
<?php get_footer(); ?> 