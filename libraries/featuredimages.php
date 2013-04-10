<?php
	// This theme uses post thumbnails / featured images
	add_theme_support( 'post-thumbnails', array( 'post', 'portfolio' ) ); // Add it for posts
	
	/*
	*	JUST A NOTE ON THE FUNCTIONS BELOW
	*	The last parameter, true/false defines whether the image will hard crop (exact size forced, set to true)
	*	or whether it will just match on the longest dimension, keeping the aspect ratio (set to false)
	*
	*	IF YOU UPDATE THE SIZES OR THE LAST PARAMATER BELOW YOU MUST RE-GENERATE THE THUMBNAILS
	*	(Google: WordPress Plugin Regenerate Thumbnails)
	*/
	
	set_post_thumbnail_size( 300, 200, true ); // Default Thumbnail ( post-thumbnail )

	add_image_size( 'slideshow', 950, 400, false);

	add_image_size( 'small', 200, 145, true);

	add_image_size( 'exlarge', 670, 375, false);
	
?>