<?php get_header();?>

<?php
if(have_posts()):
  while(have_posts()): the_post(); ?>

  <h3><?php the_title();?></h3>
  <p>Posted on: <?php the_time('F j, Y')?> at <?php the_time('g:i a')?><?php the_category();?></p>
  <p><?php the_content();?></p>
<?php endwhile; endif; ?>


<?php get_footer();?>
