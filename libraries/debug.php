<?php
	//	Library: Debug
	//	Contains: Tools to help debug the theme or plugins


	// Log in as admin user, visit your site and go to: 
	// www.yoursite.com/?btm_debug=1 
	function btm_debug_options() {
		global $btm_theme_options;
		if( ! empty($_GET["btm_debug"] ) && current_user_can('update_core') ) {
			if( $_GET["btm_debug"] == 1 ) {
				echo "<pre style='background:#fff;color:#000;'>";
				print_r($btm_theme_options);
				echo "</pre>";
			}
		}
	}
	add_action('wp_head','btm_debug_options');
	
	
	// Output formatted array
	function print_r_pre($array) {
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}
	
	
?>