// JavaScript Document


jQuery(window).load(function() {
	jQuery('#slider').nivoSlider();
});


jQuery(document).ready(function(){
	
	// Superfish
	jQuery('ul.sf-menu').superfish();
	
	
	// sticky
	jQuery('nav').sticky();



	// owlCarousel
	
	 var owl = jQuery("#owl-example");
	 
	 owl.owlCarousel({
		itemsCustom : [
		[0, 2],
		[450, 4],
		[600, 7],
		[700, 9],
		[1000, 10],
		[1200, 4],
		[1400, 13],
		[1600, 15]
		],
		navigation : true,
		autoPlay : 3000,
		stopOnHover : true,
		addClassActive : true,
		scrollPerPage : true,
		 
		});
	
	// tooltip
	jQuery('.social-media a').tooltip({placement:'top'});


	// simplyScroll
	jQuery("#scroller").simplyScroll({
		frameRate: 24,
		speed: 1,
		orientation: 'horizontal',
		direction: 'backwards', // forwards || backwards
		
		
		});	
		
	// center an div vertically
			
    jQuery('.className').css({
        'position' : 'absolute',
        'left' : '50%',
        'top' : '50%',
        'margin-left' : -jQuery(this).width()/2,
        'margin-top' : -jQuery(this).height()/2
    });
	
	
	//
	
	jQuery().prettyEmbed({ useFitVids: true , previewSize: 'high' });
	
});