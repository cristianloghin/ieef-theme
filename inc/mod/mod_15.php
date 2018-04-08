<?php
	/* News and Case Studies Location Menu Module */
?>

<section class="mod_15">
	<div class="container">
		<div>
			<?php
				$title = $data->post_title;
				$date = get_the_date('F j, Y', $data->ID);
				$link = get_permalink($data->ID);
				$excerpt = $data->post_excerpt;
			?>
			<div>
				<p class="small">
					<?php echo $date; ?>
				</p>
			</div>
			<h2><?php echo $title; ?></h2>
			<p><?php echo $excerpt; ?></p>
			<?php
				$button['link'] = $link;
				$button['text'] = 'Read More';
				// include a button
				get_part('com_01.php', $button);
			?>
		</div>
	</div>
</section>
