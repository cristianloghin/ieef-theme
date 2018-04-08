<?php
	/* Footer Block */
?>

<footer class="blk_04">
	<div class="container">
		<div id="backTop">
			<span class="icon-up-big"><span>
		</div>
		<div id="footerLogo">
			<a href="<?php bloginfo('url'); ?>">
				<span></span>
			</a>
		</div>
		<?php
			// include main menu module
			get_part('mod_01.php', $data);
		?>
	</div>
	<div id="extraInformation">
		<div class="container">
			<div>
				<p class="small">
					<a href="/privacy-statement">Privacy Statement</a>
					<a href="#">Cookie Policy</a>
					<a href="#">Terms &amp; Conditions</a>
				</p>
			</div>
			<div>
				<p class="small">&copy; 2015 Ireland Energy Efficiency Fund</p>
			</div>
			<div>
				<p class="small">Website by: <a href="#">Source</a></p>
			</div>
		</div>
	</div>
</footer>
