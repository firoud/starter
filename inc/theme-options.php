<?php 


function fa_initialize_theme_options(){
	
	// Creating the Section
	
	add_settings_section( 'general_settings_section', //String for use in the 'id' attribute of tags.
	                       __('Examples', 'fa') , //Title of the section.
						   'fa_general_options_callback', //Function that fills the section with the desired content. The function should echo its output. 
						    'fa_general_settings' //The menu page on which to display this section. Should match $menu_slug
							
		 );
		 
		 
		 
	add_settings_section( 'social_networks_section', //String for use in the 'id' attribute of tags.
	                       __('Social Networks', 'fa') , //Title of the section.
						   '', //Function that fills the section with the desired content. The function should echo its output. 
						    'fa_social_networks_options' //The menu page on which to display this section. Should match $menu_slug
							
		 );		
		
		// Adding Fields					
							 
		add_settings_field( 'myfield', __('Field Label', 'fa'), 'fa_myfield_callback', 'fa_general_settings', 'general_settings_section', array('label' => 'myfield') );
		
		
							 
		add_settings_field( 'email', __('E-mail', 'fa'), 'fa_email_callback', 'fa_general_settings', 'general_settings_section' );		


		add_settings_field( 'phone', __('Phone', 'fa'), 'fa_phone_callback', 'fa_general_settings', 'general_settings_section' );
		
		
		
		add_settings_field( 'facebook', __('Facebook', 'fa'), 'fa_facebook_callback', 'fa_social_networks_options', 'social_networks_section' );				
		
		
		// Registering Our Settings
		
		
		register_setting(
			'fa_general_settings',
			'myfield'
		);
		
		
		register_setting(
			'fa_general_settings',
			'email',
			'sanitize_email'
		);	
		
		register_setting(
			'fa_general_settings',
			'phone',
			'sanitize_phone'			
		);
		
		register_setting(
			'fa_social_networks_options',
			'facebook'
		);											 
	
}


add_action('admin_init', 'fa_initialize_theme_options');



function fa_general_options_callback(){
	
 echo "Section output";
	
	}
	
	
function fa_myfield_callback($args){
	
	 // Note the ID and the name attribute of the element should match that of the ID in the call to add_settings_field
    $html = '<input type="checkbox" id="myfield" name="myfield" value="1" ' . checked(1, get_option('myfield'), false) . '/>';
     
    // Here, we will take the first argument of the array and add it to a label next to the checkbox
    $html .= '<label for="myfield"> '  . $args['label'] . '</label>';
     
    echo $html;
}


function fa_email_callback(){
	
	echo '<input type="text" id="email" name="email" class="regular-text" value="' . get_option('email') . '" />';
	
}



function fa_phone_callback(){
	
	echo '<input type="text" id="phone" name="phone" class="regular-text" value="' . get_option('phone') . '" />';
	
}


function sanitize_phone($data){
	
	if ($data == ''){
		
		add_settings_error( 'phone', esc_attr( 'settings_error' ) , __('Phone field is required', 'fa'), 'error' );
		
		}
		
		return $data;

}


function fa_facebook_callback(){
	
	echo '<input type="text" id="facebook" name="facebook" class="regular-text" value="' . get_option('facebook') . '" />';
	
}



add_action('admin_menu', 'fa_theme_option');


function fa_theme_option(){
	
	
	    add_menu_page(
		             __('Theme Options', 'fa'),
		             __('Theme Options', 'fa'),
					 'manage_options' ,
					 'theme-options' ,
					 'fa_theme_option_callback'
					 
					  );
	
	}
	
function fa_theme_option_callback(){
	
	?>
    
    
    <div class="wrap">
    
    <h2><?php _e('Theme Options', 'fa'); ?></h2>
    
    <?php settings_errors(); ?> 
    
    
    
    
        <?php
			if( isset( $_GET[ 'tab' ] ) ) {
				$active_tab = $_GET[ 'tab' ];
			} // end if
			
			else {
				$active_tab = 'general_options';
				
				}
		?>
    
        
        
<h2 class="nav-tab-wrapper">
    <a href="?page=<?php echo $_GET['page']; ?>&tab=general_options" class="nav-tab <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : ''; ?>">Display Options</a>
    
    
    <a href="?page=<?php echo $_GET['page']; ?>&tab=social_options" class="nav-tab <?php echo $active_tab == 'social_options' ? 'nav-tab-active' : ''; ?>">Social Options</a>
</h2>
    
    
    
    
    
    <form method="post" action="options.php">


<?php    
    
    if( $active_tab == 'general_options' ) {
    
 	 settings_fields( 'fa_general_settings' ); 
    do_settings_sections( 'fa_general_settings' ); 
    
    }
    
    else {
    
    	settings_fields( 'fa_social_networks_options' );
        do_settings_sections( 'fa_social_networks_options' );
    } 
    
    
?>    
        
    <?php submit_button(); ?>
    



    
    </form>
    
    
    
    </div>
    
    <?php
	
	
	}	

?>