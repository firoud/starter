<?php 

add_action( 'init', 'firoud_news_init' );
/**
 * Register a news post type.
 */
function firoud_news_init() {
	$labels = array(
		'name'               => _x( 'News', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'News', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'News', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'News', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'news', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New News', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New News', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit News', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View News', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All News', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search News', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent News:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No newss found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No newss found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'news' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'news', $args );
}



/**
 * News update messages.
 */
 
add_filter( 'post_updated_messages', 'firoud_news_updated_messages' );

function firoud_news_updated_messages( $messages ) {
	$post             = get_post();
	$post_type        = get_post_type( $post );
	$post_type_object = get_post_type_object( $post_type );

	$messages['news'] = array(
		0  => '', // Unused. Messages start at index 1.
		1  => __( 'News updated.', 'your-plugin-textdomain' ),
		2  => __( 'Custom field updated.', 'your-plugin-textdomain' ),
		3  => __( 'Custom field deleted.', 'your-plugin-textdomain' ),
		4  => __( 'News updated.', 'your-plugin-textdomain' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'News restored to revision from %s', 'your-plugin-textdomain' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6  => __( 'News published.', 'your-plugin-textdomain' ),
		7  => __( 'News saved.', 'your-plugin-textdomain' ),
		8  => __( 'News submitted.', 'your-plugin-textdomain' ),
		9  => sprintf(
			__( 'News scheduled for: <strong>%1$s</strong>.', 'your-plugin-textdomain' ),
			// translators: Publish box date format, see http://php.net/date
			date_i18n( __( 'M j, Y @ G:i', 'your-plugin-textdomain' ), strtotime( $post->post_date ) )
		),
		10 => __( 'News draft updated.', 'your-plugin-textdomain' )
	);

	if ( $post_type_object->publicly_queryable ) {
		$permalink = get_permalink( $post->ID );

		$view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), __( 'View news', 'your-plugin-textdomain' ) );
		$messages[ $post_type ][1] .= $view_link;
		$messages[ $post_type ][6] .= $view_link;
		$messages[ $post_type ][9] .= $view_link;

		$preview_permalink = add_query_arg( 'preview', 'true', $permalink );
		$preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Preview news', 'your-plugin-textdomain' ) );
		$messages[ $post_type ][8]  .= $preview_link;
		$messages[ $post_type ][10] .= $preview_link;
	}

	return $messages;
} 



add_filter( 'manage_edit-news_columns', 'set_custom_edit_news_columns' );
add_action( 'manage_news_posts_custom_column' , 'custom_news_column', 10, 2 );

function set_custom_edit_news_columns($columns) {

    $columns['image'] = __( 'Featured Image', 'your_text_domain' );

    return $columns;
}



/**
 * updated messages.
 */

function custom_news_column( $column, $post_id ) {
    switch ( $column ) {

        case 'image' :
            the_post_thumbnail('thumbnail'); 
            break;

    }
}


?>