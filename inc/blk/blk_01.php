<?php
	/* Page Header Block */
?>
<header class="blk_01">
	<!-- Logo and Menu -->
	<div id="logoMenu">
		<div class="container">
			<!-- Logo -->
			<div id="headerLogo">
				<a href="<?php bloginfo('url'); ?>"><span></span></a>
			</div>
			<!--#Logo -->
			<!-- Open Menu Button -->
			<div id="menuOpen">
				<span class="icon-menu-1"></span>
			</div>
			<!-- #Open Menu Button -->
			<!-- Main Menu -->
			<?php    
				// Include main menu module
				get_part( 'mod_01.php', $data);
			?>
			<!-- #Main Menu -->
		</div>
	</div>
	<!-- #Logo and Menu -->
	<!-- Title Area -->
	<div id="titleArea">
		<!-- Content Area -->
		<div class="container">
			<?php if ( isset( $data['title'] ) && !$data['is_case'] ) : ?>
				<h1><?php echo $data['title']; ?></h1>
			<?php
				// cases menu
				if ( count($data['cases']) != 0 )
				{
					get_part('mod_14.php', $data['cases']);
				}
			?>
			<?php endif; ?>
			<?php
				if ( isset( $data['intro_txt'] ) )
				{
					// Include page intro module
					get_part( 'mod_02.php', $data );
				}
			?>
		</div>
		<!-- #Content Area -->
		<!-- Background -->
		<div id="headerBackground">
			<?php
				// homepage carousel
				if ( isset( $data['header_images'] ) )
				{
					echo '<div id="imageBanner"><span></span><div>';
					$length = count( $data['header_images'] );
					foreach ( $data['header_images'] as $key => $image )
					{
						$url = $image['image']['url'];
						$zindex = $length - $key;
						echo '<span id="imgBn-' . $key . '" style="background-image:url(' . $url . '); z-index:' . $zindex . ';"></span>';
					}
					echo '</div></div>';
				}
				// case study picture
				if ( isset($data['header_image']) )
				{
					echo '<div id="caseBanner"><span></span><span style="background-image:url(' . $data['header_image']['url'] . ')"></span></div>';
				}

			?>
			<div class="gradient"><span><span></span></span></div>
		</div>
		<!-- #Background -->
	</div>
	<!-- #Title Area -->
<?php
	
?>
</header>