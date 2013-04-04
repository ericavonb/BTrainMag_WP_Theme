<?php

/* ========================================================================= */
/*                                Meta-boxes                                 */
/* ========================================================================= */


/* ------------------------------------------------------------------------- */
/*                               Action hooks                                */
/* ------------------------------------------------------------------------- */

	// Add Meta Boxes on Admin Init

	add_action("admin_init", "btm_admin_init");
	
	function btm_admin_init(){
		add_meta_box("btm_post_settings-meta", __("Custom Post Settings","btm"), "btm_post_settings_box", "post", "side", "core");		
		
		add_meta_box("btm_thumb_linksto_meta", __("Featured Image Thumbnail Link","btm"), "btm_thumb_linksto", "post", "normal", "default");
		add_meta_box("btm_thumb_linksto_meta", __("Featured Image Thumbnail Link","btm"), "btm_thumb_linksto", "portfolio", "normal", "default");
	}
	
	
	//	Save
	
	add_action('save_post', 'btm_save_meta_box_content');
	
	function btm_save_meta_box_content(){		
		global $post;
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post->ID;
		} else {
			if ( $post->post_type == 'post' ) {
				update_post_meta($post->ID, "btm_post_settings", $_POST["btm_post_settings"]);
				update_post_meta($post->ID, "btm_post_hide_featured_single", $_POST["btm_post_hide_featured_single"]);
			}
			if ( $post->post_type == 'page' ) {
				update_post_meta($post->ID, "portfolio_layout", $_POST["portfolio_layout"]);
				update_post_meta($post->ID, "portfolio_posts_per_page", $_POST["portfolio_posts_per_page"]);
				update_post_meta($post->ID, "portfolio_skills", $_POST["portfolio_skills"]);
			} 
			if ( $post->post_type == 'post' || $post->post_type == 'portfolio') {
				update_post_meta($post->ID, "featured_image_link_to", $_POST["featured_image_link_to"]);
				update_post_meta($post->ID, "featured_image_link_to_url", $_POST["featured_image_link_to_url"]);
			}
		}	
	}
	
	
	/* ------------------------------------------------------------------------- */
  /*                             The Meta Boxes                                */
  /* ------------------------------------------------------------------------- */
  

	
	// Meta Box for Thumbnail
	
	function btm_thumb_linksto(){
	  global $post;
	  $custom = get_post_custom($post->ID);
	  $featured_image_link_to = $custom["featured_image_link_to"][0];
	  $featured_image_link_to_url = $custom["featured_image_link_to_url"][0];
	  ?>
	  <p><?php _e('Choose on a post by post basis where the featured image thumbnails to link to.','btm'); ?></p>
	  <p>
	  <select name="featured_image_link_to">
	  	<option value=''><?php _e('Default','btm'); ?></option>
	  	<?php
	  		$featured_image_link_to_options = array(
	  			'post' => __('Full Post','btm'),
	  			'image' => __('Image','btm')	  			
	  		);	
			foreach ( $featured_image_link_to_options as $k => $v ) {
				if ( $k == $featured_image_link_to ) { $sel = " selected='selected'"; }else{ $sel = ""; }
			  	echo "<option " . $sel . " value='". $k ."'>" . $v . "</option>"; 
			}
	  	?>
		</select>
		<em><?php _e('or','btm'); ?></em> <?php _e('Custom URL:','btm'); ?> <input type="text" style='width:300px; border-style:solid; border-width:1px;' name="featured_image_link_to_url" value="<?php echo $featured_image_link_to_url; ?>" /> <?php _e('(Full URL - Video, External Page, etc...)','btm'); ?></p>		
	  <?php
	}
	
	
	// Meta Box for the settings for a post
	
	function btm_post_settings_box(){
	  global $post;
	  $custom = get_post_custom($post->ID);
	  $btm_post_settings = $custom["btm_post_settings"][0];
	  $btm_post_hide_featured_single = $custom["btm_post_hide_featured_single"][0];
	  ?>
	  <p><?php _e('Single post page layout:', 'btm' ); ?> <select name="btm_post_settings">
	  	<?php
	  		$custom_post_settings = array(
	  			'default' => __('Default','btm'),
	  			'fullwidth' => __('Full Width','btm')
	  		);	
			foreach ( $custom_post_settings as $custom_settings_key => $custom_settings_value ) {
				if ( $custom_settings_key == $btm_post_settings ) { $sel = " selected='selected'"; }else{ $sel = ""; }
			  	echo "<option " . $sel . " value='". $custom_settings_key ."'>" . $custom_settings_value . "</option>"; 
			}
	  	?>
		</select></p>
		<p><label><input type="checkbox" name="btm_post_hide_featured_single" value="1" <?php if ( $btm_post_hide_featured_single ) { echo " checked='yes' "; } ?> /> <?php _e('Disable featured image on single post page', 'btm' ); ?></label></p>
	  <?php
	} 
	
	
?>