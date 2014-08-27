<?php $videos = new WP_Query(array('post_type' => 'video' , 'posts_per_page' => 1)); ?>


<?php if ($videos->have_posts()) : ?>

<?php while ($videos->have_posts()) : $videos->the_post() ?>

		   <?php $url = get_post_meta(get_the_ID(), '_firoud_video_url' , true); ?>

<div class="pretty-embed" data-pe-videoid="<?php echo get_yt_video_id($url); ?>" data-pe-fitvids="true"></div>

<?php endwhile; ?>

<?php endif; ?>