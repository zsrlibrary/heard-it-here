<?
/*
Template Name: entry page
*/
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php
bloginfo('name');
wp_title();
?></title>
	<?php wp_head() ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/jquery-1.11.2.min.js"></script>

<!-- 	this theme's stylesheet -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />


	<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js.js"></script>
</head>
<body class="entryPage">
	<div class="container">
		<div class="main">

<?php the_post(); ?>

		<div id="post-<?php the_ID() ?>" class="post<?php
			if(the_title( '', '', false ) == '') {
				echo " untitled";
			}
			?>">

			<div class="entry-content">
				<?php the_content(); ?>
			</div>

		</div><!-- .post -->
		
		</div><!-- #content -->
	</div><!-- #container -->
</body>
</html>