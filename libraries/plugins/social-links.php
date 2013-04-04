<?php

    /*
    * Plugin Name: Btm Social Links Widget
    * Description: Social Links.
    * Version: 1.0
    * Author: Erica von Buelow
    */

     function social_settings_api_init() {
     	// Add the section to reading settings so we can add our
     	// fields to it
     	add_settings_section('social-links', 'Social Links',
    		'social_setting_section_callback_function',
    		'general');

     	// Add the field with the names and function to use for our new
     	// settings, put it in our new section
     	add_settings_field('twitter',
    		'Twitter',
    		'twitter_setting_callback_function',
    		'general',
    		'social-links');
    	add_settings_field('facebook',
    		'Facebook',
    		'facebook_setting_callback_function',
    		'general',
    		'social-links');
  	 	add_settings_field('youtube',
    		'YouTube',
    		'youtube_setting_callback_function',
    		'general',
    		'social-links');
    		
  	 	add_settings_field('email',
    		'Email',
    		'email_setting_callback_function',
    		'general',
    		'social-links');

     	// Register our setting so that $_POST handling is done for us and
     	// our callback function just has to echo the <input>
     	register_setting('general','twitter');
     	register_setting('general','facebook');
     	register_setting('general','youtube');
     	register_setting('general','email');
     	
     }// social_settings_api_init()

     add_action('admin_init', 'social_settings_api_init');


     // ------------------------------------------------------------------
     // Settings section callback function
     // ------------------------------------------------------------------
     //
     // This function is needed if we added a new section. This function 
     // will be run at the start of our section
     //

     function social_setting_section_callback_function() {
     	echo '<p>Social Links</p>';
     }

     // ------------------------------------------------------------------
     // Callback function for our example setting
     // ------------------------------------------------------------------
     //
     // creates a checkbox true/false option. Other types are surely possible
     //
     $style = ' style="border: 1px solid #666"; ';
     function twitter_setting_callback_function() {
       
        $style = ' style="border: 1px solid #666;" ';
       $val = get_option('twitter', false ); 
       echo '<input name="twitter" id="twitter"'.$style.' type="text" value="'.$val.'" class="code"/> Twitter Username';
     }
     function facebook_setting_callback_function() {
       
        $style = ' style="border: 1px solid #666"; ';
        $val = get_option('facebook', false );
       
       echo '<input name="facebook" id="facebook"'.$style.' type="text" value="'.$val.'" class="code"/> Facebook Page';
     }
     function youtube_setting_callback_function() {
       
        $style = ' style="border: 1px solid #666"; ';
        $val = get_option('youtube', false );
      	echo '<input name="youtube" id="youtube"'.$style.' type="text" value="'.$val.'" class="code"/> YouTube Page';
      }
      function email_setting_callback_function() {

        $style = ' style="border: 1px solid #666"; ';
        $val = get_option('email', false );
      	echo '<input name="email" id="email"'.$style.' type="text" value="'.$val.'" class="code"/> Email Contact';
      }
     
    ?>