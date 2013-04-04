<?php	
	// Grab custom settings
	global $btm_theme_options;	
	$logo_upload = btm_get_option( get_option_tree('logo_upload', $btm_theme_options, false, false ), get_template_directory_uri() . '/images/logo.png', false ); 
	$logo_url = btm_get_option( get_option_tree('logo_url', $btm_theme_options, false, false ), '', false ); 
	$logo_text_based = btm_get_option( get_option_tree('logo_text_based', $btm_theme_options, false, false ), '', false );
	// $disable_header_search = btm_get_option( get_option_tree('disable_header_search', $btm_theme_options, false, false ), '', false );
?>
<!DOCTYPE html>

<!--[if lt IE 7 ]>	<html lang="en" class="ie6 ie">	<![endif]-->
<!--[if IE 7 ]>	<html lang="en" class="ie7 ie">	<![endif]-->
<!--[if IE 8 ]>	<html lang="en" class="ie8 ie">	<![endif]-->
<!--[if IE 9 ]>	<html lang="en" class="ie9 ie">	<![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>> <!--<![endif]-->

	<head>

  	<!-- General meta information -->
  	<title><?php wp_title( ' ', true, 'right' ); /* filtered in libraries/filers.php */ ?></title>
  	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  	<!-- // General meta information -->

  	<!-- Load stylesheets -->	
  	<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/screen.css" media="screen" />	
  	<?php /* Dynamic CSS from Theme Settings */ include_once(TEMPLATEPATH . "/css/dynamic-css.php"); ?>
  	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	
  	<?php if (is_front_page()) { $theme = 'slideshow.php';} else { $theme = 'standard.css';}; ?>
  	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/themes/<?php echo $theme; ?>" />
  	<?php /* Dynamic CSS from Theme Settings */ if (is_front_page()) { include_once(TEMPLATEPATH . "/css/themes/slideshow-css.php");}; ?>
	
  	<link href='http://fonts.googleapis.com/css?family=Anton|Oswald:400,300,700|Titillium+Web:400,700|Orbitron:400,700,900' rel='stylesheet' type='text/css'>
  		<!-- // Load stylesheets -->

  	<?php
  		// Load Javascript
  		if ( is_singular() && get_option( 'thread_comments' ) )	{ wp_enqueue_script( 'comment-reply' ); }
  		wp_enqueue_script("jquery");
  		wp_enqueue_script("slides", get_template_directory_uri() . "/js/libs/slides.min.jquery.js");
  		wp_enqueue_script("superfish", get_template_directory_uri() . "/js/libs/superfish-combined.js");
  		wp_enqueue_script("btm_general", get_template_directory_uri() . "/js/script.js");
  		wp_head(); // do not remove this
  	?>	
  	<!--[if lt IE 9]><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script><![endif]-->
	
  	<!-- site icons -->
  	<link type="text/css" rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.jpg" />
  	<link type="text/css" rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.jpg" />
  	<!-- // site icons -->
	
  </head>

			