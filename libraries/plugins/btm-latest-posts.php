<?php
/*
* Plugin Name: Btm Latest Posts Widget
* Description: Display latest posts in a custom format.
* Version: 1.0
* Author: Erica von Buelow
*/

class Btm_LatestPostsWidget extends WP_Widget {

    function Btm_LatestPostsWidget() {
		$widget_options = array('classname' => 'btm-latest-posts', 'description' => __( 'Reusable custom posts by Btm.', 'btm') );
		$control_options = array( 'width' => 300, 'height' => 350 );
        parent::WP_Widget(false, $name = __( 'Btm Latest Posts', 'btm'), $widget_options, $control_options );	
    }

    function widget($args, $instance) {		
	
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
		$max = $instance['max'];
		$cat = $instance['cat'];
		$sidebar_posts = "";
       	
		echo $before_widget; 
		
		// If title is set, display it
		if ( $title ) { 
			echo $before_title . $title . $after_title; 
		} 
		
		// if Category ID set, apply query formatting
		if ( $cat ) {
			$cat = "&cat=" . $cat;
		}
		
		// if Max not set, show all
		if ( !$max ) {
			$max = 5;
		}
				
		$my_query = new WP_Query("posts_per_page=" . $max . $cat);
		while ($my_query->have_posts()) : $my_query->the_post(); 
			$sidebar_posts .= "<li class='clearfix'>";
				$sidebar_posts .= "<span>" . get_the_time('M d') . "</span>"; 
				$sidebar_posts .= "<a href='". get_permalink() . "'>" . get_the_title() . "</a>";				
			$sidebar_posts .= "</li>";
		endwhile;
		
		if(!empty($sidebar_posts)) {
			echo "<ul>" . $sidebar_posts . "</ul>";
		}
				
        echo $after_widget; 
    }


	// Update Settings
    function update($new_instance, $old_instance) {				
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['max'] = strip_tags($new_instance['max']);
		$instance['cat'] = strip_tags($new_instance['cat']);
		return $instance;
    }

	
	// User Settings Form
    function form($instance) {		
		
		$title = $max = $cat = $show_excerpt = $show_date = $show_excerpt_checked = $show_date_checked = "";
		
        $title = esc_attr($instance['title']);
		$max = esc_attr($instance['max']);
		$cat = esc_attr($instance['cat']);
		$show_excerpt = esc_attr($instance['show_excerpt']);
		$show_date = esc_attr($instance['show_date']);
		
		if($show_excerpt == 1) {
			$show_excerpt_checked = " checked='checked' ";
		}
		
		if($show_date == 1) {
			$show_date_checked = " checked='checked' ";
		}
		
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','btm'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('max'); ?>"><?php _e('Maximum:','btm'); ?> <input class="widefat" id="<?php echo $this->get_field_id('max'); ?>" name="<?php echo $this->get_field_name('max'); ?>" type="text" value="<?php echo $max; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Category IDs:','btm'); ?> <input class="widefat" id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" type="text" value="<?php echo $cat; ?>" /></label></p>			
        <?php 
    }

}

// register Btm_LatestPostsWidget widget
add_action('widgets_init', create_function('', 'return register_widget("Btm_LatestPostsWidget");'));


?>