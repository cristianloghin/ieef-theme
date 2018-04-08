<?php
	/* Decision Tree Module */
?>
<?php
	$class = ( $data['first'] ) ? 'mod_12 first' : 'mod_12' ;
	?>
<div class="<?php echo $class; ?>" id="dtMod-<?php echo $data['index']; ?>">
	<div>
		<div class="icon">
			<div>
				<span style="background-image: url('<?php echo $data['icon']; ?>')"></span>
			</div>
		</div>
		<div class="text">
			<p class="leading"><?php echo $data['text']; ?></p>
		</div>
		<?php $class = ( $data['last'] ) ? 'last' : 'next';	?>
		<div class="action_button <?php echo $class; ?>">
			<div class="yes">
				<span class="icon-check" data-index="<?php echo $data['index']; ?>"></span>
			</div>
			<div class="no">
				<span class="icon-cancel" data-index="<?php echo $data['index']; ?>"></span>
			</div>
		</div>
	</div>
</div>