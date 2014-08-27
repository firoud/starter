<?php 



// Register Navigation Menus
function fa_navigation_menus() {

	$locations = array(
		'primary_menu' => __( 'Primary Menu', 'fa' ),
		'secondary_menu' => __( 'Secondary Menu', 'fa' ),
		'mobile_menu' => __( 'Mobile Menu', 'fa' ),
	);
	register_nav_menus( $locations );

}

// Hook into the 'init' action
add_action( 'init', 'fa_navigation_menus' );



// Add the First and Last Class to Navigation Menu Items


function fa_nav_menu_item_class($items) {
    $items[1]->classes[] = 'first';
    $items[count($items)]->classes[] = 'last';
    return $items;
}
add_filter('wp_nav_menu_objects', 'fa_nav_menu_item_class');



?>