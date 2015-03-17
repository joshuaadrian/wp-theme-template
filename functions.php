<?php

// LOGGING FUNCTION
if ( !function_exists('_log') ) {

  function _log( $message ) {
    if ( WP_DEBUG === true ){
      if ( is_array( $message ) || is_object( $message ) ) {
        error_log( print_r( $message, true ) );
      } else {
        error_log( $message );
      }
    }
  }

}

// REQUIRE CLASSES
require_once( 'classes/Project.php' );

if ( is_admin() ) { 
  require_once( 'classes/ProjectAdmin.php' );
}

// REQUIRE EXTENSIONS
// require_once( 'extensions/shortcodes/example_shortcode.php' );