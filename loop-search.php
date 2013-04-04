<!-- Source: loop-search.php -->
<?php // The loop that displays search results. ?>
<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>		
	<div class="grid_3 alpha"><?php get_search_form(); ?></div><div class="clear"></div>		
<?php else: ?>
	<ol class="search-results">
	<?php while ( have_posts() ) : the_post(); ?>
		<li>
			<p class="result-title"><a class="result-title" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'btm' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></p>
			<p class="result-excerpt"><?php echo get_the_excerpt(); ?></p>
		</li>
	<?php endwhile; // End the loop. ?>
	</ol>
	<?php get_template_part( 'nav', 'post-loop' ); ?>
<?php endif; ?>