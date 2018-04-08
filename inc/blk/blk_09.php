<?php
	/* News Article Block */
?>

<article class="blk_09">
	<div class="container">
		<div>
			<div>
				<div class="date">
					<p class="small"><?php echo $data['date']; ?></p>
				</div>
				<div class="content">
					<?php echo $data['content']; ?>
				</div>
			</div>
		</div>
		<div>
		<?php
			$button['link'] = '/news';
			$button['text'] = 'back to news';
			// include back button
			get_part('com_03.php', $button);
		?> 
		</div>
	</div>
</section>
