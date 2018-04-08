<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ieef
 */

?>

	</div><!-- #Content Wrapper -->

	<?php
		$data['main_menu'] = get_main_menu();
		// include footer block
		get_part('blk_04.php', $data);
	?>
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
