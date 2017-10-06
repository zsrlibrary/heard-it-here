<?php get_header() ?>

		<div class="main">

<?php the_post() ?>

			<h2><a href="<?php echo get_permalink($post->post_parent) ?>" rev="attachment"><?php echo get_the_title($post->post_parent) ?></a></h2>
			<div id="post-<?php the_ID(); ?>" class="post">
				<h3 class="entry-title"><?php the_title() ?></h3>
				<div class="entry-content">
					<div class="entry-attachment">
						<?php the_attachment_link($post->post_ID, true) ?>
					</div>
					<?php the_content(''.__('Read More <span class="meta-nav">&raquo;</span>', 'sandbox').''); ?>

					<?php link_pages("\t\t\t\t\t<div class='page-link'>".__('Pages: ', 'sandbox'), "</div>\n", 'number'); ?>

				</div>
			</div><!-- .post -->

<?php comments_template(); ?>

		</div><!-- #content -->
		<?php get_sidebar() ?>

<?php get_footer() ?>