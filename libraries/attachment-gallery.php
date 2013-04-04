<?php

	
	// Gallery Function (list, gallery, slider, etc...)
	function btm_attachment_gallery( $options ) {
		
		global $post, $wp_query;
		$output = "";
		
		$original_wp_query = $wp_query;
		$wp_query = null;
		
		// Default options, overridden by extract() below if set
		$source = 'attachment';
		$display = 'list';
		$media_size = 'grid_8';
		$slide_effect = '';
		$slide_delay = '';
		$slide_speed = '';
		$slide_nav = '';
		$slide_nav_nextprev = '';
		
		// Extract options from array to variables
		extract( $options );

		$args = array(
			'post_parent' => $post->ID, 
			'post_type' => $source,
			'post_mime_type' => 'image',
			'post_status' => 'inherit',
			'order' => 'ASC',
			'orderby' => 'menu_order',
			'posts_per_page' => -1
		);
		
		// Run the new query
		$wp_query = new WP_Query( $args );
		
		// Slider wrap
		if( $display == 'slider' ) { $output .= "<div class='slides_container'>"; }
		$slide_counter = 0;
		
		$output .= "<ul class='stripped thumbnail-list clearfix'>";	
		

		if ( have_posts() ) {
			while ( have_posts() ) {			
				the_post();
				
				if ( $slide_counter > 0 && $display == 'slider' ) { $output .= "<li class='hidden'>"; }else{ $output .= "<li>"; }
				
					$output .= "<div class='content'>";
						if ( $source == 'attachment' ) {
							$post_thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
							$output .= "<div class='post-thumbnail'><a href='" . $post_thumbnail_src[0] . "'>";
								$output .= wp_get_attachment_link($post->ID, $media_size, false, false);
							$output .= "</a></div>";
						}
						if ( $source == 'slider' || $source == 'post' || $source == 'portfolio' ) {
							$output .= btm_get_featured_image( $media_size, '' );
						}
					$output .= "</div><!--//content-->";
					
					// Caption for List/Grid
					if ( $display != 'slider' ) {
						// Image Attachment Caption
						$attachment_img_title = $post->post_excerpt;
						$attachment_img_description = $post->post_content;
						if ( $attachment_img_title || $attachment_img_description ) {
							$output .= "<div class='caption'>";
								if ( $attachment_img_title ) { $output .= "<h3>" . apply_filters('the_title', $attachment_img_title ) . '</h3>'; }
								if ( $attachment_img_description ) { $output .= "<p>" . apply_filters('the_title', $attachment_img_description ) . '</p>'; }
							$output .= "</div><!--//caption-->";
						} // enf if has excerpt/content
					} // end if slider
					
				$output .= "</li>";				
				$slide_counter++;
				
			} // end while
			
			$output .= "</ul>";
			
			
			// Slider wrap end
			if( $display == 'slider' ) { 			
				$output .= "</div><!--//slides_container-->"; 				
				$output .= "<script type='text/javascript'> /* <![CDATA[ */ jQuery(function($){ ";
					$output .= "$('.slides_container').slides({";		
						$output .= "container: 'thumbnail-list', ";
						$output .= "effect: 'fade', ";
						$output .= "preload: true, ";
						$output .= "paginationClass: 'slides_pagination', ";
						$output .= "generatePagination: true, ";
						$output .= "generateNextPrev: true, ";						
						$output .= "autoHeight: true";						
					$output .= "});";
				$output .= "}); </script><!--//end slides js-->";				
			} // end if slider

		}else{		
			$output = "<!-- no posts/attachments found -->";		
		} // end post if
		
		// restore query
		$wp_query = $original_wp_query;
		
		return $output;		
	}


?>