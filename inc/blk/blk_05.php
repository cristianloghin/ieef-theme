<?php
	/* People Block */
?>

<section class="blk_05">
	<div class="container">
		<?php
			if ( $data['title'] != '' )
			{
				echo '<h2>' . $data['title'] . '</h2>';
			}

			$length = count( $data['list'] );

			//echo $length;

			foreach ( $data['list'] as $key => $person )
			{
				if ( $key % 2 == 0 )
				{
					echo '<div class="row">';
				}
				// include person module
				get_part('mod_07.php', $person);

				if ( $length % 2 != 0 && ( $key + 1 ) == $length )
				{
					echo '<span></span>';
				}

				if ( ( $key + 1 ) % 2 == 0 )
				{
					echo '</div>';
				}
			}
		?>
	</div>
</section>
