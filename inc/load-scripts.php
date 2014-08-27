<?php 

function fa_enqueue_scripts(){
	
	
//wp_deregister_script('jquery');
	
//wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array(), false, true ); 
wp_register_script( 'bootstrap', get_template_directory_uri() . "/js/bootstrap.min.js", array('jquery') , false, true ); 
wp_register_script( 'custom', get_template_directory_uri() . "/js/custom.js", array('jquery') , false, true ); 
wp_register_script( 'superfish', get_template_directory_uri() . "/js/superfish.js", array('jquery') , false, true ); 
wp_register_script( 'hoverIntent', get_template_directory_uri() . "/js/hoverIntent.js", array('jquery') , false, true ); 
wp_register_script( 'owlCarousel', get_template_directory_uri() . "/js/owl.carousel.min.js", array('jquery') , false, true ); 
wp_register_script( 'nivo-slider', get_template_directory_uri() . "/js/jquery.nivo.slider.pack.js", array('jquery') , false, true ); 
wp_register_script( 'jquery-cycle', get_template_directory_uri() . "/js/jquery.cycle.all.js", array('jquery') , false, true ); 
wp_register_script( 'jquery-stellar', get_template_directory_uri() . "/js/jquery.stellar.min.js", array('jquery') , false, true ); 
wp_register_script( 'jquery-sticky', get_template_directory_uri() . "/js/jquery.sticky.js", array('jquery') , false, true ); 
wp_register_script( 'jquery-center', get_template_directory_uri() . "/js/jquery.center.js", array('jquery') , false, true ); 
wp_register_script( 'jquery-simplyscroll', get_template_directory_uri() . "/js/jquery.simplyscroll.min.js", array('jquery') , false, true ); 
wp_register_script( 'jquery-waitforimages', get_template_directory_uri() . "/js/jquery.waitforimages.min.js", array('jquery') , false, true ); 
wp_register_script( 'jquery-prettyembed', get_template_directory_uri() . "/js/jquery.prettyembed.min.js", array('jquery') , false, true ); 




$direction = is_rtl() ?'rtl' :'ltr';
$data = array( 
	'ajaxurl' => admin_url( 'admin-ajax.php' ) ,
	'direction' => $direction
 );
wp_localize_script( 'custom', 'fa', $data );



wp_register_style( 'main', get_template_directory_uri() . "/style.css" );	
wp_register_style( 'bootstrap', get_template_directory_uri() . "/css/bootstrap.min.css" );
wp_register_style( 'bootstrap-rtl', get_template_directory_uri() . "/css/bootstrap-rtl.min.css" );

wp_register_style( 'responsive', get_template_directory_uri() . "/css/responsive.css" );	
wp_register_style( 'font-awesome', get_template_directory_uri() . "/css/font-awesome.min.css" );	

	
wp_register_style( 'superfish', get_template_directory_uri() . "/css/superfish.css" );	

wp_register_style( 'owlCarousel', get_template_directory_uri() . "/css/owl.carousel.css" );	
wp_register_style( 'owlTheme', get_template_directory_uri() . "/css/owl.theme.css" );	

wp_register_style( 'nivo-slider', get_template_directory_uri() . "/css/nivo-slider.css" );	
wp_register_style( 'nivo-slider-default', get_template_directory_uri() . "/css/themes/default/default.css" );	

wp_register_style( 'simplyscroll', get_template_directory_uri() . "/css/jquery.simplyscroll.css" );	
	
	
	
wp_enqueue_style('bootstrap');
if (is_rtl()) wp_enqueue_style('bootstrap-rtl');
	
wp_enqueue_style( 'dashicons' );
wp_enqueue_style('font-awesome');

wp_enqueue_script('bootstrap');


// superfish

wp_enqueue_style('superfish');
wp_enqueue_script('hoverIntent');
wp_enqueue_script('superfish');

// nivo-slider
wp_enqueue_style('nivo-slider-default');
wp_enqueue_style('nivo-slider');
wp_enqueue_script('nivo-slider');



// owl carousel

wp_enqueue_style('owlCarousel');
wp_enqueue_style('owlTheme');
wp_enqueue_script('owlCarousel');

// sticky

wp_enqueue_script('jquery-sticky');

// simplyscroll

wp_enqueue_script( 'jquery-simplyscroll');
wp_enqueue_style( 'simplyscroll');


// embed

wp_enqueue_script( 'jquery-waitforimages'); 
wp_enqueue_script( 'jquery-prettyembed'); 

// custom javascript
wp_enqueue_script('custom');
	


wp_enqueue_style('main');	
wp_enqueue_style('responsive');	

}

add_action('wp_enqueue_scripts', 'fa_enqueue_scripts');



function fa_head(){
	
	echo '<!-- Just for debugging purposes. Don\'t actually copy this line! -->
    <!--[if lt IE 9]><script src="' . get_template_directory_uri() . '/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->';
	

}

add_action('wp_head', 'fa_head');


function fa_footer(){
	
?>


<script type="text/javascript">
/* <![CDATA[ */
// content of your Javascript goes here
/* ]]> */
</script>


<?php	
	
	
	
}

add_action('wp_footer', 'fa_footer', 100);

?>