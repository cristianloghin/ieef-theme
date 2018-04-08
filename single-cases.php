<?php
/*
 	Single Post Template: Case Study
 	Description: Hello
 */

get_header(); ?>
<?php
	if ( have_rows('content_blocks') )
	{
		$id = 0;
		while ( have_rows( 'content_blocks' ) )
		{
			the_row();
			$data = array();
			switch ( get_row_layout() )
			{
				case 'project_text_block' :
					$data = get_sub_field('project_text');
					// include case text module
					get_part('mod_17.php', $data);
					break;
				case 'project_images_block' :
					$data['images'] = get_sub_field('project_images');
					if( get_sub_field('block_type') == 'Carousel' )
					{
						$data['id'] = $id;
						// include case carousel module
						get_part('mod_18.php', $data);
						$id ++;
					}
					else
					{
						// include case gallery module
						get_part('mod_19.php', $data);
					}
					break;
			}
		}
	}
	// Links at the bottom of the case study
	echo '<section class="case_links">';
	echo '<div class="container">';
	echo '<div>';
	$case_location = get_the_terms($post->ID, 'caselocation');
	if ( $case_location != '' )
	{
		$button['link'] = '/case-studies/' . $case_location[0]->slug;
	}
	else
	{
		$button['link'] = '/case-studies';
	}

	$button['text'] = 'Back to Case Studies';
	// include back button
	get_part('com_03.php', $button);
	if ( have_rows( 'extra_links' ) )
	{	
		echo '<div>';
		echo '<h3>See also:</h3>';
		while ( have_rows( 'extra_links' ) )
		{
			the_row();
			if ( get_sub_field('link_type') == 'Internal' )
			{
				$button['link'] = get_sub_field('internal_link');
			}
			else
			{
				$button['link'] = get_sub_field('external_link');
			}
			$button['text'] = get_sub_field('link_label');
			// include links button
			get_part('com_01.php', $button);
		}
		echo '</div>';
	}
	echo '</div>';
	echo '</div>';
	echo '</section>';
?>
<?php get_footer(); ?>
