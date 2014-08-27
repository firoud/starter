<?php get_header(); ?>
    
    
<div class="row">

	<div class="col-md-8">
    
    
    <?php while(have_posts()) : the_post(); ?>
    
        <div <?php post_class(); ?>>
        
        <h2><?php the_title(); ?></h2>
        
        <div class="post-meta">
        <?php _e('Posted on'); ?><?php _e('By'); ?> <span><i class="fa fa-edit"></i></span> <?php the_author(); ?>
        <?php the_category(','); ?>
        </div>
        
        <?php if (has_post_thumbnail()) : ?>
        	<div class="post-thumbnail"><?php the_post_thumbnail(); ?></div>
        <?php endif; ?>
        
        <div class="post-content"><?php the_content(); ?></div>
        
        
        
        </div><!--/.post -->
    
    <?php endwhile; ?>
    
    <?php comments_template(); ?>
    
    
    </div><!--/.col-md-8 -->
    
    <div class="col-md-4"><?php get_sidebar('blog'); ?></div><!--/.col-md-8 -->


</div><!--/.row -->


<?php get_footer(); ?>