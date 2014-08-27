<?php


// Change page title in admin area

add_filter('admin_title', 'my_admin_title', 10, 2);

function my_admin_title($admin_title, $title)
{
    return get_bloginfo('name').' | '.$title;
}






/* How to remove menu items from admin bar (on top) */

function wps_admin_bar() {

    global $wp_admin_bar;

    $wp_admin_bar->remove_menu('wp-logo');

    $wp_admin_bar->remove_menu('about');

    $wp_admin_bar->remove_menu('wporg');

    $wp_admin_bar->remove_menu('documentation');

    $wp_admin_bar->remove_menu('support-forums');

    $wp_admin_bar->remove_menu('feedback');

    $wp_admin_bar->remove_menu('view-site');
	
	
	$wp_admin_bar->remove_menu('new-post');
	
	//$wp_admin_bar->remove_menu('comments');	

	$wp_admin_bar->remove_menu('themes');
	$wp_admin_bar->remove_menu('customize');
	$wp_admin_bar->remove_menu('updates');

}

add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );


//  removes support for comments in pages and attachments: 

add_action( 'init', 'no_comments' );

function no_comments() {
	remove_post_type_support( 'page', 'comments' );
	remove_post_type_support( 'attachment', 'comments' );

}







/* Hide WordPress version in admin footer */


function change_footer_version() {
  return '';
}
add_filter( 'update_footer', 'change_footer_version', 9999 );


/* Change footer text in WordPress admin panel */

function remove_footer_admin () {
  echo 'جـمـيـع الـحـقـوق مـحـفـوظـة ©  2014  |  تـصـمـيـم وتـطـويـر  <a target="_blank" href="http://fadesign.net/">زيم دزاين</a>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/* display dashboard in a single column only */

function single_screen_columns( $columns ) {
    $columns['dashboard'] = 1;
    return $columns;
}
add_filter( 'screen_layout_columns', 'single_screen_columns' );
function single_screen_dashboard(){return 1;}
add_filter( 'get_user_option_screen_layout_dashboard', 'single_screen_dashboard' );


/* remove menu items from WordPress admin panel/dashboard */


add_action( 'admin_menu', 'remove_links_menu' );
function remove_links_menu() {

	 
    // remove_menu_page('edit-comments.php'); // comments
	 	
     remove_menu_page('themes.php'); // Appearance
     remove_menu_page('plugins.php'); // Plugins
     remove_menu_page('tools.php'); // Tools
	 remove_menu_page('edit.php'); // Posts
	 remove_submenu_page('index.php' ,'update-core.php'); // Updates
     remove_submenu_page('options-general.php' ,'options-reading.php'); // Settings
	 remove_submenu_page('options-general.php' ,'options-writing.php'); // Settings
	 remove_submenu_page('options-general.php' ,'options-media.php'); // Settings
	 remove_submenu_page('options-general.php' ,'options-permalink.php'); // Settings
	 remove_submenu_page('options-general.php' ,'options-discussion.php'); // Settings	
	 remove_submenu_page('options-general.php' ,'pagenavi'); // Settings	
	// remove_submenu_page('options-general.php' ,'wpba-settings'); // Settings		 
	// remove_submenu_page('options-general.php' ,'wp-postviews/postviews-options.php'); 	 
	 
	 add_menu_page( __('Menus'), __('Menus'),  'manage_options' , 'nav-menus.php' ); 		 	 
}


/* disable browser upgrade notification/warning */

function disable_browser_upgrade_warning() {
    remove_meta_box( 'dashboard_browser_nag', 'dashboard', 'normal' );
}
add_action( 'wp_dashboard_setup', 'disable_browser_upgrade_warning' );




/* 
 change WordPress admin and login page logo */



function themeslug_enqueue_script() {
	wp_enqueue_script( 'jquery' );
}

add_action( 'login_enqueue_scripts', 'themeslug_enqueue_script', 1);


function my_custom_login_logo() {
	
	
	
    echo '<style type="text/css">
        h1 a { 
		background-image:url('.get_bloginfo('template_url').'/images/logo.png) !important;
		height:140px !important;
		width:320px !important;
		background-size:auto !important;
		 }
    </style>
	
	
	<script type="text/javascript">
		jQuery(document).ready(function(){
			
			jQuery("#login h1 a").attr("href", "' . home_url() . '");
			
		});
	
	</script>
	
	';
}

add_action('login_head', 'my_custom_login_logo');






/* Change WordPress default FROM email address */


add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');

function new_mail_from($old) {
 return get_option('admin_email');
}
function new_mail_from_name($old) {
 return get_bloginfo('name');
}







/* Remove Dashboard Widgets */

function remove_dashboard_widgets() {

	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	
	//disable the Welcome Panel in the Dashboard	
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
	
}


add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );





/* disable the update notice for non-administrators? */



add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );



// enable links manager
add_filter( 'pre_option_link_manager_enabled', '__return_true' );



// delete "sample page" and "hello world" post.

add_action('after_switch_theme', 'theme_activation_function');

function theme_activation_function(){
	 wp_delete_post(1);
	 wp_delete_post(2); 
}


// show custom favicon for admin.

add_action('login_head', 'fa_login_head');
function fa_login_head() {
	echo '<link rel="Shortcut Icon" type="image/ico" href="' . get_template_directory_uri() . '/favicon.ico" />';
}


function fa_admin_head() {
	
// Change admin favicon	
	
echo '<link rel="Shortcut Icon" type="image/ico" href="' . get_template_directory_uri() . '/favicon.ico" />';

	
	
/* Hide admin color scheme options from user profile */	
	
   global $_wp_admin_css_colors;
   $_wp_admin_css_colors = 0;

	
/* Hide ‘help’ Tab from admin panel and external links */	
	
    echo '<style type="text/css">
	
            #contextual-help-link-wrap ,
			#postexcerpt p a ,
			.update-plugins { display: none !important; }
			
          </style>';

 
   echo "<script>
   				jQuery(document).ready(function(){
					
					var text = jQuery('#postcustom p a').text();

   				    jQuery('#postcustom p a').replaceWith(text);
					
					var text2 = jQuery('#commentstatusdiv a').text();

   				    jQuery('#commentstatusdiv a').replaceWith(text2);					
					
				});
   
   		</script>";


  echo '<style type="text/css">
    #header-logo { background-image: url('.get_bloginfo('template_directory').'/images/logo.png) !important; }
    </style>';
}

add_action('admin_head', 'fa_admin_head');


function enable_more_buttons($buttons) {

$buttons[] = 'fontselect';
$buttons[] = 'fontsizeselect';
$buttons[] = 'styleselect';
$buttons[] = 'backcolor';
$buttons[] = 'forecolor';
$buttons[] = 'newdocument';
$buttons[] = 'cut';
$buttons[] = 'copy';
$buttons[] = 'charmap';
$buttons[] = 'hr';
$buttons[] = 'visualaid';
$buttons[] = 'sup';
$buttons[] = 'sub';

$buttons[] = 'cleanup';
$buttons[] = 'help';
$buttons[] = 'code';
$buttons[] = 'hr';


return $buttons;
}
add_filter("mce_buttons_3", "enable_more_buttons");



function all_tinymce( $args ) {
$args['wordpress_adv_hidden'] = false;
return $args;
}
add_filter( 'tiny_mce_before_init', 'all_tinymce' );

?>