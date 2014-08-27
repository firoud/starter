<?php 

require_once('inc/hide-wp.php');
require_once('inc/load-scripts.php');
// Register Custom Navigation Walker
require_once('inc/wp_bootstrap_navwalker.php');

require_once('inc/post-types/books.php');
require_once('inc/post-types/slides.php');
require_once('inc/post-types/news.php');
require_once('inc/post-types/videos.php');


require_once('inc/taxonomies.php');
//include the main class file
require_once("lib/Tax-meta-class/Tax-meta-class.php");
require_once('lib/twitteroauth/twitteroauth.php');
require_once('inc/class-usage-demo.php');

require_once('inc/rewrite.php');
require_once('inc/theme-setup.php');
require_once('inc/theme-functions.php');
require_once('inc/nav-menus.php');
require_once('inc/pagination.php');


// Ajax
require_once('ajax/sample.php');



if (is_admin()){
	


    require_once('inc/theme-options.php');
	
	require_once('inc/custom_metaboxes.php');


	add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
	/**
	 * Initialize the metabox class.
	 */
	function cmb_initialize_cmb_meta_boxes() {
	
		if ( ! class_exists( 'cmb_Meta_Box' ) )
			require_once 'lib/Custom-Metaboxes-and-Fields/init.php';
	
	}
}






?>