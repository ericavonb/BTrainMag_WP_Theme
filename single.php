<?php
/**
* The Template for displaying single posts, customized to pull in a unique post template on a per-post basis.
*/
	get_header(); 
	$btm_post_settings = get_post_meta($post->ID, 'btm_post_settings', true);
	$primary_grid_size = 'grid_8';
?>

<body <?php body_class(); ?>>	

  <div id="outer">	
  
    <?php get_template_part( 'the_header'); ?>
    
  	<div id="main" class="clearfix">
  	
		  <div id="primary" class="clearfix">
	
	      <?php if ( have_posts() ) { ?>
  		    <?php while ( have_posts() ) : the_post(); ?>  
		    
  			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="featured-image-container">						    <?php echo btm_get_featured_image( array(500, 345), '' ); ?>
			</div>
      
  				<h1><?php the_category(', '); ?></h1>
  				<?php 
  					if ( ! get_post_meta( $post->ID, 'hide_title', true ) ) { 
  						the_title( "<h2 class='entry-title'>", '</h2>', true ); 
  					}				
  				?>
				
  				<div class="entry-content">
  					<?php the_content(); ?>
  					<?php wp_link_pages( array('before' => ''.__( '<p>Pages:', 'btm' ), 'after' => '</p>' ) ); ?>
  				</div><!--//entry-content -->     
				
  				<?php
  					if ( ! get_post_meta( $post->ID, 'hide_meta', true ) ) { 
  						get_template_part( 'meta', 'post' ); 
  					};
  				?>
				
  			<?php comments_template( '', true ); ?>	
					
    		</div><!-- //post-->	
  		  <?php endwhile; // end of the loop
  		    };?>
		
	
	    <?php if( $btm_post_settings == 'default' || !$btm_post_settings ) { ?>
    		<div id="aside">
    			<?php get_sidebar(); ?>
    		</div><!--//aside-->
  	  <?php }; ?>
  	
  	  </div><!--//primary-->
  	</div><!--//main-->

    <?php get_footer(); ?>
    
  </div><!--//outer-->
</body>
</html>