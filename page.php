<?php get_header() ?>

		<div class="main">
			<?php the_post() ?>
			<div id="post-<?php the_ID(); ?>" class="post page">

				<!-- <h2 class="page-title"><?php the_title(); ?></h2> -->

				<div class="entry-content">
					<?php the_content() ?>
					<?php edit_post_link(__('Edit', 'sandbox'),'<span class="edit-link">','</span>') ?>
				</div>
		
			</div><!-- .post -->
			<?php comments_template(); ?>
		</div><!-- content -->
		<?php get_sidebar() ?>

<?php get_footer() ?>