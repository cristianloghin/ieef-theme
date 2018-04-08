<?php

?>
<?php get_header(); ?>

<?php
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

	$terms = get_terms('newslocation', $args);
	$current =	$wp_query->queried_object;
	$data = array();

	foreach ($terms as $location)
	{
		$value['name'] = $location->name;
		$value['link'] = $post->post_type . '/' . $location->slug;
		$value['active'] = ( $location->name == $current->name ) ? true : false;
		array_push($data, $value);
	}
	// include country menu module
	get_part('mod_14.php', $data);

?>

<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); 
			// include news article module
			get_part('mod_15.php', $post);
		}
	}
?>

<?php get_footer(); ?>