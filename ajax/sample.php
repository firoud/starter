<?php 
add_action( 'wp_ajax_nopriv_sample', 'fa_sample_ajax' );
add_action( 'wp_ajax_sample', 'fa_sample_ajax' );

 
function fa_sample_ajax() {
	
	echo 'Hello! World';	
	

	exit();

}

?>