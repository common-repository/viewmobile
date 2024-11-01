<?php
load_theme_textdomain('vm_default');
echo "<?xml version=\"1.0\" encoding=\"";
bloginfo('charset');
echo "\" ?>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN"
"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; <?php _e('Blog Archive','vm_default'); ?> <?php } ?> <?php wp_title(); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<meta http-equiv="content-type" content="application/xhtml+xml" />
<meta http-equiv="cache-control" content="max-age=300" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?nocache=<?php echo time() ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
</head>
<body>

<div id="header">
<h1><?php bloginfo('name'); ?></h1>
<p><small><?php bloginfo('description'); ?></small></p>
</div>
<div id="nav">
<a href="<?php echo get_settings('home'); ?>/"><?php _e('Home','vm_default'); ?></a>
</div>

<div id="content">
