<?php
/*
 	Template Name: Applications Page
 */
?>
<?php get_header(); ?>
<section>
	<div class="container">
		<div>
		<?php
			if ( have_posts() )
			{
				while ( have_posts() )
				{
					the_post();
					echo '<div class="text">';
					the_field('applications_intro');
					echo '</div>';
					echo '<div>';
					echo '<div class="download">';
					// the form download
					echo '<a href="' . get_field( 'applications_file' ) . '"><span class="icon-download"></span><span>Download the Questionnaire</span></a>';
					echo '</div>';
					echo '<div class="text">';
					the_field('applications_q_content');
					echo '</div></div>';
				}
			}
		?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
