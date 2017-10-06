<?php get_header() ?>

		<div class="main">

<?php the_post(); ?>

		<div id="post-<?php the_ID() ?>" class="post<?php
			if(the_title( '', '', false ) == '') {
				echo " untitled";
			}
			?>">

			<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
			<div class="byline">
				<span class="author">by <?php
					echo "<a href='" . esc_url(get_author_posts_url(get_the_author_meta("ID"))) . "'>";
					echo get_the_author();
					echo "</a>";
					?></span>
				<span class="published"><?php the_time('F j, Y'); ?></span>
			</div>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<div class="entry-meta">
				<span class="published"><?php the_time('F j, Y'); ?></span>
				<?php if (get_the_category_list()) { ?>
				<span class="cat-links"><?php printf('Category: %s', get_the_category_list(', ')) ?></span>
				<?php } ?>
				
				<?php if (get_the_tag_list()) { ?>
				<?php echo get_the_tag_list('<span class="tag-links">Tags: ', ', ', '</span>'); ?>
				<?php } ?>
				
				<?php edit_post_link('Edit', "\t\t\t\t\t<span class=\"edit-link\">", "</span>"); ?>
			</div>

		</div><!-- .post -->

		<?php comments_template(); ?>

		<div class="nav-prev-next">
			<?php
			$prev = get_previous_post_link('%link');
			$next = get_next_post_link('%link');
			if($prev) echo "<p class=\"previous\">Previous: $prev</p>";
			if($next) echo "<p class=\"next\">Next: $next</p>";
			?>
		</div>
		
		</div><!-- #content -->
		<?php get_sidebar() ?>

<?php get_footer() ?>