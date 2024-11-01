<?php
get_header(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content('<p class="serif">' . __('Read the rest of this page','vm_default') . ' &raquo;</p>'); ?>

			</div>
		</div>
	  <?php endwhile; endif; ?>

	<?php comments_template(); ?>
<div id="first_footer">&nbsp;</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
