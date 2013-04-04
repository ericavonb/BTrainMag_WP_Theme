<?php 
	
	// Skills archive page
	
	get_header(); 
	
	// Grab custom settings
	global $btm_theme_options;	
	$portfolio_archive_layout = btm_get_option( get_option_tree('portfolio_archive_layout', $btm_theme_options, false, false ), '', false ); 
	$portfolio_archive_posts_per_page = btm_get_option( get_option_tree('portfolio_archive_posts_per_page', $btm_theme_options, false, false ), '', false ); 
?>
	<div class="grid_12" id="primary">
		
		<?php 
			// Get term details for display above the archive loop if needed
			$current_term = get_term_by( 'slug', get_query_var( 'skills' ), get_query_var( 'taxonomy' ) ); 
		?>
        
        <h2><?php echo $current_term->name; ?></h2>
        <?php
        	if( $current_term->description ) {
        		echo '<p>' . $current_term->description . '</p>';
        	}
        ?>
        
        <?php        
			// Portfolio settings, passed into the loop-portfolio.php file
			
			$portfolio_options = array(
				'portfolio_layout' => $portfolio_archive_layout,
				'posts_per_page' => $portfolio_archive_posts_per_page
			);
			
			// Load the specific portfolio loop
			get_template_part( 'loop', 'portfolio' ); 			
        ?>
    
    </div><!--//grid_X-->
	
<?php get_footer(); ?>