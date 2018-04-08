<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ieef
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.png">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,700,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:300' rel='stylesheet' type='text/css'>
<link href="<?php bloginfo('template_url'); ?>/stylesheets/style.css" rel="stylesheet">
<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/functions.js"></script>

<?php wp_head(); ?>
</head>

<body <?php custom_body_class(); ?>>
<?php
	
	global $post;
	$taxonomy = get_taxonomy_template();
	$data['is_case'] = false;

	if( is_front_page() )
	{
		// homepage
		$data['header_images'] = get_field('header_images');
		$data['intro_txt'] = get_field('intro_text');

		if ( null !== get_field('intro_link') )
		{
			$data['intro_link']['slug'] = get_field('intro_link');
			$data['intro_link']['txt'] = get_field('intro_link_text');
		}
	}
	else if ( is_page() )
	{
		// is a page, not a post
		if ( $post->post_parent )
		{
			// is subpage
			$header_id = $post->post_parent; // set the id to the parent to display the parent title
			$data['title'] = get_the_title($header_id);
			$data['intro_txt'] = get_field('intro_text', $header_id);
		}
		else
		{
			// is top level page
			$data['title'] = get_the_title();
			$data['intro_txt'] = get_field('intro_text');
		}
	}
	else if ( $taxonomy != '' )
	{
		// is a taxonomy page
		$data['title'] = 'Case Studies';
		// get the case studies categories
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

		$terms = get_terms('caselocation', $args);

		$sorted_terms = array();

		foreach( $terms as $term )
		{
			$order = get_field('taxonomy_order', $term);
			$sorted_terms[$order] = $term;
		}

		ksort( $sorted_terms, SORT_NUMERIC );
		$current =	$wp_query->queried_object;
		$cases = array();

		foreach ($sorted_terms as $location)
		{
			$value['name'] = $location->name;
			if ( $post->post_type != 'news' )
			{
				$value['link'] = 'case-studies/' . $location->slug;
			}
			else
			{
				$value['link'] = 'news/' . $location->slug;
			}
			$value['active'] = ( $location->name == $current->name ) ? true : false;
			array_push($cases, $value);
		}

		$data['cases'] = $cases;
	}
	else if ( is_archive() )
	{
		// is archive page (News)
		$data['title'] = 'News';
	}
	else
	{
		// is post
		if ( $post->post_type == 'cases' )
		{
			// is case study
			$data['is_case'] = true;
			$data['header_image'] = get_field('header_image');
			$data['intro_title'] = get_field('leading_title');
			$data['intro_txt'] = get_field('leading_text');
		}
		$data['title'] = $post->post_title;		
	}

	// retrieve and order the main menu
	$data['main_menu'] = get_main_menu();

	// Include the header block
	get_part('blk_01.php', $data );
?>
	<!-- Content Wrapper -->
	<div class="content_wrapper">
