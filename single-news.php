<?php
/*
 	Single Post Template: News Article
 	Description: Hello
 */

get_header(); ?>
<?php
	if ( have_posts() ) { 
		while( have_posts() ) {
			the_post();
			$article['date'] = get_the_date();
			$content = apply_filters( 'the_content', get_the_content() );
			$content = str_replace( ']]>', ']]&gt;', $content );
			$article['content'] = $content;

			/*
			$news_location = get_the_terms($post->ID, 'newslocation');
			if ( $news_location != '' )
			{
				$article['link'] = '/news/' . $news_location[0]->slug;
			}
			else if ( $case_location != '' )
			{
				$article['link'] = '/case-studies/' . $case_location[0]->slug;
			}

			*/
			// include news article block;
			get_part('blk_09.php', $article);			
		}
	}
?>
<?php get_footer(); ?>
