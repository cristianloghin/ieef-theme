<?php
	/* Intro Text Module */
?>
<div class="mod_02">
	<div>
	<?php
		if( !$data['is_case'] ) : ?>
			<p class="intro">
				<?php echo $data['intro_txt']; ?>
			</p>
	<?php
		else : ?>
			<?php
				if( $data['intro_title'] != '' )
				{
					echo '<h3>' . $data['title'] . '</h3>';
					echo '<h1>' . $data['intro_title'] . '</h1>';
				}
				else
				{
					echo '<h1>' . $data['title'] . '</h1>';
				}
			?>
			<p class="leading">
				<?php echo $data['intro_txt']; ?>
			</p>
	<?php
		endif; ?>
		<?php
			if ( $data['intro_link']['slug'] != '' )
			{
				$button['link'] = $data['intro_link']['slug'];
				$button['text'] = $data['intro_link']['txt'];
				// include a button
				get_part('com_01.php', $button);
			}
		?>
	</div>
</div>