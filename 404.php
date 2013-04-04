<?php
/**
* The 404 template file.
*/
get_header(); ?>
				
	<div class="grid_8" id="primary">
	 	<?php // Run the loop to output the posts. If you want to overload this in a child theme then include a file called loop-404.php and that will be used instead. ?>
		<?php// get_template_part( 'loop', '404' ); ?>
    </div><!--//grid_X-->
	<div class="grid_4" id="aside">
		<?php get_sidebar(); ?>
	</div><!--//grid_4-->
                
<?php get_footer(); ?>