<?php
	/* Main Menu Module */
?>
<div class="mod_01">
	<div>	
		<div>
			<h2>Menu</h2>
			<div id="menuClose">
				<span class="icon-cancel-1"></span>
			</div>
		</div>
		<ul>
			<?php foreach($data['main_menu'] as $item) : ?>
				<li <?php get_main_menu_class($item['name']); ?>><a href="<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<span></span>
</div>