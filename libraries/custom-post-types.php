<?php
	
	
	
	
	// Portfolio Layouts
	$portfolio_layout_array = array(		 
		array('Attachment List','attachment_list'),		
		array('Attachment Slider','attachment_slider'),
		array('Standard', 'standard')
	);
	
	
	
	
	// Register Portfolio post type
	add_action('init', 'portfolio_register');
	function portfolio_register() {
		$labels = array(
			'name' => __('Portfolio', 'btm'),
			'singular_name' => __('Portfolio Item', 'btm'),
			'add_new' => __('Add New', 'btm'),
			'add_new_item' => __('Add New Portfolio Item','btm'),
			'edit_item' => __('Edit Portfolio Item','btm'),
			'new_item' => __('New Portfolio Item','btm'),
			'view_item' => __('View Portfolio Item','btm'),
			'search_items' => __('Search Portfolio','btm'),
			'not_found' =>  __('Nothing found','btm'),
			'not_found_in_trash' => __('Nothing found in Trash','btm'),
			'parent_item_colon' => ''
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_icon' => null,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title','editor','thumbnail','excerpt','comments')
		  ); 		
		register_post_type( 'portfolio' , $args );		
	}
	
	
	
	
	// Register Slider post type
	add_action('init', 'slider_register');
	function slider_register() {
		$labels = array(
			'name' => __('Slides', 'btm'),
			'singular_name' => __('Slide', 'btm'),
			'add_new' => __('Add New', 'btm'),
			'add_new_item' => __('Add New Slide','btm'),
			'edit_item' => __('Edit Slide','btm'),
			'new_item' => __('New Slide','btm'),
			'view_item' => __('View Slide','btm'),
			'search_items' => __('Search Slides','btm'),
			'not_found' =>  __('Nothing found','btm'),
			'not_found_in_trash' => __('Nothing found in Trash','btm'),
			'parent_item_colon' => ''
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_icon' => null,
			'rewrite' => false,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title','editor', 'page-attributes' )
		  ); 		
		register_post_type( 'slider' , $args );		
	}
	
	
	
	
	// Register "Skills" taxonomy
	register_taxonomy(
		"skills", 
		array("portfolio"), 
		array(
			"hierarchical" => true, 
			"label" => __('Portfolio Tags','btm'), 
			"singular_label" => __('Portfolio Tag','btm'), 
			"rewrite" => true
			)
	);




	// Register Slider Categories taxonomy
	register_taxonomy(
		"slide-categories", 
		array("slider"), 
		array(
			"hierarchical" => true, 
			"label" => __('Slider Categories','btm'), 
			"singular_label" => __('Slider Category','btm'), 
			"rewrite" => false
			)
	);


