<!-- Source: loop-home.php -->
 
<?php
  	// Grab some theme settings 
  	global $btm_theme_options;
  	$nth_post_widget = btm_get_option( get_option_tree('nth_post_widget', $btm_theme_options, false, false ), 1, false ); 
  	$nth_post_widget = explode( ',', $nth_post_widget );
?>

<div id="posts" class="main_container clearfix">
  <?php // The loop that displays posts.   
    
    $categories = get_categories(array('hide_empty' => 0,
                                        'exclude' => '1', 
                                        'orderby' => 'term_group'));
                                        
    $usedPosts = array();
  
    foreach($categories as $cat) :
      $args = 'cat=' . $cat->cat_ID . '&posts_per_page=-1&orderby=DATE';
      
      $my_query = new WP_Query($args);
      
      if ( $my_query->have_posts() ) :
   	    $postcount = 0;
   	    $count = 0; ?>
      
        <div class="category-container" id="<?php echo $cat->name; ?>-container">
          <h1 class="category-label">
            <a href="<?php echo get_category_link($cat->cat_ID); ?>">
              <?php echo $cat->name; ?>
            </a>
          </h1>
          
       	  
        	<?php 
        	  while ( $my_query->have_posts() ) :
        	    $my_query->the_post();
        	    
        	    if (in_array($post->ID, $usedPosts)) {
        	      continue;
        	    };

        	    if ($count > 1) {
        	      break;
        	    };
        	    
        	    $count = $count + 1;
        	    array_push($usedPosts, $post->ID);
        	    $this_title = esc_attr__( 'Permalink to %s', 'btm' ).the_title_attribute( 'echo=0' ); ?>
        	    
          	<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>			
              <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>" title="<?php echo $this_title; ?>" rel="bookmark">
                  <?php the_title(); ?>
                </a>
              </h2>
        			
            	<?php if (has_post_thumbnail()) {
    				          $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
    				   ?>
              <a href="<?php the_permalink(); ?>" class="thumbnail-image" style="background-image: url('<?php echo $src[0]; ?>');">
              </a>
              
            	<?php } else { ?>
            	  
            	<div class="entry-excerpt">
                <?php the_excerpt( __( 'Read More...', 'btm' ) ); ?>
              </div><!--//entry-excerpt -->
              
              <?php }; ?>
              
              <?php get_template_part( 'meta', 'home' ); ?>
              
            </div><!--//post-->
      		
        	  <?php endwhile; // End the loop. ?>

      	</div><!--//category-container-->
    	
      <?php endif; ?>
      
      <?php wp_reset_postdata(); ?> 
    
    <?php endforeach; ?>
  
</div><!--//main_container-->


