<?php
	/* Case Study Module */
	if ( $data['label'] != '' )
	{
		$class = ' details';
	}
?>
<div class="mod_16<?php echo $class; ?>">
	<?php
		$photo = $data['picture'];
		$title = $data['title'];
		$text = $data['text'];
	?>
	<div>
		<div class="photo">
			<span style="background-image:url('<?php echo $photo; ?>')"></span>
		</div>
		<div class="content">
			<div class="text">
				<h2><?php echo $title; ?></h2>
				<p><?php echo $text; ?></p>
			</div>
			<?php
				if ( $data['label'] != '' ) : ?>
					<div class="links">
						<?php
							$button['link'] = $data['link'];
							$button['text'] = $data['label'];
							// include a button
							get_part('com_01.php', $button);
						?>
					</div>
			<?php
				endif; ?>
		</div>
	</div>
</div>