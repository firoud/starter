<?php 

add_action( 'init', 'firoud_slide_init' );
/**
 * Register a slide post type.
 */
function firoud_slide_init() {
	$labels = array(
		'name'               => _x( 'Slides', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Slide', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Slides', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Slide', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'slide', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Slide', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Slide', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Slide', 'your-plugin-textdomain' ),
		'view_item'          => NULL,
		'all_items'          => __( 'All Slides', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Slides', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Slides:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No slides found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No slides found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slides' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
	);

	register_post_type( 'slide', $args );
}

/**
 * Change ‘Enter Title Here’ Text For Custom Post Type "slide"
 */



function change_slide_default_title( $title ){
     $screen = get_current_screen();
 
     if  ( 'slide' == $screen->post_type ) {
          $title = __('Slide Title', 'fa');
     }
 
     return $title;
}
 
add_filter( 'enter_title_here', 'change_slide_default_title' );



/**
 * Slide update messages.
 */
 
add_filter( 'post_updated_messages', 'fa_slide_updated_messages' );

function fa_slide_updated_messages( $messages ) {
	$post             = get_post();
	$post_type        = get_post_type( $post );
	$post_type_object = get_post_type_object( $post_type );

	$messages['slide'] = array(
		0  => '', // Unused. Messages start at index 1.
		1  => __( 'Slide updated.', 'your-plugin-textdomain' ),
		2  => __( 'Custom field updated.', 'your-plugin-textdomain' ),
		3  => __( 'Custom field deleted.', 'your-plugin-textdomain' ),
		4  => __( 'Slide updated.', 'your-plugin-textdomain' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Slide restored to revision from %s', 'your-plugin-textdomain' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6  => __( 'Slide published.', 'your-plugin-textdomain' ),
		7  => __( 'Slide saved.', 'your-plugin-textdomain' ),
		8  => __( 'Slide submitted.', 'your-plugin-textdomain' ),
		9  => sprintf(
			__( 'Slide scheduled for: <strong>%1$s</strong>.', 'your-plugin-textdomain' ),
			// translators: Publish box date format, see http://php.net/date
			date_i18n( __( 'M j, Y @ G:i', 'your-plugin-textdomain' ), strtotime( $post->post_date ) )
		),
		10 => __( 'Slide draft updated.', 'your-plugin-textdomain' )
	);



	return $messages;
} 



add_filter( 'manage_edit-slide_columns', 'set_custom_edit_slide_columns' );
add_action( 'manage_slide_posts_custom_column' , 'custom_slide_column', 10, 2 );

function set_custom_edit_slide_columns($columns) {
    $columns['image'] = __( 'Featured Image', 'your_text_domain' );
    $columns['order'] = __( 'Order', 'your_text_domain' );

    return $columns;
}



/**
 * updated messages.
 */

function custom_slide_column( $column, $post_id ) {
	
	global $post;
	
    switch ( $column ) {


        case 'image' :
            the_post_thumbnail('thumbnail');
            break;

        case 'order' :
            echo $post->menu_order;
            break;			

    }
}


?>