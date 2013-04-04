<?php
	//	Library: Theme Options
	//	Contains: OptionTree plugin wrapper functions but not the actual plugin
	

	// Remind users to install the plugin, displays on admin pages for admin users
	if( is_admin() ) {		
		function btm_install_optiontree_nag() {
			if ( current_user_can('update_core') ) {
			  
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
				if ( ! is_plugin_active( 'option-tree/index.php' ) ) {
					echo "<div class='update-nag'>" . __( 'Wait! You need to install and activate the OptionTree plugin! (See Help Files)', 'btm' ) . "</div>";
				}
			}
		}
		add_action( 'admin_notices', 'btm_install_optiontree_nag', 3 );
	}
		
		
	// If get_option_tree function does not exist (plugin not installed)
	// Return false to suppress errors in the theme where the function is used
	if ( ! function_exists( 'get_option_tree') && ! is_admin() ) {
		function get_option_tree() {
			return false;
		}
	}
	
	
	// Global theme options array, fed into the get_option_tree to save DB trips
	global $btm_theme_options;
	
	
	// Save all settings to an array to avoid having to hit the DB every single time
	if ( function_exists( 'get_option_tree') ) {
		$btm_theme_options = get_option('option_tree');
	}
	
	
	// Custom wrapper for the settings function
	// If no input is found (like when the plugin is disabled or not in use) it will return the optional fallback value
	function btm_get_option( 
		$input = '', 							// Feed in the get_option_tree function or custom settings function
		$fallback_value = '',		 			// Optional: Value to use if no value is returned in the first parameter
		$custom_field_override_key = ''			// Optional: Give key to use to override all values
		)
	{
		// Access the global post variable
		global $post;
		$corrected_post_id = btm_corrected_post_id();
		
		// Get custom field value by key if set in case you want to override it
		if( $custom_field_override_key && $corrected_post_id != null ) {
			$custom_field_override_value = get_post_meta($corrected_post_id, $custom_field_override_key, true);
		}
		
		// If custom field key is set and it returns a value, use it first
		if( $custom_field_override_key && $custom_field_override_value ) {
			return $custom_field_override_value;
			
		// If custom field key is set and value is set to 0, make it override and returning a blank.
		// Why? Because you can't save false or blank custom field values. 
		// This is if you want to override the $input and $fallback_value with false.
		} else if( $custom_field_override_key && $custom_field_override_value == '0' ) {
			return false;
			
		} else {
			if( $input || is_numeric( $input ) ) {
				return $input; // return the input value
			} else {
				return $fallback_value; // input was empty, return a fallback value if set
			}
		}
	}
?>