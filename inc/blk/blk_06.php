<?php
	/* Text Block */
?>

<section class="blk_06">
	<div class="container">
		<?php
			if ( $data['title'] != '' )
			{
				echo '<h2>' . $data['title'] . '</h2>';
			}
			foreach ( $data['list'] as $block )
			{
				// include text area module
				get_part('mod_10.php', $block);
			}
		?>
	</div>
</section>
