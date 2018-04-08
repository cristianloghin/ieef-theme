<?php
	/* People Block */
?>
<div class="mod_07">
	<?php
		$photo = $data['people_block_list_photo']['url'];
		$name = $data['people_block_list_name'];
		$position = $data['people_block_list_position'];
		$bio = $data['people_block_list_bio'];
		$email = $data['people_block_list_email'];
		$phone = $data['people_block_list_phone'];
	?>
	<div class="<?php get_people_class( $data ); ?>">
	<?php
		//show_var($data);
		if ( $photo != '' ) : ?>
			<div class="photo">
				<span style="background-image:url('<?php echo $photo; ?>')"></span>
			</div>
	<?php
		endif; ?>
		<div class="text">
			<h3><?php echo $name; ?></h3>
			<p class="position"><?php echo $position; ?></p>
			<p><?php echo $bio; ?></p>
		</div>
	<?php
		if( $email != '' ) : ?>
			<div class="contact">
				<div class="email">
					<span>Email:</span>
					<a href="mailto:<?php echo $email; ?>">
						<span class="icon-mail"></span>
						<span><?php echo $email; ?></span>
					</a>
				</div>
				<div class="phone">
					<span>Phone:</span>
					<a href="tel:+3530<?php echo $phone; ?>">
						<span class="icon-phone"></span>
						<span>+353 (0) <?php echo $phone; ?></span>
					</a>
				</div>
			</div>
	<?php
		endif; ?>
	</div>
</div>