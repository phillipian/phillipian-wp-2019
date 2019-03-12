<?php get_header(); ?>
<div class='lotw-container'>
    <div class='lotw-text'>
        <h1><?php single_cat_title();?></h1>
        <?php echo category_description();?>
    </div>
    <div class='lotw-inner'>
        <div class="lotw-sizer"></div>

        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post(); ?>
        <div class='lotw-item'>
            <a class='lotw-outer-link' href='<?php the_permalink(); ?>'>
                <img src='<?php echo catch_that_image() ?>'>
            </a>
            <div class='lotw-descript'>
                <div class='lotw-descript-inner'>
                    <h2><a href='<?php the_permalink(); ?>'><?php
                                                            $title = get_the_title();
                                                            preg_match("/(?<=Look of the Week: )(.*)/", $title, $array);
                                                            echo $array[0];
                                                            ?></a></h2>
                    <div class='lotw-date'><span><?php the_time(get_option('date_format')); ?></span></div>
                </div>
            </div>
        </div>
        <?php 
    }
} ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(".lotw-outer-link").on("click", function(event) {
        if (window.matchMedia("(pointer: coarse)").matches) {
            event.preventDefault();
            console.log("test");
        }
    });
</script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
    var $grid = $(".lotw-inner").masonry({
        itemSelector: '.lotw-item',
        percentPosition: true,
        columnWidth: '.lotw-sizer'
    });
    $grid.imagesLoaded(function() {
        $('.lotw-item').each(function(_, img) {
            var $this = $(this);

            if ($this.height() / $this.width() < 0.9) {
                $this.addClass("lotw-wide");
            }
        });
        $grid.masonry();
    });
</script>
<?php get_footer(); ?> 