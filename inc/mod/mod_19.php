<section class="mod_19">
	<div class="container">
		<div>
			<div class="gallery">
			<?php
				foreach ( $data['images'] as $image ) : ?>
					<div class="image">
						<span style="background-image:url(<?php echo $image['image']['url']; ?>)"></span>
					</div>
			<?php
				endforeach; ?>
			</div>
		</div>
	</div>
</section>
