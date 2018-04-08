<?php
/*
 	Template Name: Contact Page
 */
?>
<?php get_header(); ?>
<section>
	<div class="container">
		<div>
			<h2>Contact Information</h2>
			<div class="map">
				<?php
					$map = get_field('contact_map');
					echo do_shortcode( $map );
				?>
			</div>
			<?php
				if ( have_rows('contact_info') )
				{
					while ( have_rows('contact_info') )
					{
						the_row();
						switch ( get_row_layout() )
						{
							case 'contact_address' :
								if ( get_sub_field('company_name') !== null )
								{
									echo '<h3>'. get_sub_field('company_name') .'</h3>';
								}
								echo '<p>' . get_sub_field('address_block') . '</p>';
								break;
							case 'email_address' :
								echo '<div class="email"><span>Email: </span>';
								echo '<a href="mailto:' . get_sub_field('address') . '">';
								echo '<span class="icon-mail"></span><span>' . get_sub_field('address') . '</span></a></div>';
								break;
							case 'phone_number' :
								echo '<div class="phone"><span>Phone: </span>';
								echo '<a href="tel:+3530' . get_sub_field('number') . '">';
								echo '<span class="icon-phone"></span><span>+353 (0) ' . get_sub_field('number') . '</span></a></div>';
								break;
						}
					}
				}
			?>
		</div>
		<div>
			<h2>Contact Form</h2>
			<?php
				$form = get_field( 'contact_form' );
				echo do_shortcode( $form );
			?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
<script>
	var $input = $( '#fileUp' );
	var $label = $input.parent().parent().find( 'label' );
	var labelVal = $label.html();

	$input.on( 'change', function(e)
	{
		console.log($input);

		fileName = e.target.value.split( '\\' ).pop();

		if( fileName )
			$label.html( fileName );
		else
			$label.html( labelVal );
	});
	
</script>