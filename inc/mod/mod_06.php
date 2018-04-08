<?php
	/* Mobile Sub-Menu Module */
?>
<div class="mod_06">
	<div class="container">
		<ul>
			<?php
				foreach($data as $item) : ?>
					<li>
						<a href="<?php echo get_permalink($item->ID); ?>">
							<span><?php the_field('submenu_page_name', $item->ID); ?></span>
							<span>
								<span class="icon-right-open"></span>
							</span>
						</a>
					</li>
			<?php
				endforeach;
			?>
		</ul>
	</div>
</div>