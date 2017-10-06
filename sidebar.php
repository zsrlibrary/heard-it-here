<?php
/**
 * The sidebar containing the main widget area.
 *
 */
?>

<?php //if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="sidebar" class="widget-area" role="complementary">
<?php
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
// echo "<pre>";
// var_dump($semesters);
// echo "</pre>";

echo "<h2>Semesters</h2>";
echo "<ul>";
foreach ($semesters as $semester) {
	echo "<li>";
	echo "<a href=\"" . home_url() . "/semester/" . $semester->slug . "/\">";
	echo $semester->name;
	echo "</a>";
	echo "</li>";
}
echo "</ul>";



// show widgets
dynamic_sidebar( 'sidebar-1' );
?>
	</div><!-- #secondary -->
<?php //endif; ?>	
