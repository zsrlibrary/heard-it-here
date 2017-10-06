<?php
/*
Template Name: Journalists
*/
?>
<?php get_header() ?>

		<div class="main">
			<?php the_post() ?>
			<div id="post-<?php the_ID(); ?>" class="post page journalists">

				<!-- <h2 class="page-title"><?php the_title(); ?></h2> -->

				<div class="entry-content">
					<?php
					// first, show the page content (which includes the editor, Phoebe Zerwick, bio)
					the_content();
					?>
					<?php
					// get all authors
					$authors = get_users(array(
							'orderby' => 'display_name',
							// 'orderby' => 'user_login',
							// 'who' => 'authors'
						)
					);
					
					// group authors by year
					foreach ($authors as $author) {
						// echo "<br>Author: " . $author->data->display_name . ", " . $author->data->user_login;
						// get most recent post by each author
						$args = array(
							'author'         =>  $author->ID,
							'orderby'        =>  'post_date',
							'order'          =>  'DESC',
							'posts_per_page' => 1,
							'post_status'    => 'publish'
						);
						$most_recent_post = get_posts( $args );
						$year = "";
						if(!empty($most_recent_post[0]->post_date)) {
							$year = substr($most_recent_post[0]->post_date, 0, 4);
							$authorsByYear[$year][] = $author;
						}
					}

					// show each year and its authors, starting with 2013
					$year = date("Y");
					while ($year >= 2013) {
						if(!empty($authorsByYear[$year])) {
							echo "<a name=\"$year\"></a>";
							echo "<h3 class=\"journalistsYear\">$year Journalists</h3>";
						}
						foreach ($authorsByYear[$year] as $author) {
							// check if the author has published anything
							if (count_user_posts($author->data->ID)) {
								echo "<div class='journalist'>";
								// show author avatar image
								echo get_avatar( $author->data->ID, 128 ); // 512 is the max size
								// author's name
								echo "<div class='bio'>";
								echo "<h3>";
								// echo "<a href='" . esc_url(get_author_posts_url($author->data->ID)) . "'>";
								echo $author->data->display_name;
								// echo $author->year;
								// echo "</a>";
								echo "</h3>";
								// mt_profile_img($author->data->ID);
								// author's bio/description from their profile
								$authorBio = get_the_author_meta('description', $author->data->ID);
								if(empty($authorBio)) {
									// echo "No profile information for this author.";
								} else {
									echo $authorBio;
								}
								// a link to articles by this author
								echo "<p class='viewArticlesByAuthor'>";
								echo "<a href='" . esc_url(get_author_posts_url($author->data->ID)) . "'>";
								echo "View articles by " . $author->data->display_name;
								echo "</a>";
								echo "</p>";
								echo "</div>";
								echo "</div>";
							}
						}
						$year--;
					}

					?>
					<?php //edit_post_link(__('Edit', 'sandbox'),'<span class="edit-link">','</span>') ?>
				</div>
		
			</div><!-- .post -->
			<?php //comments_template(); ?>
		</div><!-- content -->
		<?php get_sidebar() ?>

<?php get_footer() ?>