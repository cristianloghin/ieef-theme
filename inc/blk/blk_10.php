<?php
	/* Case Studies Block */
?>

<section class="blk_10">
	<div class="container">
		<?php
			$length = count( $data );

			//echo $length;

			foreach ( $data as $key => $case )
			{
				
				if ( $key % 3 == 0 )
				{
					echo '<div class="row">';
				}
	
				$content['picture'] = wp_get_attachment_url( get_post_thumbnail_id($case['content']->ID) );
				$content['title'] = $case['content']->post_title;
				$content['text'] = $case['content']->post_excerpt;
				
				if ( $case['link'] != '' )
				{
					$content['link'] = $case['link'];
					$content['label'] = $case['label'];
				}
				else
				{
					$content['link'] = '';
					$content['label'] = '';
				}
				// include case module
				get_part('mod_16.php', $content);

				if ( $length % 3 != 0 && ( $key + 1 ) == $length )
				{
					echo '<span></span>';
				}

				if ( ( $key + 1 ) % 3 == 0 )
				{
					echo '</div>';
				}
			}
		?>
	</div>
</section>
