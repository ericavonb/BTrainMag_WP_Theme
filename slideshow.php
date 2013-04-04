<!-- Source: slideshow.php -->

<?php    
	// Main slideshow, excluding the home page
	if ( ! is_front_page() && ! is_404() ) {
	  echo '<!-- no slideshow -->';
	}
	
	// Page set under Settings > Reading > Front Page
	elseif ( is_front_page() ) {
  		get_template_part( 'dynamic-slideshow'); 
	}
	
	// Page set under Settings > Reading > Posts Page
	elseif ( is_home() ) {
  		get_template_part( 'dynamic-slideshow'); 
	}
	// A Single post page
	if ( is_single() ) {
	  echo '<!-- no slideshow -->';
	}
	
	
	// A Single Page
	// When any of the following return true: is_page()
	if ( is_page() && ! is_front_page() ) {
	  echo '<!-- no slideshow -->';
	}


	// Any Archive Page 
	// When any type of Archive page is being displayed. Category, Tag, Author and Date based pages are all types of Archives. 
	if ( is_archive() ) { 
	  echo '<!-- no slideshow -->';
	}
	
	
	// A 404 Not Found Page 
	// When a page displays after an "HTTP 404: Not Found" error occurs. 
	if ( is_404() ) {
	  echo '<!-- no slideshow -->';
	}
	
	// Display when user is logged in
	if ( is_user_logged_in() ) {
	  echo '<!-- no slideshow -->';
	}
	
	
?>