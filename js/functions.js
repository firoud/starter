// JavaScript Document

function sample(){
	


	jQuery("#loader").fadeIn(0);
	
	
	jQuery.get( fa.ajaxurl , {action: 'sample'}, function( data ) {
	
		jQuery("#loader").fadeOut(0);
	
		jQuery( "#result" ).html(data);
	

	

    });
	
	    
 	
    return false;
}