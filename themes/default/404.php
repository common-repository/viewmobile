<?php
get_header();
?>
<?php if (!function_exists("stripos")) {
  function stripos($str,$needle,$offset=0)
  {
     return strpos(strtolower($str),strtolower($needle),$offset);
  }
}
?>
		<h2 class="center"><?php _e('Error 404 - Not Found', 'vm_default'); ?></h2>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
