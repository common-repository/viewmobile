<?php
get_header(); ?>

		<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle"><?php echo sprintf(__("Archive for the '%s' Category",'vm_default'),single_cat_title('', FALSE));?></h2>

 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle"><?php echo sprintf(__('Archive for %s', 'vm_default'), get_the_time(__('F jS, Y','pda-theme'))); ?></h2>

	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle"><?php echo sprintf(__('Archive for %s', 'vm_default'), get_the_time(__('F, Y','pda-theme'))); ?></h2>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle"><?php echo sprintf(__('Archive for %s', 'vm_default'), get_the_time('Y')); ?></h2>

	  <?php /* If this is a search */ } elseif (is_search()) { ?>
		<h2 class="pagetitle"><?php _e('Search Results','vm_default');?></h2>

	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle"><?php _e('Author Archive','vm_default');?></h2>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle"><?php _e('Blog Archives','vm_default');?></h2>

		<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo sprintf(__('Permanent Link to %s','vm_default'),the_title('','',FALSE)); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time(__('l, F jS, Y','vm_default')) ?></small>

				<div class="entry">
					<?php the_excerpt() ?>
				</div>

				<p class="postmetadata"><?php _e('Posted in','vm_default'); print ' '; the_category(', '); ?> | <?php edit_post_link(__('Edit','vm_default'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments','vm_default') . ' &#187;', __('1 Comment','vm_default') . ' &#187;', __('% Comments','vm_default') . ' &#187;'); ?></p>

			</div>

		<?php endwhile; ?>

		<div id="first_footer">
			<?php next_posts_link('&laquo; ' . __('Previous Entries','vm_default')) ?>&nbsp;<?php previous_posts_link(__('Next Entries','vm_default') . ' &raquo;') ?>
		</div>

	<?php else : ?>

		<h2 class="center"><?php _e('Not Found','vm_default');?></h2>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
