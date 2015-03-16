<?php

/**
 * Project Theme Controller
 *
 * Class that handles all front end theme functionality.
 *
 * @class     WP_Project
 * @version   1.0.0
 * @package   lifetouch/assets/classes
 * @category  Class
 * @author    Someone
 */

if ( !class_exists('WP_Project') ) {

  class WP_Project {

    public $is_prod;

    public function __construct() {

      // DEFAULT ENV VARIABLES
      $this->is_prod = strpos( $_SERVER['SERVER_NAME'], "project.com" ) !== false ? true : false;

      // add_action( 'some_action', array( $this, 'example_function' ) );
      
    }

    
    public function example_function( $classes ) {

      // Code goes here

    }

  }

  $project = new WP_Project();

}