<?php get_header() ?>

		<div class="main">

			<div class="post error404">

				<h2 class="entry-title"><?php _e('Not Found', 'sandbox') ?></h2>
	
				<div class="entry-content">

					<p><?php echo('Oops. The requested page seems to be missing. Maybe searching will help. Or you could start over from the <a href="' . home_url() . '">home page</a>.'); ?></p>
	
					<br>
					<form id="error404-searchform" method="get" action="<?php bloginfo('home') ?>">
						<div>
							<input id="error404-s" name="s" type="text" value="<?php echo wp_specialchars(stripslashes($_GET['s']), true) ?>" size="40" />
							<input id="error404-searchsubmit" name="searchsubmit" type="submit" value="Search" />
						</div>
					</form>

				</div>
			</div><!-- .post -->

		</div><!-- #content -->

<?php get_sidebar() ?>
<?php get_footer() ?>