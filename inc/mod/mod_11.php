<?php
	/* Process Module */
?>
<?php
	$class =( $data['first'] ) ? 'mod_11 first' : 'mod_11' ;
	?>
<div class="<?php echo $class; ?>" id="pMod-<?php echo $data['index']; ?>">
	<div>
	<?php
		//show_var($data);
		?>
		<div class="icon">
			<div>
				<span style="background-image: url('<?php echo $data['icon']; ?>')"></span>
			</div>
		</div>
		<div class="text">
			<h3><?php echo $data['index'] . '. ' . $data['name']; ?></h3>
			<ul>
		<?php
			foreach ($data['description'] as $value) : ?>
				<li><p><?php echo $value['description_entry']; ?></p></li>
		<?php
			endforeach; ?>
			</ul>
		</div>
		<div class="action_button">
		<?php $class = ( $data['last'] ) ? 'icon-check' : 'icon-angle-down';	?>
			<span class="<?php echo $class; ?>" data-index="<?php echo $data['index']; ?>"></span>
		</div>
	</div>
</div>