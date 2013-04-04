<?php
/**
* The Template for displaying single posts - custom post type
*/
	get_header(); 

	$default_portfolio_layout = 'standard';
	$portfolio_layout = get_post_meta($post->ID, 'portfolio_layout', true);
	if ( ! $portfolio_layout ) {
		$portfolio_layout = $default_portfolio_layout;
	}
	
?>
	
	<?php if ( $portfolio_layout == 'standard' || $portfolio_layout == 'standard-fullwidth' ) { ?>

		<?php if ( $portfolio_layout == 'standard' ) { ?>
			<div class="grid_8" id="primary">
		<?php } else { ?>
			<div class="grid_12" id="primary">
		<?php } ?>
			
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>    
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>			
					
					<?php 
					/*
					if ( $portfolio_layout == 'standard' ) { 
						echo btm_get_featured_image( 'grid_8', '' );
					 } else { 
						echo btm_get_featured_image( 'grid_12', '' );
					 }
					 */ 
					 ?>

					<?php if ( ! get_post_meta( $post->ID, 'hide_title', true ) ) { the_title( "<h2 class='entry-title'>", '</h2>', true ); } ?>			
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!--//entry-content -->     				
					<?php /* if ( ! get_post_meta( $post->ID, 'hide_meta', true ) ) { get_template_part( 'meta', 'post' ); } */ ?>				
				</div><!-- //post-->
				<?php comments_template( '', true ); ?>				
			<?php endwhile; // end of the loop. ?>		
		</div><!--//grid_X-->	
		
		<?php if ( $portfolio_layout == 'standard' ) { ?>
			<div class="grid_4" id="aside">
				<?php get_sidebar(); ?>
			</div><!--//grid_X-->
		<?php } ?>
	
	<?php }else if ( $portfolio_layout == 'attachment_list' || $portfolio_layout == 'attachment_slider' || $portfolio_layout == 'video' ) { ?>
		
		
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div class="grid_4" id="primary">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>								
					<?php if ( ! get_post_meta( $post->ID, 'hide_title', true ) ) { the_title( "<h2 class='entry-title'>", '</h2>', true ); } ?>			
					<div class="entry-content">
						<?php the_content(); ?>
						<?php edit_post_link( __('Edit Portfolio Item','btm') ); ?>
					</div><!--//entry-content -->     				
				</div><!-- //post-->
			</div><!--//grid_X-->
			<div class="grid_8" id="aside">										
				<?php
				
					if ( $portfolio_layout == 'attachment_list' || ! $portfolio_layout ) {
						
						$btm_gallery_options = array( 'display' => 'list', 'source' => 'attachment' );					
						echo btm_attachment_gallery( $btm_gallery_options );	
						
					}else if ($portfolio_layout == 'attachment_slider' ){
						
						$btm_gallery_options = array( 'display' => 'slider', 'source' => 'attachment' );					
						echo btm_attachment_gallery( $btm_gallery_options );	
						
					}else if ( $portfolio_layout == 'video' ) {
					
						// print_r_pre( get_post_custom() );
						$embed = get_post_meta( $post->ID, 'portfolio_video_src_embed', true );
						
						// If video embed source filled in, use it above all others
						if ( $embed ) {						
							echo do_shortcode( $embed );						
						}
						
					}else{						
						echo '<!-- template not found -->';						
					}
				?>				
				<?php wp_reset_query(); comments_template( '', true ); ?>				
			</div><!--//grid_X-->	
		<?php endwhile; // end of the loop. ?>
	
	<?php } // end layout if/elses ?>
	
<?php get_footer(); ?>