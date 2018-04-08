<?php
	
?>
<?php get_header(); ?>

<?php
	
	// include country menu module
	//get_part('mod_14.php', $cases);

?>
<?php
	if ( have_posts() ) {
		$data = array();
		while ( have_posts() ) {
			the_post();
			$case['content'] = $post;

			if ( get_field('detailed_case_show') )
			{
				$case['link'] = get_permalink($post->ID);
				$case['label'] = 'Read More';
			}
			else
			{
				$case['link'] = '';
				$case['label'] = '';
			}
			array_push($data, $case);
		}

		// include the case studies block
		get_part('blk_10.php', $data);
	}
?>

<?php get_footer(); ?>