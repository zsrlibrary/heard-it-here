<?php get_header(); ?>

		<div class="main">

<?
// Declare global $more (before the loop). Then the_content() will show the entire post contents, not just the excerpt
global $more;
$more = 1;
?>

<?php
// What kind of archive are we looking at? category, tag, date, author?
$browsingTitle = single_term_title("", false);
if(!empty($browsingTitle)) {
	if(is_tag()) {
		// tag archives
		echo "<h2 class=\"top\">Tag: <span class=\"title\">$browsingTitle</span></h2>";
	} elseif (is_category()) {
		// category archives
		echo "<h2 class=\"top\">Category: <span class=\"title\">$browsingTitle</span></h2>";
	} elseif (is_tax("semester")) {
		// semester archives
		echo "<h2 class=\"top\">Semester: <span class=\"title\">$browsingTitle</span></h2>";
	}
} elseif (is_search()) {
	// search archives
	echo "<h2 class=\"top\">Search results for <span class=\"title\">\"" . get_search_query() . "\"</span></h2>";
	if(!have_posts()) {
		echo "<p>No matching search results.</p>";
	}
} elseif(is_author()) {
	// author archives
	echo "<h2 class=\"top\">Articles by <span class=\"title\">";
	echo get_the_author();
	echo "</span></h2>";
} elseif(is_archive()) {
	// daily monthly, yearly archives
	if ( is_day() ) {
		$date = get_the_date();
		echo "<h2 class=\"top\">Daily Archives: <span class=\"title\">$date</span></h2>";
	} elseif ( is_month() ) {
		$date = get_the_date('F Y');
		echo "<h2 class=\"top\">Monthly Archives: <span class=\"title\">$date</span></h2>";
	} elseif ( is_year() ) {
		$date = get_the_date('Y');
		echo "<h2 class=\"top\">Yearly Archives: <span class=\"title\">$date</span></h2>";
	} else {
		echo "Archives";
	}
}
?>


<?php while ( have_posts() ) : the_post() ?>
			<div id="post-<?php the_ID() ?>" class="postSummary<?php
			if(get_post_format() == 'aside') {
				echo " untitled";
			}
			?>">
				<?php
				$post_id = get_post_thumbnail_id();
				$image_url = wp_get_attachment_image_src($post_id,'large', true);
				$summaryImgURL = $image_url[0];
				
				echo "<a class=\"summaryImg\" href=\"";
				the_permalink();
				echo "\" style=\"background-image: url('$summaryImgURL');\">";
				// $tn = get_the_post_thumbnail($post_id, 'large');
				// if (!empty($tn)) {
				// 	echo $tn;
				// } else {
				// 	echo "<img class=\"missingImg\" src='missingImg.jpg' width=\"150px\" height=\"150px\" />";
				// }
				echo "</a>";
				?>
				<span class="published"><?php the_time('F j, Y'); ?></span>
				<span class="author">by <?php the_author(); ?></span>
				<h2><a class="title" href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
				<div class="entry-content">
					<?php the_excerpt(); ?>
				</div>

					<div class="entry-meta">
<!--
						<?php if (get_the_category_list()) { ?>
						<span class="cat-links">Category: <?php echo(get_the_category_list(', ')); ?></span>
						<?php } ?>
-->

						<?php
// if (get_the_tag_list()) {
// 	echo get_the_tag_list('<span class="tag-links">Tags: ', ', ', '</span>');
// }
						?>

						<?php
						// edit_post_link('Edit', "\t\t\t\t\t<span class=\"edit-link\">", "</span>");
						?>

						<!-- <span class="comments-link"><?php comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)') ?></span> -->
					</div>

			</div><!-- .postSummary -->

<?php comments_template() ?>
<?php endwhile ?>

		<div class="nav-prev-next">
			<p class="previous"><?php next_posts_link('&larr; Older Articles') ?></p>
			<p class="next"><?php previous_posts_link('Newer Articles &rarr;') ?></p>
		</div>


		</div><!-- #content -->
		<?php get_sidebar(); ?>		

<?php get_footer(); ?>
