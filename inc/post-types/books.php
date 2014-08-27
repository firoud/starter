<?php 

add_action( 'init', 'fa_book_init' );
/**
 * Register a book post type.
 */
function fa_book_init() {
	$labels = array(
		'name'               => _x( 'Books', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Book', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Books', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'book', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Book', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Book', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Book', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Book', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Books', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Books', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Books:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No books found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No books found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'books' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes' )
	);

	register_post_type( 'book', $args );
}

/**
 * Change ‘Enter Title Here’ Text For Custom Post Type "book"
 */



function change_book_default_title( $title ){
     $screen = get_current_screen();
 
     if  ( 'book' == $screen->post_type ) {
          $title = __('Book Title', 'fa');
     }
 
     return $title;
}
 
add_filter( 'enter_title_here', 'change_book_default_title' );



/**
 * Book update messages.
 */
 
add_filter( 'post_updated_messages', 'fa_book_updated_messages' );

function fa_book_updated_messages( $messages ) {
	$post             = get_post();
	$post_type        = get_post_type( $post );
	$post_type_object = get_post_type_object( $post_type );

	$messages['book'] = array(
		0  => '', // Unused. Messages start at index 1.
		1  => __( 'Book updated.', 'your-plugin-textdomain' ),
		2  => __( 'Custom field updated.', 'your-plugin-textdomain' ),
		3  => __( 'Custom field deleted.', 'your-plugin-textdomain' ),
		4  => __( 'Book updated.', 'your-plugin-textdomain' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Book restored to revision from %s', 'your-plugin-textdomain' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6  => __( 'Book published.', 'your-plugin-textdomain' ),
		7  => __( 'Book saved.', 'your-plugin-textdomain' ),
		8  => __( 'Book submitted.', 'your-plugin-textdomain' ),
		9  => sprintf(
			__( 'Book scheduled for: <strong>%1$s</strong>.', 'your-plugin-textdomain' ),
			// translators: Publish box date format, see http://php.net/date
			date_i18n( __( 'M j, Y @ G:i', 'your-plugin-textdomain' ), strtotime( $post->post_date ) )
		),
		10 => __( 'Book draft updated.', 'your-plugin-textdomain' )
	);

	if ( $post_type_object->publicly_queryable ) {
		$permalink = get_permalink( $post->ID );

		$view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), __( 'View book', 'your-plugin-textdomain' ) );
		$messages[ $post_type ][1] .= $view_link;
		$messages[ $post_type ][6] .= $view_link;
		$messages[ $post_type ][9] .= $view_link;

		$preview_permalink = add_query_arg( 'preview', 'true', $permalink );
		$preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Preview book', 'your-plugin-textdomain' ) );
		$messages[ $post_type ][8]  .= $preview_link;
		$messages[ $post_type ][10] .= $preview_link;
	}

	return $messages;
} 



add_filter( 'manage_edit-book_columns', 'set_custom_edit_book_columns' );
add_action( 'manage_book_posts_custom_column' , 'custom_book_column', 10, 2 );

function set_custom_edit_book_columns($columns) {
    unset( $columns['author'] );
    $columns['book_author'] = __( 'Author', 'your_text_domain' );
    $columns['publisher'] = __( 'Publisher', 'your_text_domain' );

    return $columns;
}



/**
 * updated messages.
 */

function custom_book_column( $column, $post_id ) {
    switch ( $column ) {

        case 'book_author' :
            $terms = get_the_term_list( $post_id , 'book_author' , '' , ',' , '' );
            if ( is_string( $terms ) )
                echo $terms;
            else
                _e( 'Unable to get author(s)', 'your_text_domain' );
            break;

        case 'publisher' :
            echo get_post_meta( $post_id , 'publisher' , true ); 
            break;

    }
}


?>