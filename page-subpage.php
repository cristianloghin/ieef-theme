<?php
/*
 	Template Name: Sub-Page
 */
?>
<?php get_header(); ?>
<?php
	
	global $post;

	$args = array(
		'post_status' => 'publish',
		'parent' => $post->post_parent,
		'sort_column' => 'menu_order'
	);

	$pages = get_pages($args);
	// Include the sub-menu module for tablet and desktop
	get_part('mod_05.php', $pages);

	// display title

	echo '<div class="subpage_title"><div class="container"><h2>' . $post->post_title . '</h2></div></div>';

	if ( have_rows('content_blocks') )
	{
		while ( have_rows('content_blocks') )
		{
			the_row();
			switch ( get_row_layout() )
			{
				case 'list_block' :
					$list = array(
						'title' => get_sub_field('list_block_title'),
						'style' => get_sub_field('list_block_style'),
						'list' => get_sub_field('list_block_items')
					);

					// include list module
					get_part('mod_08.php', $list);
					break;
				case 'leading_block' :
					$block = array(
						'title' => get_sub_field('leading_block_title'),
						'content' => get_sub_field('leading_block_content'),
						'link_address' => get_sub_field('leading_block_link'),
						'link_label' => get_sub_field('leading_block_label')
					);
					// include leading text module
					get_part('mod_09.php', $block);
					break;
				case 'people_block' :
					$people = array(
						'title' => get_sub_field('people_block_title'),
						'list' => get_sub_field('people_block_list')
					);
					// include people block
					get_part('blk_05.php', $people);
					break;
				case 'text_block' :
					$text = array(
						'title' => get_sub_field('text_block_title'),
						'list' => get_sub_field('text_block_list')
					);
					// include text block module
					get_part('blk_06.php', $text);
					break;
				case 'process_block' :
					$process = array(
						'title' => get_sub_field('process_block_title'),
						'steps' => get_sub_field('process_block_steps')
					);
					// include process block
					get_part('blk_07.php', $process);
					break;
				case 'tree_block' :
					$tree = array(
						'title' => get_sub_field('decision_tree_block_title'),
						'questions' => get_sub_field('tree_block_questions'),
						'answer_yes' => get_sub_field('tree_block_positive'),
						'yes_link' => get_sub_field('tree_block_positive_link'),
						'yes_label' => get_sub_field('tree_block_positive_label'),
						'answer_no' => get_sub_field('tree_block_negative'),
						'no_link' => get_sub_field('tree_block_negative_link'),
						'no_label' => get_sub_field('tree_block_negative_label')
					);
					// include tree block
					get_part('blk_08.php', $tree);
					break;
				case 'info_block' :
					$info = array(
						'title' => get_sub_field('info_block_title'),
						'text'	=> get_sub_field('info_block_text'),
						'image' => get_sub_field('info_block_image')
					);
					// include info graphic module
					get_part('mod_13.php', $info);
					break;
			}
		}
	}
	
	$args = array(
		'post_status' => 'publish',
		'exclude' => $post->ID,
		'parent' => $post->post_parent,
		'sort_column' => 'menu_order'
	);

	$pages = get_pages($args);
	// Include the sub-menu module for tablet and desktop
	get_part('mod_06.php', $pages);

?>
<?php get_footer(); ?>
