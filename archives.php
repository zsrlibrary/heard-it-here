<?php
/*
Template Name: Archives
*/
get_header(); ?>

	<div class="main">
		<div class="post archives">

			<h2>Archives</h2>

			<div class="entry-content">
			
				<!-- search form -->
				<form id="searchform" method="get" action="<?php bloginfo('home') ?>">
					<div>
						<input id="s" name="s" type="text" value="<?php echo wp_specialchars(stripslashes($_GET['s']), true) ?>" size="40" />
						<input id="searchsubmit" name="searchsubmit" type="submit" value="Search" />
					</div>
				</form>
	
				<!-- tag cloud -->
				<div class="tags">
				<?php wp_tag_cloud( $args ); ?>
				</div>
	
				<!-- list all posts -->
				<ul>
					<?php
					$myposts = get_posts('numberposts=-1&offset=0');
					foreach($myposts as $post) :
					?>
					<li>
						<span class="published"><?php the_time('M j, Y') ?></span>

						<a href="<?php the_permalink(); ?>"><?php
						
						if(the_title( '', '', false ) !='') {
							the_title();
						} else {
							$content = apply_filters('the_content', $post->post_content);
							// remove html tags
							$content = strip_tags($content);
							// only get the first 10 words
							//$content = implode(' ', array_slice(explode(' ', $content), 0, 3));
							echo $content;
						}
						
						?></a>
					</li>
					<?php endforeach; ?>
				</ul>
				
			</div>
				
		</div><!-- end post -->
	</div><!-- #content -->
	<?php get_sidebar(); ?>

<?php get_footer(); ?>