<?php
	/* News and Case Studies Location Menu Module */
?>

<div class="mod_14">
	<div class="container">
		<div>
			<div>
			<?php
				foreach ($data as $value) : ?>
					<a href="/<?php echo $value['link']; ?>" <?php if($value['active']) { echo 'class="active"'; } ?>>
						<?php echo $value['name'] ?>
					</a>
			<?php		
				endforeach; ?>
			</div>
		</div>
	</div>
</div>
