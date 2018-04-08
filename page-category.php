<?php
/*
 	Template Name: Category Page
 */
?>
<?php get_header(); ?>
<?php
	
	global $post;

	$args = array(
		'post_status' => 'publish',
		'parent' => $post->ID,
		'sort_column' => 'menu_order'
	);

	$pages = get_pages($args);
	// Include the sub-menu module for tablet and desktop
	get_part('mod_05.php', $pages);

	// Include the first subpage

	$spid = $pages[0]->ID;

	//show_var($subpage);

	?>
	<!-- First subpage content -->
	<div class="hide_mobile">
		<div class="subpage_title">
			<div class="container">
				<h2><?php echo $pages[0]->post_title; ?></h2>
			</div>
		</div>
<?php

	if ( have_rows('content_blocks', $spid ) )
	{
		while ( have_rows('content_blocks', $spid ) )
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
			}
		}
	}
	?>
	</div>
	<!-- #First subpage content -->
<?php
	// Include the sub-menu module for mobile
	get_part('mod_06.php', $pages);
?>
<?php get_footer(); ?>
