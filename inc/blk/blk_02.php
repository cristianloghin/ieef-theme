<?php
	/* Homepage News Block */
?>

<section class="blk_02">
	<div class="container">
		<div>
			<h2>Latest News</h2>
			<a href="/news">
				<span>show all</span>
			</a>
		</div>
		<?php
			while ( $data->have_posts() )
			{
				
				$data->the_post();
				
				$article['small'] = get_the_date();
				$article['title'] = get_the_title();
				$article['excerpt'] = get_field('news_excerpt');
				$article['link'] = get_permalink();

				// include homepage news module
				get_part('mod_03.php', $article);
			}
		?>
	</div>
</section>
