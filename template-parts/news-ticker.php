<?php $ticker = new WP_Query(array('post_type' => 'news' , 'posts_per_page' => 5)); ?>

<?php if ($ticker->have_posts()) : ?>

<ul id="scroller">


<?php while ($ticker->have_posts()) : $ticker->the_post() ?>


	<li><?php the_title(); ?></li>

<?php endwhile; ?>  


</ul>    



<?php endif; ?>