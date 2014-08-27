<?php $news = new WP_Query(array('post_type' => 'news' , 'posts_per_page' => 5)); ?>


<?php if ($news->have_posts()) : ?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Latest News</h3>
  </div>
  <div class="panel-body">
  
  
  
  
  
<ul class="media-list">

<?php while ($news->have_posts()) : $news->the_post() ?>


  <li class="media">
    <a class="pull-left thumbnail" href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail('thumbnail', array('class' => 'media-object' , 'alt' => '')); ?>
    </a>
    <div class="media-body">
      <h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
      <time><?php the_time("Y-m-d"); ?></time>
      <?php the_excerpt(); ?>
    </div>
  </li>
  
  
<?php endwhile; ?>  
  
</ul>
  
  
  
  
  
  
  </div>
  
  <a class="btn btn-link" href="<?php echo get_post_type_archive_link('news'); ?>">More News</a>
  
</div>

<?php endif; ?>