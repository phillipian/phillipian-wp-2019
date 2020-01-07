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


    <?php if ($the_query->have_posts()) : ?>
        <div class="category-posts-container">
            <?php while ($the_query->have_posts()) : $the_query->the_post();
                $archive = true;
                include 'includes/include-article-item.php';
            endwhile; ?>
        </div>

        <script>
            var $grid = $(".category-posts-container").masonry({
                itemSelector: '.article-item',
                percentPosition: true,
                gutter: 36,
                horizontalOrder: true,
                columnWidth: '.article-item'
            });
            $grid.imagesLoaded(function () {
                $grid.masonry();
            });
        </script>
    <?php else : ?>
        <p>No results found.</p>
    <?php
    endif; ?>
</div>
<?php get_footer(); ?> 