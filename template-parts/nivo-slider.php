
<?php $slides = new WP_Query(array('post_type' => 'slide', 'posts_per_page' => 4 , 'orderby' => 'menu_order' , 'order' => 'ASC')); ?>

<?php if ($slides->have_posts()) : ?>



<div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
            

<?php while($slides->have_posts()) : $slides->the_post(); ?>
 
 
                 <?php  
				 
				       $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
				       $image_full =  wp_get_attachment_image_src( $post_thumbnail_id, 'slide' );
					   $image_thumb =  wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
					   $link = get_post_meta(get_the_ID() , '_firoud_slide_url_link', true);
					   $target = get_post_meta(get_the_ID() , '_firoud_slide_url_target', true);
					   $text = get_post_meta(get_the_ID() , '_firoud_slide_url_text', true);
				
				 ?>
            
				<?php if ($link) : ?>
                	<a <?php echo ($target)?'target="' . $target . '"':''; ?>  href="<?php echo esc_url($link); ?>">
                <?php endif; ?>
                

                
                
                <img src="<?php echo $image_full[0]; ?>" data-thumb="<?php echo $image_thumb[0]; ?>" alt="" title="#htmlcaption-<?php the_ID(); ?>" />
                
                
                <?php if ($link) : ?></a><?php endif; ?>
 
<?php endwhile; ?> 
                
            </div>
            
       
     <?php while($slides->have_posts()) : $slides->the_post(); ?> 
     
     
                      <?php  
				 
					   $link = get_post_meta(get_the_ID() , '_firoud_slide_url_link', true);
					   $target = get_post_meta(get_the_ID() , '_firoud_slide_url_target', true);
					   $text = get_post_meta(get_the_ID() , '_firoud_slide_url_text', true);
				
				       ?>
      
            
            <div id="htmlcaption-<?php the_ID(); ?>" class="nivo-html-caption">
                <h2><?php the_title(); ?></h2> 
                <div class="desc"><?php the_content(); ?></div>
                
                <?php if ($link) : ?>
                	<a <?php echo ($target)?'target="' . $target . '"':''; ?>  href="<?php echo esc_url($link); ?>" class="btn btn-default">
						<?php echo $text; ?>
                    </a>
                <?php endif; ?>
                
            </div>
            
     <?php endwhile; ?>       
            
        </div>
        
<?php endif; ?>        