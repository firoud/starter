<?php get_header(); ?>


    <div class="row">
    
    <div class="col-md-12"> 
    
    
    <?php get_template_part('template-parts/news-ticker'); ?>
    
    
    </div>
    
    
    </div>



    
    
    <div class="row">
    
    <div class="col-md-12">    
    
       <?php get_template_part('template-parts/nivo-slider'); ?>
    </div> 
       
    </div>    
 
    <div class="row">
    
    <div class="col-md-12">  
       
    <?php get_template_part('template-parts/owl-carousel'); ?>
    
    </div> 
       
    </div>     
 
    
     <div class="row">
     
    <div class="col-md-7"> <?php get_template_part('template-parts/about-us'); ?> </div>
    
    <div class="col-md-5">
	<?php get_template_part('template-parts/latest-news'); ?>
    <?php get_template_part('template-parts/youtube'); ?>
    </div> 
       
    </div> 




<?php get_footer(); ?>