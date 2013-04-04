<!-- source page.php -->
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
		</div><!--//top-->
		
		<div id="main" class="clearfix">
		

			
      <div id="primary" class="clearfix">    
	 	    <?php 
    	 		// Run the loop to output the posts.
    			
    		    get_template_part( 'loop', 'page' ); 
    		?>
	      
      </div> <!--//primary-->  
    </div><!--//main-->
          
    <?php get_footer(); ?>
    
  </div><!--//outer-->
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
  
</body>

</html>
