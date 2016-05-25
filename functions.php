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

/*  Post Thumbnail Support
/* ------------------------------------ */ 
  add_theme_support( 'post-thumbnails' ); 

/*  Remove Admin Bar
/* ------------------------------------ */ 
	add_filter('show_admin_bar', '__return_false');

/*  Custom Excerpt
/* ------------------------------------ */ 
function new_excerpt_more( $more ) {
  return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*  Enqueue scripts
/* ------------------------------------ */ 

  function jquery_enqueue() {
      wp_deregister_script('jquery');
      wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', false, null);
      wp_enqueue_script('jquery');
  }
  if (!is_admin()) add_action('wp_enqueue_scripts', 'jquery_enqueue', 11);


	function wpb_adding_scripts() {

		$vars = "value";
	  wp_register_script('what', get_stylesheet_directory_uri() . '/bower_components/what-input/what-input.js');
	  wp_register_script('foundation', get_stylesheet_directory_uri() . '/bower_components/foundation-sites/dist/foundation.js');
	  wp_register_script('app', get_stylesheet_directory_uri() . '/js/app.js');
	  wp_register_script('mapbox', 'https://api.tiles.mapbox.com/mapbox.js/v2.2.4/mapbox.js');

	  wp_enqueue_script('what');
	  wp_enqueue_script('foundation');
	  wp_enqueue_script('app');
	  wp_enqueue_script('mapbox');
	}
	add_action( 'wp_footer', 'wpb_adding_scripts' ); 


/*  Theme Options Page
/* ------------------------------------ */ 


  function add_theme_menu_item()
  {
    add_menu_page("Shop Options", "Shop Options", "manage_options", "theme-panel", "theme_settings_page", null, 99);
  }

  add_action("admin_menu", "add_theme_menu_item");



  function theme_settings_page()
  {
      ?>
        <div class="wrap">
        <h1>Shop Options</h1>
        <form method="post" action="options.php" class="theme_options">
            <?php
                settings_fields("section");
                do_settings_sections("theme-options");      
                submit_button(); 
            ?>          
        </form>
      </div>
    <?php
  }

  function hours_line_1()
  {
    ?>  
        <input type="text" name="hours_line_1" id="hours_line_1" value="<?php echo get_option('hours_line_1'); ?>" />      
      <?php
  }

  function hours_line_2()
  {
    ?>
        <input type="text" name="hours_line_2" id="hours_line_2" value="<?php echo get_option('hours_line_2'); ?>" />
      <?php
  }

  function hours_line_3()
  {
    ?>
        <input type="text" name="hours_line_3" id="hours_line_3" value="<?php echo get_option('hours_line_3'); ?>" />
      <?php
  }

  function phone_number()
  {
    ?>
        <input type="text" name="phone_number" id="phone_number" value="<?php echo get_option('phone_number'); ?>" />
      <?php
  }

  function display_theme_panel_fields()
  {
    add_settings_section("section", "Confluence Shop Settings", null, "theme-options");

    add_settings_field("phone_number", "Phone Number", "phone_number", "theme-options", "section");
    add_settings_field("hours_line_1", "Hours Line 1", "hours_line_1", "theme-options", "section");
    add_settings_field("hours_line_2", "Hours Line 2", "hours_line_2", "theme-options", "section");
    add_settings_field("hours_line_3", "Hours Line 3", "hours_line_3", "theme-options", "section");


    register_setting("section", "phone_number");
    register_setting("section", "hours_line_1");
    register_setting("section", "hours_line_2"); 
    register_setting("section", "hours_line_3");   
  }

  add_action("admin_init", "display_theme_panel_fields");

  add_action('admin_head', 'my_custom_admin_css');

  function my_custom_admin_css() {
    echo '<style>
      form input[type=text]{width:50%;}
    </style>';
  }


	/* Custom Post Types
	/* ------------------------------------ */ 

// ----------------- Creates Report Post Type
add_action('init', 'post_type_report');
function post_type_report() 
{
  $labels = array(
    'name' => _x('Fishing Reports', 'post type general name'),
    'singular_name' => _x('Fishing Report', 'post type singular name'),
    'add_new' => _x('Add New Fishing Report', 'report'),
    'add_new_item' => __('Add New Fishing Report')
  );
 
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'report' ),
    'capability_type' => 'post',
    'hierarchical' => true,
    'menu_position' => null,
    'supports' => array('title','excerpt')
    ); 
  register_post_type('report',$args);
  flush_rewrite_rules();
};  

/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 * @category Confluence
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

require_once 'cmb/init.php';

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function cmb2_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

add_filter( 'cmb2_meta_boxes', 'cmb2_lmc_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb2_lmc_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb2_';

	/**
	 * Fishing Report Metabox Layout
	 */
	$meta_boxes['report_metabox'] = array(
		'id'            => 'report_metabox',
		'title'         => __( 'Fishing Report', 'cmb2' ),
		'object_types'  => array( 'report' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'        => array(
			
			array(
	      'name' => __( 'Species', 'cmb2' ),
				'desc' => __( 'Currently Targeted Species ', 'cmb2' ),
	      'id'      => $prefix . 'species_multicheckbox',
	      'type'    => 'multicheck',
	      'options' => array(
	      		'rainbow' => __( 'Rainbow Trout', 'cmb2' ),
	      		'steelhead' => __( 'Steelhead', 'cmb2' ),
	      		'brown' => __( 'Brown Trout', 'cmb2' ),
	      )
      ),
			array(
				'name' => __( 'USGS Gauge Number', 'cmb2' ),
				'desc' => __( ' ', 'cmb2' ),
				'id'   => $prefix . 'siteNum',
				'type' => 'text_medium',
			),
			
			array(
				'name'    => __( 'Guide Report', 'cmb2' ),
				'id'      => $prefix . 'guide_report',
				'type'    => 'wysiwyg',
				'options' => array( 'textarea_rows' => 5, ),
			),
			array(
				'name' => __( 'Profile Image', 'cmb2' ),
				'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
				'id'   => $prefix . 'report_image',
				'type' => 'file',
			)
		)
	);
	return $meta_boxes;
}

?>