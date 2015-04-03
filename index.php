<?php get_header(); ?>

<?php if ( have_posts() ) {

  while ( have_posts() ) {

    the_post(); 

    // Post content here

  } ?>

  <div class="navigation">
    <div class="alignleft"><?php previous_posts_link('&laquo; Previous Entries') ?></div>
    <div class="alignright"><?php next_posts_link('Next Entries &raquo;','') ?></div>
  </div>

<?php } else { ?>
  
  <p>Sorry, but you are looking for something that isn't here.</p>

<?php } ?>

<?php get_footer(); ?>