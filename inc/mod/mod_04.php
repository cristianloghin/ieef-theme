<?php
	/* Homepage Block Module */
?>
<div class="mod_04">
	<div>
		<div class="image">
			<span style="background-image: url('<?php echo $data['image']; ?>')"></span>
		</div>
		<div class="text">
			<h2><?php echo $data['title']; ?></h2>
			<p><?php echo $data['text']; ?></p>
			<?php
				$button['link'] = $data['link'];
				$button['text'] = $data['link_text'];
				// include the button
				get_part('com_01.php', $button);
			?>
		</div>
	</div>
</div>