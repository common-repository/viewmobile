<?php
get_header(); ?>


  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
<h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php echo sprintf(__('Permanent Link to %s','vm_default'),the_title('','',FALSE)); ?>"><?php the_title(); ?></a></h2>

<div class="entry">
<?php the_content('<p class="serif">' . __('Read the rest of this entry','vm_default') . ' &raquo;</p>'); ?>
</div>
<p class="postmetadata"><?php echo sprintf(__('This entry was posted on %1$s at %2$s and is filled under:','vm_default'), the_date(__('l, F jS, Y','vm_default'), '', '', FALSE),get_the_time()) . " "; the_category(', ');?></p>
</div>

	<?php comments_template(); ?>

	<div id="first_footer">
		<?php previous_post_link('&laquo; %link') ?> | <?php next_post_link('%link &raquo;') ?>
	</div>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.','vm_default'); ?></p>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
