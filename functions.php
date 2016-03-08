<?php

/*  Menu Support
/* ------------------------------------ */ 

	add_action( 'init', 'my_custom_menus' );
	  function my_custom_menus() {
	     register_nav_menus(
	        array(
	  		'primary-menu' => __( 'Primary Menu' ),
	  		'secondary-menu' => __( 'Secondary Menu' )
	                )
	         );
	  }

/*  Remove Admin Bar
/* ------------------------------------ */ 
	add_filter('show_admin_bar', '__return_false');


/*  Enqueue scripts
/* ------------------------------------ */ 
	function wpb_adding_scripts() {
	  wp_register_script('jquery', get_stylesheet_directory_uri() . '/bower_components/jquery/dist/jquery.js');
	  wp_register_script('what', get_stylesheet_directory_uri() . '/bower_components/what-input/what-input.js');
	  wp_register_script('foundation', get_stylesheet_directory_uri() . '/bower_components/foundation-sites/dist/foundation.js');
	  wp_register_script('app', get_stylesheet_directory_uri() . '/js/app.js');

	  wp_enqueue_script('jquery');
	  wp_enqueue_script('what');
	  wp_enqueue_script('foundation');
	  wp_enqueue_script('app');
	}
	add_action( 'wp_footer', 'wpb_adding_scripts' ); 

?>