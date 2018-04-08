<?php
	/* Sub-menu Module */
?>
<div class="mod_05">
	<div class="container">
		<ul>
			<?php
				foreach($data as $item) : ?>
					<li <?php get_sub_menu_class($item->ID); ?>><a href="<?php echo get_permalink($item->ID); ?>"><?php the_field('submenu_page_name', $item->ID); ?></a><span></span></li>
			<?php
				endforeach;
			?>
		</ul>
	</div>
</div>