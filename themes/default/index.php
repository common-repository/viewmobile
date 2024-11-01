<?php
get_header(); ?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

<div class="post">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo sprintf(__('Permanent Link to %s','vm_default'),the_title('','',FALSE)); ?>"><?php the_title(); ?></a></h2>
<small><?php the_time(__('F jS, Y','vm_default')) ?></small>
<div class="entry"><?php the_excerpt(); ?></div>

<p class="postmetadata"><?php _e('Posted in','vm_default'); ?> <?php the_category(', ') ?> | <?php edit_post_link(__('Edit','vm_default'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments','vm_default') . ' &#187;', __('1 Comment','vm_default') . ' &#187;', __('% Comments','vm_default') . ' &#187;'); ?></p>
</div>

		<?php endwhile; ?>

<div id="first_footer"><?php next_posts_link('&laquo; ' . __('Previous Page','vm_default')); ?> | <?php previous_posts_link(__('Next Page','vm_default') . ' &raquo;') ?></div>

	<?php else : ?>

		<h2 class="center"><?php _e('Not Found','vm_default'); ?></h2>
		<p class="center"><?php _e("Sorry, but you are looking for something that isn't here.",'vm_default'); ?></p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
