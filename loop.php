<!-- Source: loop.php -->
<?php // The loop that displays posts. ?>

<div class="main_container clearfix" id="posts">

  <?php 
  
  if ( have_posts() ) { ?>
 
  	<?php 
    $postcount = 0; /* Start the Loop. */ ?>
	
  	<?php while ( have_posts() ) : the_post(); ?>
	
  		<?php $postcount++; ?>
  		<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>			

  			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'btm' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?>
  			</a></h2> 
  			<?php if (has_post_thumbnail()) { 
			?>
			  <?php echo btm_get_featured_image( 'small' , '' ); ?>
			<?php }; ?>
  			<div class="entry-excerpt">
  				<?php the_excerpt( __( 'Read More...', 'btm' ) ); ?>
  			</div><!--//entry-content -->
  			<?php get_template_part( 'meta', 'post' ); ?>
  		</div><!--//post-->
		
  	<?php endwhile; // End the loop. ?>
  	<?php } else {
  	  echo "<h2>No More Posts</h2>"; } ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('posts-loop-below') ) : endif; ?>	
    <?php get_template_part( 'nav', 'post-loop' ); ?>
</div>
