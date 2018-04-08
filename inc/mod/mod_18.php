<section class="mod_18">
	<div class="container">
		<div>
			<div>
				<div class="slider" id="slider-<?php echo $data['id']; ?>">
				<?php
					foreach ( $data['images'] as $image ) : ?>
						<div class="slide">
							<img src="<?php echo $image['image']['url']; ?>" />
						</div>
				<?php
					endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	$('#slider-<?php echo $data['id']; ?>').newSlider({});
</script>
