<?php 

// Register Theme Features
function fa_theme_features()  {
	global $wp_version;

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );	

	 // Set custom thumbnail dimensions
	set_post_thumbnail_size( 150, 150, true );
	
	
	add_image_size( 'singular', 300 ); // 300 pixels wide (and unlimited height)
    add_image_size( 'homepage-thumb', 220, 180, true ); // (cropped)
    add_image_size( 'custom-size', 220, 220, array( 'left', 'top' ) ); // Hard crop left top	
    add_image_size( 'slide', 1200, 500, true ); // (cropped)
	
	
		// Add theme support for Translation
	load_theme_textdomain( 'fa', get_template_directory() . '/languages' );	
	
}


// Hook into the 'after_setup_theme' action
add_action( 'after_setup_theme', 'fa_theme_features' );



?>