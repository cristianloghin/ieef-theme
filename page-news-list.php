<?php
/*
 	Template Name: News Page
 */
?>
<?php get_header(); ?>

<?php
	$args = array(
		'post_type' => 'news',
		'orderby' => 'date'
	);
	$news = new WP_Query( $args );
	
	if ( !$news->have_posts() ) {

		echo '<p class="intro">No information available at this time.</p>';
	}
	else
	{
		while ( $news->have_posts() )
		{
			$news->the_post();
			// include news article module
			get_part('mod_15.php', $post);
		}
		wp_reset_query();
	}
?>
<?php get_footer(); ?>
