<?php
	/* List Module */
?>

<section class="mod_08">
	<div class="container">
		<?php
			if ( $data['title'] != '' )
			{
				echo '<h2>' . $data['title'] . '</h2>';
			}
			
			switch ( $data['style'] )
			{
				case 'Text Only' :
					echo '<ul class="simple_list">';

					$length = count( $data['list'] );
					
					foreach ( $data['list'] as $key => $item )
					{
						if ( $key % 2 == 0 )
						{
							echo '<div class="row">';
						}
						echo '<li><div><span class="icon-right-dir"></span><p>' . $item['list_block_item_entry'] . '</p></div></li>';
						
						if ( $length % 2 != 0 && ( $key + 1 ) == $length )
						{
							echo '<span></span>';
						}

						if ( ( $key + 1 ) % 2 == 0 )
						{
							echo '</div>';
						}
					}
					echo '</ul>';
					break;
				case 'Numbered with Title' :
					echo '<ul class="numbered_list">';

					$length = count( $data['list'] );

					foreach ( $data['list'] as $key => $item )
					{
						if ( $key % 2 == 0 )
						{
							echo '<div class="row">';
						}
						echo '<li><div><span>' . ( $key + 1 ) . '</span><h3>' . $item['list_block_item_title'] . '</h3><p>' . $item['list_block_item_entry'] . '</p></div></li>';
						
						if ( $length % 2 != 0 && ( $key + 1 ) == $length )
						{
							echo '<span></span>';
						}

						if ( ( $key + 1 ) % 2 == 0 )
						{
							echo '</div>';
						}
					}
					echo '</ul>';
					break;
				case 'Big Blocks' :
					echo '<ul class="big_blocks">';
					
					$length = count( $data['list'] );

					foreach ( $data['list'] as $key => $item )
					{
						if ( $key % 4 == 0 )
						{
							echo '<div class="row">';
						}
						echo '<li><div><span class="icon-right-dir"></span><p>' . $item['list_block_item_entry'] . '</p></div></li>';
						
						

						if ( ( $key + 1 ) % 4 == 0 )
						{
							echo '</div>';
						}
					}

					echo '</ul>';
					break;
			}
		?>
	</div>
</section>
