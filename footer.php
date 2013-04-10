<?php 
   /*
   * The template for displaying the footer.
   */
   ?>
<?php
   if ( is_active_sidebar( 'body-bottom' ) ) {							
   dynamic_sidebar( 'body-bottom' );
   }
   ?>			
<!-- source: footer.php -->
<div id="footer" class="clearfix">				
  <?php
     // Grab custom settings
     global $btm_theme_options;
     $footer_layout = btm_get_option( get_option_tree('footer_layout', $btm_theme_options, false, false ), '', 'footer_layout' ); 
     
     // If one or more sidebars are active
     if ( 
     is_active_sidebar( 'footer-a' ) || 
     is_active_sidebar( 'footer-b' ) || 
     is_active_sidebar( 'footer-c' ) || 
     is_active_sidebar( 'footer-d' ) || 
     is_active_sidebar( 'footer-fullwidth-above' ) ||
     is_active_sidebar( 'footer-fullwidth-below' )
     ) { ?>
  
  <div id="footer-top" class="clearfix">
    <?php
       // Full-width sidebar above the footer columns
       if ( is_active_sidebar( 'footer-fullwidth-above' ) ) { 	
       echo "<div class='footer_container alpha'>";
       dynamic_sidebar( 'footer-fullwidth-above' );		
       echo "</div>";
       }
       ?>
    
    <?php if ( strpos( $footer_layout, '002' ) !== FALSE ) { ?>
    
    <div class="footer_container alpha"><?php dynamic_sidebar( 'footer-a' ); ?></div>
    <div class="footer_container omega"><?php dynamic_sidebar( 'footer-b' ); ?></div>
    
    <?php } else if (strpos( $footer_layout, '003' ) !== FALSE ) { ?>
    
    <div class="footer_container alpha"><?php dynamic_sidebar( 'footer-a' ); ?></div>
    <div class="footer_container"><?php dynamic_sidebar( 'footer-b' ); ?></div>
    <div class="footer_container omega"><?php dynamic_sidebar( 'footer-c' ); ?></div>
    
    <?php } else if ( strpos( $footer_layout, '004' ) !== FALSE ) { ?>
    
    <div class="footer_container alpha"><?php dynamic_sidebar( 'footer-a' ); ?></div>
    <div class="footer_container"><?php dynamic_sidebar( 'footer-b' ); ?></div>
    <div class="footer_container"><?php dynamic_sidebar( 'footer-c' ); ?></div>
    <div class="footer_container omega"><?php dynamic_sidebar( 'footer-d' ); ?></div>
    
    <?php } else { /* default 001 or not set */ ?>
    
    <div class="footer_container alpha"><?php dynamic_sidebar( 'footer-a' ); ?></div>
    <div class="footer_container"><?php dynamic_sidebar( 'footer-b' ); ?></div>
    <div class="footer_container omega"><?php dynamic_sidebar( 'footer-c' ); ?></div>						
    
    <?php } ?> 
    
    <?php
       // Full-width sidebar below the footer columns
       if ( is_active_sidebar( 'footer-fullwidth-below' ) ) { 
       echo "<div class='footer_container alpha'>";
       dynamic_sidebar( 'footer-fullwidth-below' );
       echo "</div>";
       }
       ?>
  </div><!--//footer-top-->
  
  <?php } ?>
  
  
  <?php if ( is_active_sidebar( 'footer-bottom-left' ) || is_active_sidebar( 'footer-bottom-right' ) ) { ?>
  <div id="footer-bottom" class="clearfix">
    <div class="container_12">						
      <div class="footer_container">							
	<div class="footer-bottom-wrap clearfix">
	  <?php if ( is_active_sidebar( 'footer-bottom-left' ) ) { ?>
	  <div class="left"><?php dynamic_sidebar( 'footer-bottom-left' ); ?></div><!--//left-->
	  <?php } ?>									

	  <div class="right">
	    <div class="widget widget_text">
	      <div class="textwidget">
		<p>Original design by <a href="http://btm.com/">Btm</a>. Powered by <a href="http://wordpress.org">WordPress</a>.</p>
	      </div>
	    </div>
	  </div><!--//right-->

	</div><!--//footer-bottom-wrap-->	
      </div><!--//grid_x-->								
    </div><!--//container_12-->	
  </div><!--//footer-bottom-->
  <?php } // end if any footer areas active ?>
  
</div><!--//footer-->

<?php wp_footer(); ?>
