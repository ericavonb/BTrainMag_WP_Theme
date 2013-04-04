<?php
/**
* Template Name: Portfolio Grid
*/
get_header(); ?>
	<div class="grid_12">
        <?php 
			
			// Get standard page information			
			get_template_part( 'loop', 'page' );			
			
			// Portfolio settings, passed into the loop-portfolio.php file			
			$portfolio_options = array();
			$portfolio_options['portfolio_layout'] = '4-columns';
			$portfolio_options['posts_per_page'] = '';
			$portfolio_options['skills'] = '';
			
			// Override default
			$portfolio_layout_custom = get_post_meta( $post->ID, 'portfolio_layout', true );
			if ( $portfolio_layout_custom  ) {
				$portfolio_options['portfolio_layout'] = $portfolio_layout_custom;
			}

			// Override default			
			$posts_per_page_custom = get_post_meta( $post->ID, 'portfolio_posts_per_page', true );
			if ( $posts_per_page_custom  ) {
				$portfolio_options['posts_per_page'] = $posts_per_page_custom;
			}

			// Override default			
			$skills_custom = get_post_meta( $post->ID, 'portfolio_skills', true );
			if ( $skills_custom  ) {
				$portfolio_options['skills'] = $skills_custom;
			}
			
			// Load the specific portfolio loop
			get_template_part( 'loop', 'portfolio' ); 
			
		?>
	</div><!--//grid_12-->
<?php get_footer(); ?>