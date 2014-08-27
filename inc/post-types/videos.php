<?php 

add_action( 'init', 'fa_video_init' );
/**
 * Register a video post type.
 */
function fa_video_init() {
	$labels = array(
		'name'               => _x( 'Videos', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Video', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Videos', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Video', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'video', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Video', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Video', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Video', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Video', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Videos', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Videos', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Videos:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No videos found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No videos found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'videos' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	register_post_type( 'video', $args );
}



/**
 * Video update messages.
 */
 
add_filter( 'post_updated_messages', 'fa_video_updated_messages' );

function fa_video_updated_messages( $messages ) {
	$post             = get_post();
	$post_type        = get_post_type( $post );
	$post_type_object = get_post_type_object( $post_type );

	$messages['video'] = array(
		0  => '', // Unused. Messages start at index 1.
		1  => __( 'Video updated.', 'your-plugin-textdomain' ),
		2  => __( 'Custom field updated.', 'your-plugin-textdomain' ),
		3  => __( 'Custom field deleted.', 'your-plugin-textdomain' ),
		4  => __( 'Video updated.', 'your-plugin-textdomain' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Video restored to revision from %s', 'your-plugin-textdomain' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6  => __( 'Video published.', 'your-plugin-textdomain' ),
		7  => __( 'Video saved.', 'your-plugin-textdomain' ),
		8  => __( 'Video submitted.', 'your-plugin-textdomain' ),
		9  => sprintf(
			__( 'Video scheduled for: <strong>%1$s</strong>.', 'your-plugin-textdomain' ),
			// translators: Publish box date format, see http://php.net/date
			date_i18n( __( 'M j, Y @ G:i', 'your-plugin-textdomain' ), strtotime( $post->post_date ) )
		),
		10 => __( 'Video draft updated.', 'your-plugin-textdomain' )
	);

	if ( $post_type_object->publicly_queryable ) {
		$permalink = get_permalink( $post->ID );

		$view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), __( 'View video', 'your-plugin-textdomain' ) );
		$messages[ $post_type ][1] .= $view_link;
		$messages[ $post_type ][6] .= $view_link;
		$messages[ $post_type ][9] .= $view_link;

		$preview_permalink = add_query_arg( 'preview', 'true', $permalink );
		$preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Preview video', 'your-plugin-textdomain' ) );
		$messages[ $post_type ][8]  .= $preview_link;
		$messages[ $post_type ][10] .= $preview_link;
	}

	return $messages;
} 



add_filter( 'manage_edit-video_columns', 'set_custom_edit_video_columns' );
add_action( 'manage_video_posts_custom_column' , 'custom_video_column', 10, 2 );

function set_custom_edit_video_columns($columns) {
	
    $columns['image'] = __('Image');
	

    return $columns;
}



/**
 * updated messages.
 */

function custom_video_column( $column, $post_id ) {
    switch ( $column ) {

        case 'image' :
		
		   $url = get_post_meta($post_id, '_firoud_video_url' , true);
           $video_id = get_yt_video_id($url);
		    echo '<img src="http://img.youtube.com/vi/' . $video_id . '/hqdefault.jpg" width="120" height="90" />';

            break;

    }
}


?>