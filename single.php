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
  	  <h1 id="category"><?php the_category(', '); ?></h1>
	  <div class="post_content">
  	    <?php 
  	       if ( ! get_post_meta( $post->ID, 'hide_title', true ) ) { 
  	           the_title( "<h2 class='entry-title'>", '</h2>', true ); 
  	        };				
  	    ?>
	    <div class="byline top"><?php _e('by', 'btm'); ?> <?php the_author_posts_link(); ?>
	    </div>
	    <div class="on"> on </div>
	    <div class="post-date top"><?php the_time( get_option( 'date_format' ) ); ?>
	    </div>	
	    <?php if( comments_open()) { ?>
	    <div class="post-comment-link">
	      <?php comments_popup_link( __( '0 Comments', 'btm' ), __( '1 Comment', 'btm' ), __( '% Comments', 'btm' ), null, '' ); ?>
	    </div><?php } ?>
	    <?php echo btm_get_featured_image('exlarge', '' ); ?>

  	    <div class="entry-content">
  	      <?php the_content(); ?>
  	      <?php wp_link_pages( array('before' => ''.__( '<p>Pages:', 'btm' ), 'after' => '</p>' ) ); ?>
  	    </div><!--//entry-content -->     
	    
  	    <?php
  	       if ( ! get_post_meta( $post->ID, 'hide_meta', true ) ) { 
  	    get_template_part( 'meta', 'post' ); 
  	    };
  	    ?>
	    <a href="https://twitter.com/share" class="twitter-share-button" data-size="large"  data-related="<?php get_option('twitter', false ); ?>"  data-dnt="true">Tweet</a>
	    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	    
  	    <?php comments_template( '', true ); ?>	
	  </div><!-- //post_content -->
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
