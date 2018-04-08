<?php
/*
 	Template Name: Single Page
 */
?>
<?php get_header(); ?>
<?php
	if ( have_posts() )
	{
		while ( have_posts() )
		{
			the_post();
			$title = get_the_title();

			echo $title;
		}
	}
?>
<?php get_footer(); ?>
