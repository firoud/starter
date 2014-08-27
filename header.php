<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon"> 

    <title><?php bloginfo('name'); wp_title('|'); ?></title>

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
  
  
<div id="page-wrapper">  
  
<header>

	<div class="container">

		<a id="logo" href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt=""></a>

		<div class="social-media">
        	<ul>
            	<li><a title="Facebook" href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a title="Twitter" href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a title="Youtube" href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
                <li><a title="Linkedin" href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <li><a title="RSS Feed" href="#" target="_blank"><i class="fa fa-rss"></i></a></li>
                <li><a title="Instagram" href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a title="WordPress" href="#" target="_blank"><i class="fa fa-wordpress"></i></a></li>                                                                
            </ul>
        
        </div>

	</div>
    
</header>  

<nav> 

      
      
<?php wp_nav_menu(array('theme_location' => 'primary_menu' , 'menu_class' => 'sf-menu', 'container_class' => 'container hidden-xs')); ?>
 

    <div class="navbar navbar-inverse visible-xs" role="navigation">
		
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
				<?php
                wp_nav_menu( array(
                    'theme_location'    => 'mobile_menu',
                    'depth'             => 0,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'bs-example-navbar-collapse-1',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
                );
                ?>

    </div><!-- /.container -->
      </div>
      
      
      

</nav>



<div id="main">
    <div class="container">