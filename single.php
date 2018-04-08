<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ieef
 */

get_header(); ?>
<article>
	<div class="container">
	<?php
		if ( have_posts() ) { 
			while( have_posts() ) {
				the_post();
				the_content();			
			}
		}
	?>
	</div>
</article>
<?php get_footer(); ?>
