<?php
	/* Decision Tree Block */
?>

<section class="blk_08">
	<div class="container">
		<?php
			if ( $data['title'] != '' )
			{
				echo '<h2>' . $data['title'] . '</h2>';
			}
			
			$total = count( $data['questions'] );

			foreach( $data['questions'] as $key => $value)
			{
				$module = array(
					'index' => $key + 1,
					'icon' => $value['question_icon']['url'],
					'text' => $value['question_text']
				);

				if ( $key == 0 )
				{
					$module['first'] = true;
				}
				
				if ( $key == ( $total - 1 ) )
				{
					$module['last'] = true;
				}
				// include decision tree module
				get_part('mod_12.php', $module);
			}
		?>
		<div class="message" id="answerYes">
			<div>
				<p class="intro"><?php echo $data['answer_yes']; ?></p>
				<?php
					$button['link'] = $data['yes_link'];
					$button['text'] = $data['yes_label'];
					// include blue button component
					get_part('com_02.php', $button);
				?>
			</div>
		</div>
		<div class="message" id="answerNo">
			<div>
				<p class="intro"><?php echo $data['answer_no']; ?></p>
				<?php
					$button['link'] = $data['no_link'];
					$button['text'] = $data['no_label'];
					// include blue button component
					get_part('com_01.php', $button);
				?>
			</div>
		</div>
	</div>
</section>
