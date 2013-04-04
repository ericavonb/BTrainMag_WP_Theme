<?php

/* ========================================================================= */
/*                              Main Template                                */
/* ========================================================================= */


/* ------------------------------------------------------------------------- */
/*                         Header: head and header                           */
/* ------------------------------------------------------------------------- */

get_header(); ?>

<body <?php body_class(); ?>>	

  <div id="outer">	
  
    <?php get_template_part( 'the_header'); ?>
    
		<!-- *** -->
		<div id="top" class="clearfix">
		  <?php if ( is_active_sidebar( 'body-top' ) ) { dynamic_sidebar( 'body-top' ); } ?>
		  <?php get_template_part( 'slideshow'); // The slideshow for the front page ?>
		</div><!--//top-->
		
		<div id="main" class="clearfix">
		

			
      <div id="primary" class="clearfix">    
	 	    <?php 
    	 		// Run the loop to output the posts.
    			if (is_front_page()) {
    			  get_template_part('loop', 'home' );
    			} else {
    			  
    		    get_template_part( 'loop', 'index' ); 
    	    };
    		?>
	      <div id="aside">
		      <?php get_sidebar(); ?>
	      </div><!--//aside-->
	      
      </div> <!--//primary-->  
    </div><!--//main-->
          
    <?php get_footer(); ?>
    
  </div><!--//outer-->
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
  <?php if ( is_front_page() ) : ?>
  	  <script src="<?php echo get_template_directory_uri() . "/js/slideshow.js" ?>" type="text/javascript"></script>
  <?php endif; ?>
  
</body>

</html>
  
  