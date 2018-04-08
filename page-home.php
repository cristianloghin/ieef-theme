<?php
/*
 	Template Name: Home
 */
?>
<?php get_header(); ?>
<?php
	
// Retrieve the most recent 3 articles

$args = array(
	'post_type' => 'news',
	'posts_per_page' => 3,
	'orderby' => 'date'
);
	
$news = new WP_Query( $args );

if( $news->have_posts() )
{
	// include news section block
	get_part('blk_02.php', $news);
}
wp_reset_query();

$blocks = get_field('home_blocks');
// include home page blocks
get_part('blk_03.php', $blocks);

?>
<!-- Action Button -->
<div id="actionButton">
	<div class="container">
		<div>
			<?php
				$button['link'] = get_field('action_button_link');
				$button['text'] = get_field('home_action_button_text');
				// include blue button component
				get_part('com_02.php', $button);
			?>
		</div>
	</div>
</div>
<!-- #Action Button -->
<?php get_footer(); ?>
