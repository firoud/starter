<?php $about = new WP_Query(array('post_type' => 'page', 'page_id' => 30)); ?>

<?php if ($about->have_posts()) : ?>

<div class="row">

<?php while ($about->have_posts()) : $about->the_post() ?>

<div class="col-md-12"><h2><?php the_title(); ?></h2></div>


<div class="col-md-4">
<a class="thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
</div>


<div class="col-md-8">
<?php fa_trim_words(get_the_content(), '300'); ?>
</div>



<?php endwhile; ?>


</div>


<?php endif; ?>