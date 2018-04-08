<?php
	/* Leading Text Module */
?>

<section class="mod_09">
	<div class="container">
		<?php
			if ( $data['title'] != '' )
			{
				echo '<h2>' . $data['title'] . '</h2>';
			}
			echo '<p class="leading">' . $data['content'] . '</p>';
			if ( $data['link_address'] != '' )
			{
				$button['link'] = $data['link_address'];
				$button['text'] = $data['link_label'];
				// include the button
				get_part('com_01.php', $button);
			}
		?>
	</div>
</section>
