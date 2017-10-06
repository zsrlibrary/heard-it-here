<!DOCTYPE html>
<html>
<head>
	<title><?php
		wp_title('|', true, 'right'); // the title of the current page + a separator
		bloginfo( "name" ); // the title of the site
	?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head() ?>
    <link href="<?php bloginfo('template_directory') ?>/style.css" rel="stylesheet">

	<script src="<?php bloginfo('template_directory') ?>/jquery-1.11.2.min.js"></script>

	<script src="<?php bloginfo('template_directory') ?>/jquery.fitvids.js"></script>

	<script src="<?php bloginfo('template_directory') ?>/swipebox/js/jquery.swipebox.min.js"></script>
    <link href="<?php bloginfo('template_directory') ?>/swipebox/css/swipebox.css" rel="stylesheet">

	<script src="<?php bloginfo('template_directory') ?>/js.js"></script>
</head>
<body>
	<div class="container">
		

		<span class="mobileMenu"><a><img class="menuIcon" src="<?php bloginfo('template_directory') ?>/menu.svg" /></a></span>
		<nav class="header hide">
			<?php wp_nav_menu(); ?>
<?php
// show categories
$taxonomies = array( 
    'category',
);
$args = array(
    'orderby'           => 'name', 
    'order'             => 'ASC',
    'hide_empty'        => true, 
    'exclude'           => array(), 
    'exclude_tree'      => array(), 
    'include'           => array(),
    'number'            => '', 
    'fields'            => 'all', 
    'slug'              => '',
    'parent'            => '',
    'hierarchical'      => true, 
    'child_of'          => 0,
    'childless'         => false,
    'get'               => '', 
    'name__like'        => '',
    'description__like' => '',
    'pad_counts'        => false, 
    'offset'            => '', 
    'search'            => '', 
    'cache_domain'      => 'core'
); 
$categories = get_terms($taxonomies, $args);
if(!empty($categories)) {
	echo "<ul class='topNav'>";
	echo "<li>";
	echo "Categories";
		echo "<ul>";
		foreach ($categories as $category) {
			echo "<li>";
			echo "<a href=\"" . home_url() . "/category/" . $category->slug . "/\">";
			echo $category->name;
			echo "</a>";
			echo "</li>";
		}
		echo "</ul>";
	echo "</li>";
	echo "</ul>";
}

// show our custom "Semesters" taxonomy
// no default values. using these as examples
$taxonomies = array( 
    'semester',
);
$args = array(
    'orderby'           => 'name', 
    'order'             => 'DESC',
    'hide_empty'        => true, 
    'exclude'           => array(), 
    'exclude_tree'      => array(), 
    'include'           => array(),
    'number'            => '', 
    'fields'            => 'all', 
    'slug'              => '',
    'parent'            => '',
    'hierarchical'      => true, 
    'child_of'          => 0,
    'childless'         => false,
    'get'               => '', 
    'name__like'        => '',
    'description__like' => '',
    'pad_counts'        => false, 
    'offset'            => '', 
    'search'            => '', 
    'cache_domain'      => 'core'
); 
$semesters = get_terms($taxonomies, $args);
if(!empty($semesters)) {
	echo "<ul class='topNav'>";
	echo "<li>";
	echo "Semesters";
		echo "<ul>";
		foreach ($semesters as $semester) {
			echo "<li>";
			echo "<a href=\"" . home_url() . "/semester/" . $semester->slug . "/\">";
			echo $semester->name;
			echo "</a>";
			echo "</li>";
		}
		echo "</ul>";
	echo "</li>";
	echo "</ul>";
}

?>
			<a class="search"><img class="searchIcon" src="<?php bloginfo('template_directory') ?>/search.svg" /></a>
			<form role="search" id="searchForm" class="searchform hide" action="<?php echo(home_url()); ?>" method="get" accept-charset="utf-8">
				<input type="text" name="s" value="" id="s"><button type="submit" value="Search">Search</button>
			</form>
		</nav>

		<header>
			<h1 class="siteTitle"><a href="<?php echo(home_url()); ?>"><?php bloginfo( "name" ); ?></a></h1>
			<h2 class="description"><?php bloginfo("description"); ?></h2>
		</header>
