<?php
	/* Process Block */
?>

<section class="blk_07">
	<div class="container">
		<?php
			if ( $data['title'] != '' )
			{
				echo '<h2>' . $data['title'] . '</h2>';
			}

			$total = count( $data['steps'] );

			foreach( $data['steps'] as $key => $step)
			{
				$module = array(
					'index' => $key + 1,
					'icon' => $step['step_icon']['url'],
					'name' => $step['step_name'],
					'description' => $step['step_description']
				);

				if ( $key == ( $total - 1 ) )
				{
					$module['last'] = true;
				}
				
				if ( $key == 0 )
				{
					$module['first'] = true;
				}

				// include process module
				get_part('mod_11.php', $module);
			}
		?>
	</div>
</section>
