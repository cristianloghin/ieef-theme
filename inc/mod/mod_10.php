<?php
	/* Text Block Module */
?>
<div class="mod_10">
	<div>
	<?php
		//show_var($data);
		$subtitle = $data['text_block_list_subtitle'];
		$content = $data['text_block_list_content'];
		if ( $data['text_block_list_link_page'] != '' )
		{
			$link = $data['text_block_list_link_page'];
		}
		else if ( $data['text_block_list_link_url'] != '' )
		{
			$link = $data['text_block_list_link_url'];
		}
		else
		{
			$link = '';
		}
		
		$label = $data['text_block_list_link_label'];
		?>
		<h3><?php echo $subtitle; ?></h3>
		<p><?php echo $content; ?></p>
	<?php
		if ( $link != '' )
		{
			$button['link'] = $link;
			$button['text'] = $label;
			// include the button
			get_part('com_01.php', $button);
		}
		?>
	</div>
</div>