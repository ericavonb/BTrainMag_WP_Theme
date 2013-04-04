<?php
	
	global $portfolio_options; // passed from page template
		
	// Extract the array of options from the parent page template
	extract($portfolio_options);

	// Define variables based on layout settings
	if ( ! $portfolio_layout || $portfolio_layout == '4-columns' ) {
		$columns = 4;
		$img_size = $grid = 'grid_3';
		if ( ! $posts_per_page ) { $posts_per_page = 12; }
	} else if ( $portfolio_layout == '3-columns' ) {
		$columns = 3;
		$img_size = $grid = 'grid_4';
		if ( ! $posts_per_page ) { $posts_per_page = 9; }
	} else if ( $portfolio_layout == '2-columns' ) {
		$columns = 2;
		$img_size = $grid = 'grid_6';
		if ( ! $posts_per_page ) { $posts_per_page = 6; }
	}
	
	// Get Loop Options
	$paged = btm_get_page_number(); 
	
	// If displaying a skills archive, override the setings above
	$skills_archive = (get_query_var('skills')) ? get_query_var('skills') : ''; 
	if ( $skills_archive ) {
		$skills = 'skills=' . $skills_archive;	
	}
	
	if ( $portfolio_options['skills'] ) {
		$skills = 'skills=' . $portfolio_options['skills'];
	}
	
	// Build Query
	query_posts( $skills . "&paged=" . $paged . "&post_type=portfolio&posts_per_page=" . $posts_per_page );
	
	// Force the "Read More" link if used.
	global $more; 
	$more = $count = 0;

	echo "<ul class='stripped clearfix thumbnail-list'>";
    	
    	while ( have_posts() ) : the_post();
    	
			$excerpt = get_the_excerpt(); 
			$the_title = the_title("<h3><a href='" . get_permalink() . "'>",'</a></h3>', false);
			$output = "";
			
			// Counter for alpha/omega column classes
			$count++; 
			if($columns == 1) {
				$alpha_omega = "alpha";
			}else{
				if($count % $columns == 1)
				{
					$alpha_omega = 'alpha';
				}else if($count % $columns == 0)
				{
					$alpha_omega =  'omega';
				}else{
					$alpha_omega = "";
				}
			}

			// List items
			$output = "<li class='" . $grid . ' ' . $alpha_omega . "'>";				
				$output .= "<div class='content'>";							
					$output .= btm_get_featured_image( $img_size, __('No featured image set for this portfolio item.','btm') );
				$output .= "</div><!--//content-->";					
				if ( $excerpt || $the_title ) {
					$output .= "<div class='caption'>";
						if ( $the_title ) { $output .= $the_title; }
						if ( $excerpt ) { $output .= "<p>" . $excerpt . '</p>'; }
					$output .= "</div><!--//caption-->";
				} // end if has excerpt/content					
			$output .= "</li>";
			
			echo $output;
	
    endwhile; // End the loop. ?>
    
</ul>
<?php 
	get_template_part( 'nav', 'post-loop' ); 

	// Get things back to normal
	wp_reset_query();
?>