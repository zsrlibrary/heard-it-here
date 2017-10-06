<footer>

		<!--Widgets-->
		<div class="widget-area">
			<ul class="xoxo">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : // begin  secondary sidebar widgets ?>
				<?php endif; // end secondary sidebar widgets  ?>
			</ul>
		</div><!-- #secondary .sidebar -->
		
		<div id="footer-widget-area" class="sidebar">
			<ul class="xoxo">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar(3) ) : // begin widgets ?>
				<?php endif; // end widgets  ?>
			</ul>
		</div><!-- footer-widget-area .sidebar -->
		<!--end Widgets-->

		
<?php
// // show categories
// echo wp_list_categories();
// echo wp_list_categories(array('order' => 'DESC', 'title_li' => __('Semesters'), 'taxonomy' => 'semester'));
?>

		<nav>
			<?php wp_nav_menu(); ?>
		</nav>

		<div class="copyright">&copy; Copyright 2013 - <?php echo date("Y"); ?>. All rights reserved.</div>

</footer>

</div><!-- container -->

	<?php wp_footer() ?>
	</body>
</html>