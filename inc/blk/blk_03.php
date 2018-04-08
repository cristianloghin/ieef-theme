<?php
	/* Homepage Info Blocks */
?>

<section class="blk_03">
	<!-- Blocks Container-->
	<div class="container">
		<div>
			<?php

				foreach ($data as $block)
				{
					$content['image'] = $block['home_block_image']['url'];
					$content['title'] = $block['home_block_title'];

					$content['link'] = $block['home_block_link'];
					$content['link_text'] = $block['home_block_link_text'];
					$content['text'] = $block['home_block_text'];

					// include the block module
					get_part('mod_04.php', $content);
				}
			?>
		</div>
	</div>
	<!-- #Blocks Container-->
</section>
