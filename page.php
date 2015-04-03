<?php get_header(); ?>

<?php

if ( have_posts() ) {

  while ( have_posts() ) {

    the_post(); 

    // Post content here

  }

}

?>

<?php get_footer(); ?>