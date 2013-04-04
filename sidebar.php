<!-- Source: sidebar.php -->
<?php

	// Main sidebar, excluding the home page
	if ( ! is_front_page() && ! is_404() ) {
		if ( is_active_sidebar( 'column-two-all' ) ) {
			dynamic_sidebar( 'column-two-all' );
		} 
	}
	
	// Page set under Settings > Reading > Front Page
	if ( is_front_page() ) {
		if ( is_active_sidebar( 'column-two-home' ) ) {
			dynamic_sidebar( 'column-two-home' );
		}
	}
	
	// Page set under Settings > Reading > Posts Page
	if ( is_home() ) {
		if ( is_active_sidebar( 'column-two-blog' ) ) {
			dynamic_sidebar( 'column-two-blog' );
		}
	}
	
	// A Single post page
	if ( is_single() ) {		
		if ( is_active_sidebar( 'column-two-single-post' ) ) {
			dynamic_sidebar( 'column-two-single-post' );
		}	
	}
	
	
	// A Single Page
	// When any of the following return true: is_page()
	if ( is_page() && ! is_front_page() ) {
		if ( is_active_sidebar( 'column-two-page' ) ) {
			dynamic_sidebar( 'column-two-page' );
		} 
	}


	// Any Archive Page 
	// When any type of Archive page is being displayed. Category, Tag, Author and Date based pages are all types of Archives. 
	if ( is_archive() ) {
		if ( is_active_sidebar( 'column-two-archive' ) ) {
			dynamic_sidebar( 'column-two-archive' );
		} 
	}
	
	
	// A 404 Not Found Page 
	// When a page displays after an "HTTP 404: Not Found" error occurs. 
	if ( is_404() ) {
		if ( is_active_sidebar( 'column-two-404' ) ) {
			dynamic_sidebar( 'column-two-404' );
		} 
	}
	
	// Display when user is logged in
	if ( is_user_logged_in() ) {
		if ( is_active_sidebar( 'column-two-logged-in' ) ) {
			dynamic_sidebar( 'column-two-logged-in' );
		}
	}
	
	
?>