
<div class="main_container clearfix" id="posts">

  <?php 
  if ( have_posts() ) { ?>
 
    <?php $postcount = 0; ?>
  	<?php /* Start the Loop. */ ?>
	
  	<?php while ( have_posts() ) : the_post(); ?>
	
  		<?php $postcount++; ?>
  		<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>			

  			<h2 class="entry-title"><?php the_title(); ?></h2>
  			<?php echo btm_get_featured_image( array(360, 240), '' ); ?>
  			<div class="entry-content">
  				<?php the_content( __( 'Read More...', 'btm' ) ); ?>
  			</div><!--//entry-content -->
  		</div><!--//post-->
		
  	<?php endwhile; // End the loop. ?>
  	<?php } else {
  	  echo "<h2>No More Posts</h2>"; } ?>
	 <?php get_template_part( 'nav', 'post-loop' ); ?>
</div>