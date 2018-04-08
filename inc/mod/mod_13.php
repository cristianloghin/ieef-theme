<?php
	/* List Module */
?>

<section class="mod_13">
	<div class="container">
		<div>
			<div>
				<?php
					if ( $data['title'] != '' )
					{
						echo '<h2>' . $data['title'] . '</h2>';
					}
					if ( $data['text'] != '' )
					{
						echo '<p class="leading">' . $data['text'] . '</p>';
					}				
				?>
				<div>
				<?php
					$image = $data['image']['url'];
					$height = $data['image']['height'];
					$width = $data['image']['width'];
					$padding = $height * 100 / $width;
					?>
					<div style="background-image:url(<?php echo $image; ?>); padding-top: <?php echo $padding; ?>%"></div>
					<span></span>
					<span></span>
				</div>
			</div>
		</div>
	</div>
</section>
