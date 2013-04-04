<!-- source search.php -->
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
			<p><strong><?php 
				echo sprintf( 
					__( 'Your search for %s returned %s %s.', 'btm' ), 
						"<span class='highlight'>".get_search_query()."</span>", 
						$wp_query->found_posts,
						_n( 'result', 'results', $wp_query->found_posts, 'btm' )						
				 ); ?></strong></p>
            <?php
			
            /* Run the loop for the search to output the results.
             * If you want to overload this in a child theme then include a file
             * called loop-search.php and that will be used instead.
             */
             query_posts($query_string . '&posts_per_page=100');
             get_template_part( 'loop', 'search' );
            ?>
    </div><!--//primary-->
	<div cid="aside">
		<?php get_sidebar(); ?>
	</div><!--//aside-->
<?php get_footer(); ?>
</div> <!--//main-->
</div><!--/outer-->
</body>
</html>