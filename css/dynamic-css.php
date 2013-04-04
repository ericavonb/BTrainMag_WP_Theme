<?php 
	
	// This file includes inline styles/css based on theme settings
	
	$dynamic_css_output = "";
	
	$css_theme = btm_get_option( get_option_tree('css_theme', $btm_theme_options, false, false ), '', 'css_theme' );
	$color_link_primary = btm_get_option( get_option_tree('color_link_primary', $btm_theme_options, false, false ), '', false );
	$color_link_primary_hover = btm_get_option( get_option_tree('color_link_primary_hover', $btm_theme_options, false, false ), '', false );
	
	if (
		$css_theme || 
		$color_link_primary ||
		$color_link_primary_hover
	){
		
		ob_start();
	
		if ( $css_theme ) { ?> 
		/* Skin add-on from theme options */
			@import url(<?php echo get_template_directory_uri() . '/css/themes/' . $css_theme . '.css'; ?>) screen;
		/* End skin */
		<?php } ?>
	
		<?php $buffer = ob_get_contents();
		ob_end_clean(); ?>
		
		<!-- dynamic-css from theme settings override -->
		<style type='text/css'><?php echo $buffer; ?></style>
		<!-- // end dynamic-css from theme settings override -->
		
<?php } // end if css override	?>