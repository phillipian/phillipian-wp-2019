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
    <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
    $archive = true;
    include 'includes/include-article-item.php';
    endwhile;
else : ?>
    <p>No results found.</p>
    <?php
endif; ?>
</div>
<?php get_footer(); ?> 