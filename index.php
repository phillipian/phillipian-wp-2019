<?php get_header();?>

/*
<?php
if(have_posts()):
  while(have_posts()): the_post(); ?>

  <h3><?php the_title();?></h3>
  <p>Posted on: <?php the_time('F j, Y')?> at <?php the_time('g:i a')?><?php the_category();?></p>
  <p><?php the_content();?></p>
<?php endwhile; endif; ?>
*/

<div class ='above-fold-articles'>
  <div class='art-group' id='news'>
    <h2 class='section-header'>News</h2>

    <div class='article news-2'>
      <div class='article-body'>
        <p class='author'>Sophia Lee and Zaina Qamar</p>
        <h3>After 29 Issues, CXLI Bids Farewell To The Newsroom</h3>
        <p>This is the first issue of The Phillipian vol. CXLII, with the former board of Editors, Managers, and Upper Management having officially left the newsroom.</p>
      </div>
      <div class='img-container'><img src='https://i2.wp.com/phillipian.net/wp-content/uploads/2019/02/hsolomon.BYECXLI-1.jpg'></div>
    </div>

  </div>
  <div class='art-group' id='commentary'>
    <h2 class='section-header'>Commentary</h2>
    <div class='article comm-2'>
      <div class='article-body'>
        <p class='author'>Riley Gillis</p>
        <h3>Anxiety All Around AndOver</h3>
        <p>Anxiety haunted my every move and filled my head with a crippling self-doubt that overflowed into my every thought.</p>
      </div>
      <div class='img-container'><img src='https://i1.wp.com/phillipian.net/wp-content/uploads/2019/02/0.jpg'></div>
    </div>
    <div class='article comm-2'>
      <div class='article-body'>
        <p class='author'>Miraya Bhayani</p>
        <h3>More Than A Score</h3>
        <p>Getting  a 1600 on the SAT is something that ranks highly on an Andover student’s bucket list.</p>
      </div>
      <div class='img-container'><img src='https://i0.wp.com/phillipian.net/wp-content/uploads/2019/02/IMG_0132.jpg?w=395'></div>
    </div>
    <div class='article comm-2'>
      <div class='article-body'>
        <p class='author'>Miraya Bhayani</p>
        <h3>More Than A Score</h3>
        <p>Getting  a 1600 on the SAT is something that ranks highly on an Andover student’s bucket list.</p>
      </div>
      <!--<div class='img-container'><img src='https://i0.wp.com/phillipian.net/wp-content/uploads/2019/02/IMG_0132.jpg?w=395'></div>-->
    </div>
  </div>
  </div>
</div>


<?php get_footer();?>
